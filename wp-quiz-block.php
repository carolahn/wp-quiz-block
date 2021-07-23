<?php 

/*
    Plugin Name: Quiz Block
    Description: Plugin to create a quiz block with JSX
    Version: 1.0.0
    Author: Carolina Ahn
    Author URI: https://github.com/carolahn
*/

// Direct access is not allowed
if (!defined('ABSPATH')) {
    exit;
}

class QuizBlock {
    function __construct() {
        // add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
        add_action('init', array($this, 'adminAssets'));
    }

    function adminAssets() {
        // wp_enqueue_script('wp-quiz-block', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks'));
        wp_register_script('wp-quiz-block', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks'));
        register_block_type('wp-quiz-block/quiz-block', array(
            'editor_script' => 'wp-quiz-block',
            'render_callback' => array($this, 'theHTML')
        ));
    }

    function theHTML($attributes) {
        ob_start(); ?>
        <p>Today the sky is <?= esc_html($attributes['skyColor']) ?> and the grass is <?= esc_html($attributes['grassColor']) ?> !!</p>
        <?php return ob_get_clean();
    }
}

$quizBlock = new QuizBlock();