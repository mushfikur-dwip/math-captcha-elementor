<?php
/**
 * Plugin Name: Math Captcha for Elementor Forms
 * Description: Adds a simple math CAPTCHA to Elementor forms to prevent spam submissions.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: math-captcha-elementor
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constants.
define( 'MATH_CAPTCHA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MATH_CAPTCHA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include files.
require_once MATH_CAPTCHA_PLUGIN_DIR . 'includes/admin.php';
require_once MATH_CAPTCHA_PLUGIN_DIR . 'includes/frontend.php';

// Initialize the plugin.
function math_captcha_elementor_init() {
    if ( did_action( 'elementor/loaded' ) ) {
        \MathCaptcha\Frontend::init();
    }
}
add_action( 'plugins_loaded', 'math_captcha_elementor_init' );
