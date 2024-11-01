<?php
/**

Plugin Name: WP Analytics Tracking
Plugin URI: http://neoptin.com/
Description: Manage Google Analytics code or any other Tracking code
Author: Neoptin
Version: 1.0.2
Author URI: http://neoptin.com/

Copyright 2012 Neoptin

*/


//===============================================
// Plugin setup
//===============================================

/**
 * Hooks for install
 */
if (function_exists('register_uninstall_hook')) {
  register_deactivation_hook(__FILE__, 'wat_uninstall');
}

/**
 * Hooks for uninstall
 */
if( function_exists('register_activation_hook')){
  register_activation_hook(__FILE__, 'wat_install');
}


/**
 * INSTALL function
 */
function wat_install() {
  // Nothing to do
}

/**
 * UNINSTALL function
 */
function wat_uninstall() {
  // Unregister setting
  unregister_setting('wat-options-group', 'wat_content');
}


/**
 * Register menu
 */
add_action(
  'admin_menu',
  'wat_admin_menu'
);
function wat_admin_menu() {
    add_options_page(
      __("WP Analytics Tracking Options", "wp-analytics-tracking"), // Settings page title
      __("WP Analytics Tracking", "wp-analytics-tracking"),         // Menu name
      'administrator',                                              // Role needed
      'wp-analytics-tracking',                                      // ID
      'wat_settings_page'                                           // Callback function
    );
}

/**
 * Register option
 */
add_action(
  'admin_init',
  'wat_admin_init'
);
function wat_admin_init() {
  // We need a textarea
  register_setting('wat-options-group', 'wat_content');
}

/**
 * Display notice once activated ("Please configure it!")
 */
add_action(
  'admin_notices',
  'wat_admin_notices'
);
function wat_admin_notices() {
    if (strlen(trim(get_option('wat_content'))) == 0 &&
        substr( $_SERVER["PHP_SELF"], -11 ) == 'plugins.php') {
      echo '
      <div class="error">
        <p><strong>'
          .sprintf(
             __("%s is activated but no tracking code are specified. Please go to the <a href='%s'>settings page</a> in order to fill your tracking codes.", "wp-analytics-tracking"),
              __("WP Analytics Tracking"), get_admin_url().'options-general.php?page=wp-analytics-tracking'
           )
        .'</strong></p>
      </div>';
    }
}



//===============================================
// Back Office
//===============================================

/**
 * Display form of admin settings page
 */
function wat_settings_page() {
  echo '
<div class="wrap">
  <h2>'.__("WP Analytics Tracking Options").'</h2>
  
  <form method="post" action="options.php">';
  
  settings_fields('wat-options-group');
  
  echo '
    <table class="form-table">
      <tr valign="top">
        <th scope="row">
          '.__("Tracking codes", "wp-analytics-tracking").'
        </th>
        <td>
          <textarea name="wat_content"
                    style="font-family:monospace;"
                    rows="15"
                    cols="60">'.get_option('wat_content').'</textarea>
        </td>
      </tr>
    </table>';
  
  submit_button();
  
  echo '
  </form>
</div>';
}




//===============================================
// Front Office
//===============================================

/**
 * Display tracking codes in the footer
 */
add_action(
  'wp_footer',
  'wat_wp_footer'
);
function wat_wp_footer() {
    echo "<!-- Plugin: WP Analytics Tracking -->\n"
	.get_option('wat_content');
}
