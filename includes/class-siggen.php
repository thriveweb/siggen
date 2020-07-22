<?php
/**
 * Main plugin class file.
 *
 * @package SigGen/Includes
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Main plugin class.
 */
class SigGen {

	/**
	 * The single instance of SigGen.
	 *
	 * @var     object
	 * @access  private
	 * @since   1.0.0
	 */
	private static $_instance = null; //phpcs:ignore

	/**
	 * Local instance of SigGen_Admin_API
	 *
	 * @var SigGen_Admin_API|null
	 */
	public $admin = null;

	/**
	 * Settings class object
	 *
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = null;

	/**
	 * The version number.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_version; //phpcs:ignore

	/**
	 * The token.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_token; //phpcs:ignore

	/**
	 * The main plugin file.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $file;

	/**
	 * The main plugin directory.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $dir;

	/**
	 * The plugin assets directory.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_dir;

	/**
	 * The plugin assets URL.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_url;

	/**
	 * Suffix for JavaScripts.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $script_suffix;

	/**
	 * Constructor funtion.
	 *
	 * @param string $file File constructor.
	 * @param string $version Plugin version.
	 */
	public function __construct($file = '', $version = '1.0.0') {
		$this->_version = $version;
		$this->_token   = 'siggen';

		// Load plugin environment variables.
		$this->file         = $file;
		$this->dir          = dirname($this->file);
		$this->assets_dir   = trailingslashit($this->dir) . 'assets';
        $this->assets_url   = esc_url(trailingslashit(plugins_url('/assets/', $this->file)));
        $this->template_dir = trailingslashit($this->dir) . 'includes/templates';

        $this->script_suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        register_activation_hook($this->file, array( $this, 'install'));

        // redirect on plugin activation 
        add_action('activated_plugin', array($this, 'siggen_activation_redirect'));

		// Load frontend JS & CSS.
		add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'), 10);
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 10);

		// Load admin JS & CSS.
		add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'), 10, 1);
		add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_styles'), 10, 1);

		// Load API for generic admin functions.
		if (is_admin()) {
			$this->admin = new SigGen_Admin_API();
        }

		// Handle localisation.
		$this->load_plugin_textdomain();
        add_action('init', array($this, 'load_localisation'), 0);
        
        // register custom post type
        $this->register_post_type('siggen-signature', __('Signatures', 'siggen'), __('Signature', 'siggen'));

        // custom post type filters
        add_filter('register_post_type_args', array($this, 'siggen_signature_post_type_args'), 10, 2); // change custom post args
        add_filter('comments_open', array($this, 'siggen_comments_open'), 10 , 2); // remove comments/discussion from post type
        add_filter('page_row_actions', array($this, 'siggen_remove_quick_edit'), 10 , 2); // remove quick edit link from post type
        add_filter('page_row_actions', array($this, 'siggen_duplicate_post_link'), 10, 2); // add duplicate link
        add_action('admin_action_siggen_duplicate_post_as_draft',  array($this, 'siggen_duplicate_post_as_draft')); // handle duplicate post

        // custom meta boxes
        add_action('add_meta_boxes', array($this, 'siggen_signature_meta_boxes')); // add metabox
        add_filter('siggen-signature_custom_fields', array($this, 'siggen_signature_add_custom_fields')); // add custom fields to metabox

        // use custom single template for post type
        add_filter('single_template', array($this, 'siggen_single_template'), 10, 2);

    } // End __construct ()

	/**
	 * Register post type function.
	 *
	 * @param string $post_type Post Type.
	 * @param string $plural Plural Label.
	 * @param string $single Single Label.
	 * @param string $description Description.
	 * @param array  $options Options array.
	 *
	 * @return bool|string|SigGen_Post_Type
	 */
	public function register_post_type( $post_type = '', $plural = '', $single = '', $description = '', $options = array() ) {

		if ( ! $post_type || ! $plural || ! $single ) {
			return false;
		}

		$post_type = new SigGen_Post_Type( $post_type, $plural, $single, $description, $options );

		return $post_type;
	}

	/**
	 * Wrapper function to register a new taxonomy.
	 *
	 * @param string $taxonomy Taxonomy.
	 * @param string $plural Plural Label.
	 * @param string $single Single Label.
	 * @param array  $post_types Post types to register this taxonomy for.
	 * @param array  $taxonomy_args Taxonomy arguments.
	 *
	 * @return bool|string|SigGen_Taxonomy
	 */
	public function register_taxonomy( $taxonomy = '', $plural = '', $single = '', $post_types = array(), $taxonomy_args = array() ) {

		if ( ! $taxonomy || ! $plural || ! $single ) {
			return false;
		}

		$taxonomy = new SigGen_Taxonomy( $taxonomy, $plural, $single, $post_types, $taxonomy_args );

		return $taxonomy;
	}

	/**
	 * Load frontend CSS.
	 *
	 * @access  public
	 * @return void
	 * @since   1.0.0
	 */
	public function enqueue_styles() {
		wp_register_style( $this->_token . '-frontend', esc_url( $this->assets_url ) . 'css/frontend.css', array(), $this->_version );
		wp_enqueue_style( $this->_token . '-frontend' );
	} // End enqueue_styles ()

	/**
	 * Load frontend Javascript.
	 *
	 * @access  public
	 * @return  void
	 * @since   1.0.0
	 */
	public function enqueue_scripts() {
		wp_register_script( $this->_token . '-frontend', esc_url( $this->assets_url ) . 'js/frontend' . $this->script_suffix . '.js', array( 'jquery' ), $this->_version, true);
		wp_enqueue_script( $this->_token . '-frontend' );
	} // End enqueue_scripts ()

	/**
	 * Admin enqueue style.
	 *
	 * @param string $hook Hook parameter.
	 *
	 * @return void
	 */
	public function admin_enqueue_styles( $hook = '' ) {
		wp_register_style( $this->_token . '-admin', esc_url( $this->assets_url ) . 'css/admin.css', array(), $this->_version );
		wp_enqueue_style( $this->_token . '-admin' );
	} // End admin_enqueue_styles ()

	/**
	 * Load admin Javascript.
	 *
	 * @access  public
	 *
	 * @param string $hook Hook parameter.
	 *
	 * @return  void
	 * @since   1.0.0
	 */
    public function admin_enqueue_scripts($hook_suffix) {
        if (in_array($hook_suffix, array('post.php', 'post-new.php'))) {
            $screen = get_current_screen();
            if (is_object($screen) && 'siggen-signature' == $screen->post_type) {
                wp_enqueue_style('farbtastic');
                wp_enqueue_script('farbtastic');
        
                wp_enqueue_media();
                
                wp_register_script($this->_token . '-admin', esc_url($this->assets_url).'js/admin'.$this->script_suffix.'.js?t='.time(), array('farbtastic', 'jquery'), $this->_version, true);
                wp_enqueue_script($this->_token . '-admin');
            }
        }
    } // End admin_enqueue_scripts ()

	/**
	 * Load plugin localisation
	 *
	 * @access  public
	 * @return  void
	 * @since   1.0.0
	 */
	public function load_localisation() {
		load_plugin_textdomain( 'siggen', false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_localisation ()

	/**
	 * Load plugin textdomain
	 *
	 * @access  public
	 * @return  void
	 * @since   1.0.0
	 */
	public function load_plugin_textdomain() {
		$domain = 'siggen';

		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_plugin_textdomain ()

	/**
	 * Main SigGen Instance
	 *
	 * Ensures only one instance of SigGen is loaded or can be loaded.
	 *
	 * @param string $file File instance.
	 * @param string $version Version parameter.
	 *
	 * @return Object SigGen instance
	 * @see SigGen()
	 * @since 1.0.0
	 * @static
	 */
	public static function instance( $file = '', $version = '1.0.0' ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file, $version );
		}

		return self::$_instance;
    } // End instance ()

    /**
     * Change custom post args
     *
     * @access  public
     * @return  array
     * @since   1.0.0
     */
    public function siggen_signature_post_type_args($args, $post_type) {
        if ($post_type == 'siggen-signature') {
            $args['has_archive'] = false;
            $args['supports'] = array('title');
        }
        return $args;
    }

    /**
     * Use custom single template for custom post type
     *
     * @access  public
     * @return  string
     * @since   1.0.0
     */
    public function siggen_single_template($template, $type) {
        global $post;
        if ($type === 'single') {
            if ($post->post_type === 'siggen-signature') {
                $template = $this->template_dir .'/single-siggen-signature.php';
            }
        }
        return $template;
    }

    /**
     * Remove comments/discussion from post type
     *
     * @access  public
     * @return  bool
     * @since   1.0.0
     */
    public function siggen_comments_open($open, $post_id) {
        $post_type = get_post_type($post_id);
        // disable comments for signature post types
        if ($post_type == 'siggen-signature') {
            return false;
        }
        // allow comments for any other post types
        return true;
    }

    /**
     * Remove quick edit from post type
     *
     * @access  public
     * @return  array
     * @since   1.0.0
     */
    public function siggen_remove_quick_edit($actions, $post) {
        if ($post->post_type === 'siggen-signature') {
            unset( $actions['inline hide-if-no-js'] );
        }
        return $actions;
    }

    /**
     * Redirect when plugin activated 
     *
     * @access  public
     * @return  void
     * @since   1.0.0
     */
    public function siggen_activation_redirect($plugin) {
        if ($plugin == plugin_basename($this->file)) {
            exit(wp_redirect(admin_url('plugins.php?siggen_status=active')));
        }
    }

    /**
     * Create post duplicate as a draft and redirects to the edit post screen
     *
     * @access  public
     * @return  void
     * @since   1.0.0
     */
    public function siggen_duplicate_post_as_draft() {
        global $wpdb;
        if (!(isset( $_GET['post']) || isset($_POST['post'])  || (isset($_REQUEST['action']) && 'siggen_duplicate_post_as_draft' == $_REQUEST['action']))) {
            wp_die('No post to duplicate has been supplied.');
        }
    
        if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__))) {
            return;
        }

        // get original post id and all its data
        $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
        $post = get_post($post_id);

        // get and set author 
        $current_user = wp_get_current_user();
        $new_post_author = $current_user->ID;
    
        // if post data exists, create the post duplicate
        if (isset($post) && $post != null) {
            $args = array(
                'comment_status' => $post->comment_status,
                'ping_status'    => $post->ping_status,
                'post_author'    => $new_post_author,
                'post_content'   => $post->post_content,
                'post_excerpt'   => $post->post_excerpt,
                'post_name'      => $post->post_name,
                'post_parent'    => $post->post_parent,
                'post_password'  => $post->post_password,
                'post_status'    => 'draft',
                'post_title'     => $post->post_title,
                'post_type'      => $post->post_type,
                'to_ping'        => $post->to_ping,
                'menu_order'     => $post->menu_order
            );
    
            // insert new post
            $new_post_id = wp_insert_post($args);
    
            // get all current post terms and set them to the new post draft
            $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
            foreach ($taxonomies as $taxonomy) {
                $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
                wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
            }
    
            // duplicate all post meta, update to overwrite
            $metadata = get_post_custom($post_id);
            foreach ($metadata as $key => $values) {
                foreach ($values as $value) {
                    update_post_meta($new_post_id, $key, $value);
                }
            }
    
            // redirect to the edit post screen for new draft
            wp_redirect(admin_url('post.php?action=edit&post='.$new_post_id));
            exit;
        } else {
            wp_die('Post creation failed, could not find original post: '.$post_id);
        }
    }

    /**
     * Add the duplicate link to action list
     *
     * @access  public
     * @return  array
     * @since   1.0.0
     */
    public function siggen_duplicate_post_link($actions, $post) {
        if ($post->post_type === 'siggen-signature') {
            if (current_user_can('edit_posts')) {
                $actions['duplicate'] = '<a href="'.wp_nonce_url('admin.php?action=siggen_duplicate_post_as_draft&post='.$post->ID, basename(__FILE__), 'duplicate_nonce').'" title="Duplicate this item" rel="permalink">Duplicate</a>';
            }
        }
        return $actions;
    }

    /**
     * Add a metabox to signature post types
     *
     * @access  public
     * @return  void
     * @since   1.0.0
     */
    public function siggen_signature_meta_boxes() {
        SigGen()->admin->add_meta_box('siggen_metabox_instructions',__('Instructions', 'siggen'), array('siggen-signature'));
        SigGen()->admin->add_meta_box('siggen_metabox_design',__('Signature Design', 'siggen'), array('siggen-signature'));
        SigGen()->admin->add_meta_box('siggen_metabox_info',__('Signature Information', 'siggen'), array('siggen-signature'));
        SigGen()->admin->add_meta_box('siggen_metabox_socials',__('Signature Socials', 'siggen'), array('siggen-signature'));
    }

    /**
     * Add custom post fields to metabox
     *
     * @access  public
     * @return  array
     * @since   1.0.0
     */
    public function siggen_signature_add_custom_fields() {
        $fields = array();
        // Instructions
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_instructions',
            ),
            'id' => 'siggen_instructions',
            'type' => 'info',
            'html' => '
                <h4>Instructions to make signature</h4>
                <ol>
                    <li>Choose your layout template. (Note: Some templates might not display every field)
                    <li>Choose your theme colour.</li>
                    <li>Choose your signature logo, as well as the logo ratio to help it look the best it can.</li>
                    <li>Fill out the fields below with your information.</li>
                    <li>For fields you don\'t want or need, just leave them blank and they won\'t show on your signature.</li>
                    <li>Choose which social medias you want to display.</li>
                </ol>
                <h4>Instructions to use signature</h4>
                <p>After you have filled out the form and like the way it looks, go to the post link to view the signature. To get the signature from that page to your email follow the steps below.</p>
                <p>The basic procedure that works in most email clients is:</p>
                <ol>
                    <li>View the signature in your browser. You must use Chrome.</li>
                    <li>Click in the browser window and select All (Cmd + A) (Ctrl + A on windows).</li>
                    <li>Copy (Cmd + C) (Ctrl + C on windows) the signature.</li>
                    <li>Open up your email client and navigate to the signatures section in your settings.</li>
                    <li>Click in the signature editing window.</li>
                    <li>Select all (Cmd + A) (Ctrl + A on windows) to clear and Paste (Cmd + V) (Ctrl + V on windows).</li>
                    <li>Save changes.</li>
                </ol>
                <p>Apple mail may look like it has broken images in the preview but it will still work normally.</p>'
        );
        /* Design */
        // Template
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_design'
            ),
            'id' => 'siggen_design_template',
            'label' => 'Layout Template',
            'type' => 'select',
            'class' => 'siggen-input-wrap',
            'options' => array('Template 1', 'Template 2', 'Template 3', 'Template 4', 'Template 5'),
        );
        // Color
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_design'
            ),
            'id' => 'siggen_design_theme_color',
            'label' => 'Theme Colour',
            'type' => 'color',
            'class' => 'siggen-input-wrap',
        );
        // Logo
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_design'
            ),
            'id' => 'siggen_design_logo',
            'label' => 'Logo',
            'type' => 'image',
            'class' => 'siggen-input-wrap',
        );
        // Logo Ratio
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_design'
            ),
            'id' => 'siggen_design_logo_ratio',
            'label' => 'Logo Ratio',
            'description' => 'What ratio is your logo in?',
            'type' => 'radio',
            'class' => 'siggen-input-wrap',
            'options' => array('Landscape', 'Portrait', 'Square'),
        );
        /* Information */
        // First name
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info',
            ),
            'id' => 'siggen_info_firstname',
            'label' => 'First name',
            'type' => 'text',
            'placeholder' => 'Enter first name',
            'class' => 'siggen-input-wrap',
            
        );
        // Last name
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_lastname',
            'label' => 'Last name',
            'type' => 'text',
            'placeholder' => 'Enter last name',
            'class' => 'siggen-input-wrap',
        );
        // Position
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_position',
            'label' => 'Position',
            'type' => 'text',
            'placeholder' => 'Enter position',
            'class' => 'siggen-input-wrap',
        );
        // Phone
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_phone',
            'label' => 'Phone',
            'type' => 'text',
            'placeholder' => 'Enter phone number',
            'class' => 'siggen-input-wrap',
        );
        // Skype
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_skype',
            'label' => 'Skype',
            'type' => 'text',
            'placeholder' => 'Enter Skype',
            'class' => 'siggen-input-wrap',
        );
        // Address
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_address',
            'label' => 'Address',
            'type' => 'text',
            'placeholder' => 'Enter address',
            'class' => 'siggen-input-wrap',
        );
        // Is Address Linked?
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_address_linked',
            'label' => 'Link Address',
            'description' => 'Make address linkable to google maps?',
            'type' => 'radio',
            'class' => 'siggen-input-wrap',
            'options' => array('No', 'Yes'),
        );
        // Domain
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_domain',
            'label' => 'Domain',
            'type' => 'text',
            'placeholder' => 'Enter domain',
            'class' => 'siggen-input-wrap',
            'description' => 'URL without "http", "www". or trailing "/".'
        );
        // Extras
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_info'
            ),
            'id' => 'siggen_info_extras',
            'label' => 'Extras',
            'description' => 'Anything extra; shows at the bottom of the signature.',
            'type' => 'textarea',
            'placeholder' => 'Enter extras',
            'class' => 'siggen-input-wrap',
        );
        /* Socials */
        // Display Socials
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_display_socials',
            'label' => 'Display Socials',
            'type' => 'radio',
            'class' => 'siggen-input-wrap',
            'options' => array('No', 'Yes'),
        );
        // Facebook
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_facebook',
            'label' => 'Facebook',
            'type' => 'text',
            'placeholder' => 'Enter Facebook',
            'class' => 'siggen-input-wrap',
        );
        // Instagram
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_instagram',
            'label' => 'Instagram',
            'type' => 'text',
            'placeholder' => 'Enter Instagram',
            'class' => 'siggen-input-wrap',
        );
        // Twitter
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_twitter',
            'label' => 'Twitter',
            'type' => 'text',
            'placeholder' => 'Enter Twitter',
            'class' => 'siggen-input-wrap',
        );
        // YouTube
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_youtube',
            'label' => 'YouTube',
            'type' => 'text',
            'placeholder' => 'Enter YouTube',
            'class' => 'siggen-input-wrap',
        );
        // LinkedIn
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_linkedin',
            'label' => 'LinkedIn',
            'type' => 'text',
            'placeholder' => 'Enter LinkedIn',
            'class' => 'siggen-input-wrap',
        );
        // Medium
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_medium',
            'label' => 'Medium',
            'type' => 'text',
            'placeholder' => 'Enter Medium',
            'class' => 'siggen-input-wrap',
        );
        // Dribbble
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_dribbble',
            'label' => 'Dribbble',
            'type' => 'text',
            'placeholder' => 'Enter Dribbble',
            'class' => 'siggen-input-wrap',
        );
        // Pinterest
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_pinterest',
            'label' => 'Pinterest',
            'type' => 'text',
            'placeholder' => 'Enter Pinterest',
            'class' => 'siggen-input-wrap',
        );
        // Slack
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_slack',
            'label' => 'Slack',
            'type' => 'text',
            'placeholder' => 'Enter Slack',
            'class' => 'siggen-input-wrap',
        );
        // Reddit
        $fields[] = array(
            'metabox' => array(
                'name' => 'siggen_metabox_socials'
            ),
            'id' => 'siggen_social_reddit',
            'label' => 'Reddit',
            'type' => 'text',
            'placeholder' => 'Enter Reddit',
            'class' => 'siggen-input-wrap',
        );

        return $fields;
    }

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Cloning of SigGen is forbidden' ) ), esc_attr( $this->_version ) );

	} // End __clone ()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Unserializing instances of SigGen is forbidden' ) ), esc_attr( $this->_version ) );
	} // End __wakeup ()

	/**
	 * Installation. Runs on activation.
	 *
	 * @access  public
	 * @return  void
	 * @since   1.0.0
	 */
	public function install() {
        $this->_log_version_number();
        flush_rewrite_rules();
	} // End install ()

	/**
	 * Log the plugin version number.
	 *
	 * @access  public
	 * @return  void
	 * @since   1.0.0
	 */
	private function _log_version_number() { //phpcs:ignore
		update_option( $this->_token . '_version', $this->_version );
	} // End _log_version_number ()

}
