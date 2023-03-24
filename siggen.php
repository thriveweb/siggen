<?php
/**
 * Plugin Name: THRIVE eSig Gen
 * Version: 1.0.3
 * Description: Enter your details and we will generator you an email signature.
 * Author: Thrive Web
 * Author URI: https://thriveweb.com.au
 * Requires at least: 4.0
 * Tested up to: 6.1.1
 *
 * Text Domain: siggen
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Thrive Web
 * @since 1.0.3
 */

if (!defined('ABSPATH')) {
	exit;
}

// Load plugin class files.
require_once 'includes/class-siggen.php';
require_once 'includes/class-siggen-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-siggen-admin-api.php';
require_once 'includes/lib/class-siggen-post-type.php';
require_once 'includes/lib/class-siggen-taxonomy.php';

/**
 * Returns the main instance of SigGen to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object SigGen
 */
function siggen() {
    $instance = SigGen::instance(__FILE__, '1.0.0');

    //if (is_null($instance->settings)) {
        //$instance->settings = SigGen_Settings::instance($instance);
    //}

    return $instance;
}

siggen();