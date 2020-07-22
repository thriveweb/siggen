<?php 
// only show if user is admin
if (current_user_can('manage_options')) {

$post_id = get_the_ID();
$post_meta = get_post_meta($post_id);

$siggen_design_template = $post_meta['siggen_design_template'][0];
$siggen_design_theme_color = $post_meta['siggen_design_theme_color'][0];
$siggen_design_logo = $post_meta['siggen_design_logo'][0];

$siggen_info_firstname = $post_meta['siggen_info_firstname'][0];
$siggen_info_lastname = $post_meta['siggen_info_lastname'][0];
$siggen_info_position = $post_meta['siggen_info_position'][0];
$siggen_info_phone = $post_meta['siggen_info_phone'][0];
$siggen_info_address = $post_meta['siggen_info_address'][0];
$siggen_info_address_linked = $post_meta['siggen_info_address_linked'][0];
$siggen_info_skype = $post_meta['siggen_info_skype'][0];
$siggen_info_domain = $post_meta['siggen_info_domain'][0];
$siggen_info_extras = $post_meta['siggen_info_extras'][0];

$siggen_display_socials = $post_meta['siggen_display_socials'][0];
$siggen_social_facebook = $post_meta['siggen_social_facebook'][0];
$siggen_social_instagram = $post_meta['siggen_social_instagram'][0];
$siggen_social_twitter = $post_meta['siggen_social_twitter'][0];
$siggen_social_youtube = $post_meta['siggen_social_youtube'][0];
$siggen_social_linkedin = $post_meta['siggen_social_linkedin'][0];
$siggen_social_medium = $post_meta['siggen_social_medium'][0];
$siggen_social_dribbble = $post_meta['siggen_social_dribbble'][0];
$siggen_social_pinterest = $post_meta['siggen_social_pinterest'][0];
$siggen_social_slack = $post_meta['siggen_social_slack'][0];
$siggen_social_reddit = $post_meta['siggen_social_reddit'][0];
?>

<?php // template 1
if ($siggen_design_template == 0) { 
    // logo styles
    $siggen_design_logo_ratio = $post_meta['siggen_design_logo_ratio'][0];
    if ($siggen_design_logo_ratio == 0) { //landscape
        $logo_style = 'max-height: none; height: auto; max-width: 200px; width: 100%; margin: 40px 20px;';
    } else if ($siggen_design_logo_ratio == 1) { // portrait
        $logo_style = 'max-height: 120px; height: 100%; max-width: none; width: auto; margin: 10px 40px;';
    } else if ($siggen_design_logo_ratio == 2) { // square
        $logo_style = 'max-height: 120px; height: 100%; max-width: 120px; width: 100%; margin: 10px 40px;';
    } ?>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css"> table {border-collapse:separate;} a, a:link, a:visited, a[href], a:hover {text-decoration:none !important; color: #000000;} h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000000 !important;} .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;} .ExternalClass {width: 100%;}</style>
        <!--[if gte mso 9]>
        <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
    </head>
    <body style="margin: 0;padding: 0;" cz-shortcut-listen="true"><br>
        <table style="max-width:100%;padding:0;border-top: 1px solid #e6e6e6;" width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td style="padding: 25px 0 0 0; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                        <?php if ($siggen_design_logo) { ?>
                            <table cellspacing="0" cellpadding="0" align="left">
                                <tbody>
                                    <tr>
                                        <td style="mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                            <img src="<?php echo wp_get_attachment_url($siggen_design_logo); ?>" border="0" alt="Logo" style="display: inline!important; vertical-align: middle; border: 0; outline: none;text-decoration: none; <?php echo $logo_style; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        <table cellspacing="0" cellpadding="0" align="left" style="border-left:1px solid <?php echo $siggen_design_theme_color; ?>;padding:0 0 0 25px;">
                            <tbody>
                                <tr>
                                    <td style="color:#222222;color:#222222 !important;font-family:&#39;Roboto&#39;, Arial, sans-serif;font-weight:normal;letter-spacing:1px;font-size:13px;text-decoration:none !important;mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                        <p style="font-weight: bold;color: #222222; margin: 0 0 19px 0; font-size: 15px;mso-line-height: exactly;line-height: 120%;text-transform: uppercase;"><span style="color:<?php echo $siggen_design_theme_color; ?>;color:<?php echo $siggen_design_theme_color;  ?> !important;margin:0 !important;font-weight:bold;font-size:15px;"><?php echo $siggen_info_firstname.' '.$siggen_info_lastname; ?></span><span style="color:#222222; margin: 0 !important;"><?php echo ($siggen_info_position ?  ' – '.$siggen_info_position : ''); ?></span></p>
                                        <?php if ($siggen_info_phone) { ?><p style="color:#222222;color:#222222 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 4px 0;mso-line-height: exactly;line-height: 120%;"><span style="margin: 0; color: #222222; font-weight: bold;">Phone: </span><a href="tel:<?php echo $siggen_info_phone; ?>" style="color: #222222; color: #222222 !important; text-decoration:none;text-decoration:none !important;margin:0 !important;"><font color="#222222"><?php echo $siggen_info_phone; ?></font></a></p><?php } ?>
                                        <?php if ($siggen_info_skype) { ?><p style="color:#222222;color:#222222 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 4px 0;mso-line-height: exactly;line-height: 120%;"><span style="margin: 0; color: #222222; font-weight: bold;">Skype: </span><?php echo $siggen_info_skype; ?></p><?php } ?>
                                        <?php if ($siggen_info_address) { ?><p style="color:#222222;color:#222222 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 15px 0;mso-line-height: exactly;line-height: 120%;"><span style="margin: 0; color: #222222; font-weight: bold;">Location: </span><?php if ($siggen_info_address_linked) { ?><a href="https://www.google.com/maps/place/<?php echo urlencode($siggen_info_address); ?>" target="_blank" style="color: #222222; color: #222222 !important; text-decoration:none;text-decoration:none !important;margin:0 !important;"><?php } ?><font color="#222222"><?php echo $siggen_info_address; ?></font><?php echo ($siggen_info_address_linked ? '</a>' : ''); ?></p><?php } ?>
                                        <?php if ($siggen_info_domain) { ?><p style="color:<?php echo $siggen_design_theme_color; ?>;color:<?php echo $siggen_design_theme_color; ?> !important;text-decoration:none;text-decoration:none !important;margin: 0 0 18px 0;font-weight: bold;mso-line-height: exactly;line-height: 120%;"><a href="https://<?php echo $siggen_info_domain; ?>" target="_blank" style="color: <?php echo $siggen_design_theme_color; ?>; color: <?php echo $siggen_design_theme_color; ?> !important; text-decoration:none;text-decoration:none !important;margin:0 !important;"><font color="<?php echo $siggen_design_theme_color;  ?>"><?php echo $siggen_info_domain; ?></font></a></p><?php } ?>
                                        <?php if ($siggen_display_socials) { ?>
                                            <p style="margin:0">
                                                <?php if ($siggen_social_facebook) { ?>
                                                    <a href="<?php echo $siggen_social_facebook; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;mso-line-height: exactly;line-height: 120%;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/facebook.png', dirname(__FILE__))); ?>" alt="Facebook" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_instagram) { ?>
                                                    <a href="<?php echo $siggen_social_instagram; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/instagram.png', dirname(__FILE__))); ?>" alt="Instagram" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_twitter) { ?>
                                                    <a href="<?php echo $siggen_social_twitter; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/twitter.png', dirname(__FILE__))); ?>" alt="Twitter" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_youtube) { ?>
                                                    <a href="<?php echo $siggen_social_youtube; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/youtube.png', dirname(__FILE__))); ?>" alt="YouTube" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_linkedin) { ?>
                                                    <a href="<?php echo $siggen_social_linkedin; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/linkedin.png', dirname(__FILE__))); ?>" alt="LinkedIn" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_medium) { ?>
                                                    <a href="<?php echo $siggen_social_medium; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/medium.png', dirname(__FILE__))); ?>" alt="Medium" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_dribbble) { ?>
                                                    <a href="<?php echo $siggen_social_dribbble; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/dribbble.png', dirname(__FILE__))); ?>" alt="Dribbble" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_pinterest) { ?>
                                                    <a href="<?php echo $siggen_social_pinterest; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/pinterest.png', dirname(__FILE__))); ?>" alt="Pinterest" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_slack) { ?>
                                                    <a href="<?php echo $siggen_social_slack; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/slack.png', dirname(__FILE__))); ?>" alt="Slack" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_reddit) { ?>
                                                    <a href="<?php echo $siggen_social_reddit; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/reddit.png', dirname(__FILE__))); ?>" alt="Reddit" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } ?>
                                            </p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <?php if ($siggen_info_extras) { ?>
                    <tr>
                        <td style="padding: 20px 0 0 0;mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                            <p style="max-width: 620px;margin-top: 10px;padding: 0 10px;font-size: 11px;line-height: 1.3;color: #c4c4c4;font-style: italic;"><?php echo $siggen_info_extras; ?></p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </body>
    </html>
<?php // template 2
} else if ($siggen_design_template == 1) {
    // logo styles
    $siggen_design_logo_ratio = $post_meta['siggen_design_logo_ratio'][0];
    if ($siggen_design_logo_ratio == 0) { //landscape
        $logo_style = 'max-height: none; height: auto; max-width: 200px; width: 100%;';
    } else if ($siggen_design_logo_ratio == 1) { // portrait
        $logo_style = 'max-height: 120px; height: 100%; max-width: none; width: auto;';
    } else if ($siggen_design_logo_ratio == 2) { // square
        $logo_style = 'max-height: 120px; height: 100%; max-width: 120px; width: 100%;';
    } ?>
    <html>
    <head>
        <style type="text/css"> table {border-collapse:separate;} a, a:link, a:visited, a[href], a:hover {text-decoration:none !important; color: #000000;} h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000000 !important;} .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;} .ExternalClass {width: 100%;}</style>
        <!--[if gte mso 9]>
        <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    </head>
    <body style="margin: 0;padding: 0;"><br>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;padding:0;margin:0; border-top: 1px solid #dddddd;">
            <tbody>
                <?php if ($siggen_design_logo) { ?>
                    <tr>
                        <td style="padding:25px 0 0 25px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                            <img src="<?php echo wp_get_attachment_url($siggen_design_logo); ?>" alt="Logo" border="0" style="padding: 0; display: inline !important; border: 0; outline: none;text-decoration: none; <?php echo $logo_style; ?>">
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td style="font-family: MONTSERRAT, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, Arial, sans-serif;font-size: 19px;text-transform: uppercase;color:#000000;padding: 25px 0 0 25px;font-weight:bold; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                        <p style="margin: 0;mso-line-height: exactly;line-height: 120%;"><?php echo $siggen_info_firstname.' '.$siggen_info_lastname; ?></p>
                    </td>
                </tr>
                <?php if ($siggen_info_position) { ?>
                    <tr>
                        <td style="font-family: MONTSERRAT, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, sans-serif;font-size: 11px;color:#4d4d4e;padding: 4px 0 0 25px;letter-spacing: 1px;color:<?php echo $siggen_design_theme_color; ?>;text-transform: uppercase;font-weight: 400;mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                            <p style="margin: 0;mso-line-height: exactly;line-height: 120%;"><span style="margin-right: 40px;"><?php echo $siggen_info_position; ?></span></p>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td style="font-family: MONTSERRAT, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, Arial, sans-serif;font-size: 13px;padding: 25px 0 0 25px;letter-spacing: 1px;color:#787883;font-weight: 400; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                        <?php if ($siggen_info_phone) { ?>
                            <p style="color:#787883;color:#787883 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 8px 0;mso-line-height: exactly;line-height: 120%;">
                                <span style="color: <?php echo $siggen_design_theme_color; ?>;">P: </span>
                                <a href="tel:<?php echo $siggen_info_phone; ?>" target="_blank" style="color: #787883; color: #787883 !important; text-decoration:none;text-decoration:none !important;margin:0 !important;">
                                    <font color="#787883" style="text-decoration:none;text-decoration:none !important;"><?php echo $siggen_info_phone; ?></font>
                                </a>
                            </p>
                        <?php } ?>
                        <?php if ($siggen_info_skype) { ?>
                            <p style="color:#787883;color:#787883 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 8px 0;mso-line-height: exactly;line-height: 120%;">
                                <span style="color: <?php echo $siggen_design_theme_color; ?>;">S: </span>
                                <font color="#787883" style="text-decoration:none;text-decoration:none !important;"><?php echo $siggen_info_skype; ?></font>
                            </p>
                        <?php } ?>
                        <?php if ($siggen_info_address) { ?>
                            <p style="color:#787883;color:#787883 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 8px 0;mso-line-height: exactly;line-height: 120%;">
                                <span style="color: <?php echo $siggen_design_theme_color; ?>;">L: </span>
                                <?php if ($siggen_info_address_linked) { ?>
                                    <a href="https://www.google.com/maps/place/<?php echo urlencode($siggen_info_address); ?>" target="_blank" style="color: #787883;text-decoration:none !important; text-decoration:none;margin:0 !important;">
                                <?php } ?>
                                    <font color="#787883" style="text-decoration:none;text-decoration:none !important;"><?php echo $siggen_info_address; ?></font>
                                <?php echo ($siggen_info_address_linked ? '</a>' : ''); ?>
                            </p>
                        <?php } ?>
                        <?php if ($siggen_info_domain) { ?>
                            <p style="color:#787883;color:#787883 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 8px 0;mso-line-height: exactly;line-height: 120%;">
                                <span style="color: <?php echo $siggen_design_theme_color; ?>;">W: </span>
                                <a href="https://<?php echo $siggen_info_domain; ?>" target="_blank" style="color: #787883;text-decoration:none;text-decoration:none !important;margin:0 !important;">
                                    <font color="#787883" style="text-decoration:none;text-decoration:none !important;"><?php echo $siggen_info_domain; ?></font>
                                </a>
                            </p> 
                        <?php } ?>    
                    </td>
                </tr>
                <?php if ($siggen_display_socials) { ?>
                    <tr>
                        <td style="font-family: MONTSERRAT, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, Arial, sans-serif;font-size: 13px;padding: 19px 0 0 25px;letter-spacing: 1px;color:#55BE9A;font-weight: 400; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                            <p style="margin:0">
                                <?php if ($siggen_social_facebook) { ?>
                                    <a href="<?php echo $siggen_social_facebook; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;mso-line-height: exactly;line-height: 120%;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/facebook.png', dirname(__FILE__))); ?>" alt="Facebook" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_instagram) { ?>
                                    <a href="<?php echo $siggen_social_instagram; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/instagram.png', dirname(__FILE__))); ?>" alt="Instagram" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_twitter) { ?>
                                    <a href="<?php echo $siggen_social_twitter; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/twitter.png', dirname(__FILE__))); ?>" alt="Twitter" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_youtube) { ?>
                                    <a href="<?php echo $siggen_social_youtube; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/youtube.png', dirname(__FILE__))); ?>" alt="YouTube" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_linkedin) { ?>
                                    <a href="<?php echo $siggen_social_linkedin; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/linkedin.png', dirname(__FILE__))); ?>" alt="LinkedIn" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_medium) { ?>
                                    <a href="<?php echo $siggen_social_medium; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/medium.png', dirname(__FILE__))); ?>" alt="Medium" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_dribbble) { ?>
                                    <a href="<?php echo $siggen_social_dribbble; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/dribbble.png', dirname(__FILE__))); ?>" alt="Dribbble" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_pinterest) { ?>
                                    <a href="<?php echo $siggen_social_pinterest; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/pinterest.png', dirname(__FILE__))); ?>" alt="Pinterest" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_slack) { ?>
                                    <a href="<?php echo $siggen_social_slack; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/slack.png', dirname(__FILE__))); ?>" alt="Slack" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_reddit) { ?>
                                    <a href="<?php echo $siggen_social_reddit; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="24" height="24" src="<?php echo esc_url(plugins_url('../assets/img/socials/circle/reddit.png', dirname(__FILE__))); ?>" alt="Reddit" style="max-width: 24px; width: 24px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } ?>
                            </p>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($siggen_info_extras) { ?>
                    <tr>
                        <td style="padding: 19px 0 0 20px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                            <p style="max-width: 620px;margin-top: 10px;padding: 0 10px;font-size: 11px;line-height: 1.3;color: #c4c4c4;font-style: italic;"><?php echo $siggen_info_extras; ?></p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
    </html>
<?php // template 3
} else if ($siggen_design_template == 2) { 
    // logo styles
    $siggen_design_logo_ratio = $post_meta['siggen_design_logo_ratio'][0];
    if ($siggen_design_logo_ratio == 0) { //landscape
        $logo_style = 'max-height: none; height: auto; max-width: 200px; width: 100%;';
    } else if ($siggen_design_logo_ratio == 1) { // portrait
        $logo_style = 'max-height: 60px; height: 100%; max-width: none; width: auto;';
    } else if ($siggen_design_logo_ratio == 2) { // square
        $logo_style = 'max-height: 60px; height: 100%; max-width: 60px; width: 100%;';
    } ?>
    <html>
    <head>
        <style type="text/css"> table {border-collapse:separate;} a, a:link, a:visited, a[href], a:hover {text-decoration:none !important; color: #000000;} h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000000 !important;} .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;} .ExternalClass {width: 100%;}</style>
        <!--[if gte mso 9]>
        <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    </head>
    <body style="margin: 0;padding: 0;"><br>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;padding:0;margin:0; border-top: 2px solid #eeeeee;">
            <tbody>
                <?php if ($siggen_design_logo) { ?>
                    <tr>
                        <td style="padding: 10px 0px 0px 10px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                            <p style="text-decoration:none;text-decoration:none !important;margin: 0;mso-line-height: exactly;line-height: 120%;mso-line-height: exactly;line-height: 120%;">
                                <a href="https://<?php echo $siggen_info_domain; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 !important;"><img style="padding: 0; display: inline!important; border: 0; outline: none;text-decoration: none; <?php echo $logo_style; ?>" src="<?php echo wp_get_attachment_url($siggen_design_logo); ?>" alt="Logo"></a>
                            </p>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td style="padding: 10px 0px 0px 10px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">  
                        <p style="font-family: corbel, arial, sans-serif; color: #000000; text-transform: uppercase; font-weight: bold;font-size: 11pt;color: #000000;margin: 0;mso-line-height: exactly;line-height: 120%;mso-line-height: exactly;line-height: 120%;"><?php echo $siggen_info_firstname.' '.$siggen_info_lastname; ?></p>
                        <?php if ($siggen_info_position) { ?><p style="font-family: corbel, arial, sans-serif; color: #000000; text-transform: uppercase; font-weight: lighter;font-size: 9pt;color: #000000;margin: 0;mso-line-height: exactly;line-height: 120%;mso-line-height: exactly;line-height: 120%;"><?php echo $siggen_info_position; ?></p><?php } ?>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 0px 0px 10px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                        <p style="text-decoration:none;text-decoration:none !important;margin: 0;mso-line-height: exactly;line-height: 120%;mso-line-height: exactly;line-height: 120%;">
                            <?php if ($siggen_info_domain) { ?>
                                <a href="https://<?php echo $siggen_info_domain; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;mso-line-height: exactly;line-height: 120%;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/earth.png', dirname(__FILE__))); ?>" alt="Website" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                            <?php } ?>
                            <?php if ($siggen_info_phone) { ?>
                                <a href="tel:<?php echo $siggen_info_phone; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;mso-line-height: exactly;line-height: 120%;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/phone.png', dirname(__FILE__))); ?>" alt="Phone" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                            <?php } ?>
                            <?php if ($siggen_display_socials) { ?>
                                <?php if ($siggen_social_facebook) { ?>
                                    <a href="<?php echo $siggen_social_facebook; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;mso-line-height: exactly;line-height: 120%;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/facebook.png', dirname(__FILE__))); ?>" alt="Facebook" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_instagram) { ?>
                                    <a href="<?php echo $siggen_social_instagram; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/instagram.png', dirname(__FILE__))); ?>" alt="Instagram" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_twitter) { ?>
                                    <a href="<?php echo $siggen_social_twitter; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/twitter.png', dirname(__FILE__))); ?>" alt="Twitter" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_youtube) { ?>
                                    <a href="<?php echo $siggen_social_youtube; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/youtube.png', dirname(__FILE__))); ?>" alt="YouTube" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_linkedin) { ?>
                                    <a href="<?php echo $siggen_social_linkedin; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/linkedin.png', dirname(__FILE__))); ?>" alt="LinkedIn" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_medium) { ?>
                                    <a href="<?php echo $siggen_social_medium; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/medium.png', dirname(__FILE__))); ?>" alt="Medium" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_dribbble) { ?>
                                    <a href="<?php echo $siggen_social_dribbble; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/dribbble.png', dirname(__FILE__))); ?>" alt="Dribbble" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_pinterest) { ?>
                                    <a href="<?php echo $siggen_social_pinterest; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/pinterest.png', dirname(__FILE__))); ?>" alt="Pinterest" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_slack) { ?>
                                    <a href="<?php echo $siggen_social_slack; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/slack.png', dirname(__FILE__))); ?>" alt="Slack" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } if ($siggen_social_reddit) { ?>
                                    <a href="<?php echo $siggen_social_reddit; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 3px 0 0 !important;"><img width="16" height="16" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/reddit.png', dirname(__FILE__))); ?>" alt="Reddit" style="max-width: 16px; width: 16px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                <?php } ?>
                            <?php } ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
<?php // template 4
} else if ($siggen_design_template == 3) { 
    // logo styles
    $siggen_design_logo_ratio = $post_meta['siggen_design_logo_ratio'][0];
    if ($siggen_design_logo_ratio == 0) { //landscape
        $logo_style = 'max-height: none; height: auto; max-width: 120px; width: 100%;';
    } else if ($siggen_design_logo_ratio == 1) { // portrait
        $logo_style = 'max-height: 70px; height: 100%; max-width: none; width: auto;';
    } else if ($siggen_design_logo_ratio == 2) { // square
        $logo_style = 'max-height: 70px; height: 100%; max-width: 70px; width: 100%;';
    } ?>
    <html>
        <head>
        <style type="text/css"> table {border-collapse:separate;} a, a:link, a:visited, a[href], a:hover {text-decoration:none !important; color: #000000;} h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000000 !important;} .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;} .ExternalClass {width: 100%;}</style>
        <!--[if gte mso 9]>
        <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    </head>
    <body style="margin: 0;padding: 0;"><br>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;padding:0;margin:0; border-top: 4px solid <?php echo $siggen_design_theme_color; ?>;">
            <tbody>
                <tr>
                    <td style="padding: 25px 0 0 28px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                        <?php if ($siggen_design_logo) { ?>
                            <table cellspacing="0" cellpadding="0" align="left">
                                <tbody>
                                    <tr>
                                        <td style="padding: 0px 37px 0 0; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                            <a href="https://<?php echo $siggen_info_domain; ?>" target="_blank" style="display:inline-block;"><img src="<?php echo wp_get_attachment_url($siggen_design_logo); ?>" alt="Logo" style=";padding: 0; display: inline!important; border: 0; outline: none;text-decoration: none; <?php echo $logo_style; ?>" border="0"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        <table cellspacing="0" cellpadding="0" align="left">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;font-family: Lexia, Arial, sans-serif;letter-spacing: normal; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                        <p style="margin: 0 0 11px 0;font-size: 22px;color: #333742;font-weight: 100;mso-line-height: exactly;line-height: 120%;"><?php echo $siggen_info_firstname.' '.$siggen_info_lastname; ?></p>
                                        <?php if ($siggen_info_position) { ?><p style="color: #c7c7c7;color: #c7c7c7 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 11px 0;font-size: 12px;font-weight: 100;font-family: Arial, sans-serif;text-transform: uppercase;letter-spacing: 0.4px;mso-line-height: exactly;line-height: 120%;"><?php echo $siggen_info_position; ?></p><?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: Open Sans, Arial, sans-serif;font-size: 16px;padding: 15px 0 0 0;color: #8e9094;font-weight: 100;letter-spacing: 0.1px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                        <?php if ($siggen_info_domain) { ?>
                                            <p style="color: <?php echo $siggen_design_theme_color; ?>;<?php echo $siggen_design_theme_color; ?> !important;text-decoration:none;text-decoration:none !important;margin: 0 0 8px 0;letter-spacing: 0.4px;font-weight: normal;mso-line-height: exactly;line-height: 120%;">
                                                <a href="https://<?php echo $siggen_info_domain; ?>" style="color: <?php echo $siggen_design_theme_color; ?>; color: <?php echo $siggen_design_theme_color; ?> !important; text-decoration:none;text-decoration:none !important;margin:0 !important;"><font style="text-decoration:none;text-decoration:none !important;" color="<?php echo $siggen_design_theme_color; ?>"><?php echo $siggen_info_domain; ?></font></a>
                                            </p>
                                        <?php } ?>
                                        <?php if ($siggen_info_phone) { ?>
                                            <p style="color: #8e9094;color: #8e9094 !important;text-decoration:none;text-decoration:none !important;margin: 0 0 8px 0;mso-line-height: exactly;line-height: 120%;">
                                                <a href="tel:<?php echo $siggen_info_phone; ?>" style="color: #8e9094; color: #8e9094 !important; text-decoration:none;text-decoration:none !important;margin:0 !important;"><font style="text-decoration:none;text-decoration:none !important;" color="#8e9094"><?php echo $siggen_info_phone; ?></font></a>
                                            </p>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php if ($siggen_display_socials) { ?>
                                    <tr>
                                        <td style="padding: 5px 0 0 0; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                            <p style="margin:0;text-decoration:none;text-decoration:none !important;mso-line-height: exactly;line-height: 120%;">
                                                <?php if ($siggen_social_facebook) { ?>
                                                    <a href="<?php echo $siggen_social_facebook; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;mso-line-height: exactly;line-height: 120%;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/facebook.png', dirname(__FILE__))); ?>" alt="Facebook" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_instagram) { ?>
                                                    <a href="<?php echo $siggen_social_instagram; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/instagram.png', dirname(__FILE__))); ?>" alt="Instagram" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_twitter) { ?>
                                                    <a href="<?php echo $siggen_social_twitter; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/twitter.png', dirname(__FILE__))); ?>" alt="Twitter" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_youtube) { ?>
                                                    <a href="<?php echo $siggen_social_youtube; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/youtube.png', dirname(__FILE__))); ?>" alt="YouTube" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_linkedin) { ?>
                                                    <a href="<?php echo $siggen_social_linkedin; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/linkedin.png', dirname(__FILE__))); ?>" alt="LinkedIn" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_medium) { ?>
                                                    <a href="<?php echo $siggen_social_medium; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/medium.png', dirname(__FILE__))); ?>" alt="Medium" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_dribbble) { ?>
                                                    <a href="<?php echo $siggen_social_dribbble; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/dribbble.png', dirname(__FILE__))); ?>" alt="Dribbble" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_pinterest) { ?>
                                                    <a href="<?php echo $siggen_social_pinterest; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/pinterest.png', dirname(__FILE__))); ?>" alt="Pinterest" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_slack) { ?>
                                                    <a href="<?php echo $siggen_social_slack; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/slack.png', dirname(__FILE__))); ?>" alt="Slack" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } if ($siggen_social_reddit) { ?>
                                                    <a href="<?php echo $siggen_social_reddit; ?>" target="_blank" style="text-decoration:none;text-decoration:none !important;margin:0 10px 0 0 !important;"><img width="20" height="20" src="<?php echo esc_url(plugins_url('../assets/img/socials/normal/reddit.png', dirname(__FILE__))); ?>" alt="Reddit" style="max-width: 20px; width: 20px;padding: 0; display: inline!important; vertical-align: middle; border: 0; height: auto; outline: none;text-decoration: none;"></a>
                                                <?php } ?>
                                            </p>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
<?php // template 5
} else if ($siggen_design_template == 4) { 
    // logo styles
    $siggen_design_logo_ratio = $post_meta['siggen_design_logo_ratio'][0];
    if ($siggen_design_logo_ratio == 0) { //landscape
        $logo_style = 'max-height: none; height: auto; max-width: 120px; width: 100%;';
    } else if ($siggen_design_logo_ratio == 1) { // portrait
        $logo_style = 'max-height: 80px; height: 100%; max-width: none; width: auto;';
    } else if ($siggen_design_logo_ratio == 2) { // square
        $logo_style = 'max-height: 80px; height: 100%; max-width: 80px; width: 100%;';
    } ?>
    <html>
    <head>
        <style type="text/css"> table {border-collapse:separate;} a, a:link, a:visited, a[href], a:hover {text-decoration:none !important; color: #000000;} h2,h2 a,h2 a:visited,h3,h3 a,h3 a:visited,h4,h5,h6,.t_cht {color:#000000 !important;} .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;} .ExternalClass {width: 100%;}</style>
        <!--[if gte mso 9]>
        <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    </head>
    <body style="margin: 0;padding: 0;"><br>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;padding:0;margin:0; border-top: 1px solid #ddd">
            <tbody>
                <tr>
                    <td style="padding: 30px 0 0 30px; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                        <?php if ($siggen_design_logo) { ?>
                            <table cellspacing="0" cellpadding="0" align="left">
                                <tbody>
                                    <tr>
                                        <td style="float: left;padding: 0 30px 30px 0; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                            <img src="<?php echo wp_get_attachment_url($siggen_design_logo); ?>" style="padding: 0; display: inline!important; border: 0; outline: none;text-decoration: none; <?php echo $logo_style; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        <table cellspacing="0" cellpadding="0" align="left">
                            <tbody>
                                <tr>
                                    <td style="float: left;padding: 0 0 0 30px;font-family: Work Sans, Arial, sans-serif;border-left: 2px solid <?php echo $siggen_design_theme_color; ?>;margin: 0; mso-line-height:exactly;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;line-height:100%;word-break:break-word;">
                                        <p style="text-transform: uppercase;line-height: normal;font-size: 18px;color: #000000;font-weight: 500;margin: 0;"><?php echo $siggen_info_firstname.' '.$siggen_info_lastname; ?></p>
                                        <?php if ($siggen_info_position) { ?><p style="line-height: normal;font-size: 14px;color: #000000;font-weight: 500;margin: 0 0 12px 0; color: <?php echo $siggen_design_theme_color; ?>;"><?php echo $siggen_info_position; ?></p><?php } ?>
                                        <?php if ($siggen_info_phone) { ?>
                                            <p style="color:#000000;color:#000000 !important;text-decoration:none;text-decoration:none !important;margin:0 0 10px 0;font-size: 12px;letter-spacing: 1px;font-weight: 400;">
                                                <a style="color:#000000;color:#000000 !important;text-decoration:none;text-decoration:none !important;margin:0 !important;" href="tel:<?php echo $siggen_info_phone; ?>" target="_blank"><font color="#000000"><?php echo $siggen_info_phone; ?></font></a>
                                            </p>
                                        <?php } ?>
                                        <?php if ($siggen_info_domain) { ?>
                                            <p style="color:#000000;color:#000000 !important;text-decoration:none;text-decoration:none !important;margin:0;font-size: 12px;letter-spacing: 1px;font-weight: 400;">
                                                <a style="color:#000000;color:#000000 !important;text-decoration:none;text-decoration:none !important;margin:0 !important;" href="https://<?php echo $siggen_info_domain; ?>" target="_blank"><font color="#000000"><?php echo $siggen_info_domain; ?></font></a>
                                            </p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
<?php } ?>


<?php } else {
    // if not logged in as admin, redirect to 404
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    get_template_part(404); 
    exit();
} ?>