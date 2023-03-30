<?php
/**
 * Plugin Name: Dynamic Copyright Year
 * Plugin URI: https://yourpluginurl.com/
 * Description: Adds a dynamic copyright year to the footer of your website.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://yourauthorurl.com/
 */

// Add the dynamic year to the footer


// Add the dynamic year to the footer
function dynamic_copyright_year() {
    $current_year = date('Y');
    echo 'Copyright &copy; ' . $current_year;
}
add_action( 'wp_footer', 'dynamic_copyright_year');
