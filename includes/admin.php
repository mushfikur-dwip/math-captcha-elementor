<?php
namespace MathCaptcha;

class Admin {
    public static function init() {
        add_action( 'admin_menu', [ __CLASS__, 'add_settings_page' ] );
    }

    public static function add_settings_page() {
        add_options_page(
            __( 'Math Captcha Settings', 'math-captcha-elementor' ),
            __( 'Math Captcha', 'math-captcha-elementor' ),
            'manage_options',
            'math-captcha-elementor',
            [ __CLASS__, 'render_settings_page' ]
        );
    }

    public static function render_settings_page() {
        echo '<h1>' . __( 'Math Captcha Settings', 'math-captcha-elementor' ) . '</h1>';
        // Add form for settings (e.g., difficulty level).
    }
}
Admin::init();
