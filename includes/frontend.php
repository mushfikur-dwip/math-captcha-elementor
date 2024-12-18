<?php
namespace MathCaptcha;

class Frontend {
    public static function init() {
        add_action( 'elementor_pro/forms/new_record', [ __CLASS__, 'validate_captcha' ], 10, 2 );
        add_action( 'elementor/element/form/section_advanced/after_section_end', [ __CLASS__, 'add_captcha_field' ], 10, 2 );
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
    }

    public static function add_captcha_field( $element, $args ) {
        $element->add_control(
            'enable_math_captcha',
            [
                'label' => __( 'Enable Math Captcha', 'math-captcha-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'math-captcha-elementor' ),
                'label_off' => __( 'No', 'math-captcha-elementor' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
    }

    public static function enqueue_scripts() {
        wp_enqueue_script( 'math-captcha-js', MATH_CAPTCHA_PLUGIN_URL . 'assets/js/math-captcha.js', [ 'jquery' ], '1.0', true );
        wp_enqueue_style( 'math-captcha-css', MATH_CAPTCHA_PLUGIN_URL . 'assets/css/math-captcha.css' );
    }

    public static function validate_captcha( $record, $handler ) {
        $raw_fields = $record->get( 'fields' );
        $captcha_field = $raw_fields['math_captcha'] ?? null;
        $captcha_answer = $_POST['math_captcha_answer'] ?? '';

        if ( $captcha_field && $captcha_field['value'] != $captcha_answer ) {
            $handler->add_error( 'math_captcha', __( 'Incorrect CAPTCHA answer.', 'math-captcha-elementor' ) );
        }
    }
}
