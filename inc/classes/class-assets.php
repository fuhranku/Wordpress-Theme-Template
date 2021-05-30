<?php 
/**
 * Enqueue Theme assets
 * 
 * @package Hammersportmarketing
 */

 namespace HAMMERSPORTMARKETING\Inc;

 use HAMMERSPORTMARKETING\Inc\Traits\Singleton;

 class Assets{
     use Singleton;

     protected function __construct(){

        // Load class
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        // Actions and filters 
        add_action( 'wp_enqueue_scripts',[$this, 'register_styles'] );
        add_action( 'wp_enqueue_scripts',[$this, 'register_scripts'] );

    }

    public function register_styles(){
        // Register Styles
        wp_register_style('index-css', HSM_BUILD_CSS_URI . '/index.css', [], filemtime(HSM_BUILD_CSS_DIR_PATH . '/index.css'), 'all' );

        // Enqueue Styles
        wp_enqueue_style( 'index-css' );

    }

    public function register_scripts(){
        // Register Scripts
        wp_register_script('index-js', HSM_BUILD_JS_URI . '/index.js',
        ['jquery'],filemtime(HSM_BUILD_JS_DIR_PATH . '/index.js'),true);

        // Enqueue Scripts
        wp_enqueue_script('index-js');
    }
 }