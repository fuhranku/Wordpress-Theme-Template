<?php 

/**
 *   Theme functions.
 *  
 *  @package hammersportmarketing
 */

// echo '<pre>';
// print_r($path);
// wp_die();

if (!defined('HSM_DIR_PATH')){
    define('HSM_DIR_PATH', untrailingslashit( get_template_directory() ));
}

if (!defined('HSM_DIR_URI')){
    define('HSM_DIR_URI', untrailingslashit( get_template_directory_uri() ));
}

if (!defined('HSM_BUILD_URI')){
    define('HSM_BUILD_URI', untrailingslashit( get_template_directory_uri()) . '/assets/build');
}

if (!defined('HSM_BUILD_JS_URI')){
    define('HSM_BUILD_JS_URI', untrailingslashit( get_template_directory_uri()) . '/assets/build/js');
}

if (!defined('HSM_BUILD_JS_DIR_PATH')){
    define('HSM_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) .  '/assets/build/js');
}

if (!defined('HSM_BUILD_IMG_URI')){
    define('HSM_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri()) . '/assets/build/img');
}

if (!defined('HSM_BUILD_CSS_URI')){
    define('HSM_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri()) . '/assets/build/css');
}

if (!defined('HSM_BUILD_CSS_DIR_PATH')){
    define('HSM_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) .  '/assets/build/css');
}

require_once HSM_DIR_PATH . '/inc/helpers/autoloader.php';
require_once HSM_DIR_PATH . '/inc/helpers/template-tags.php';

function hsm_get_theme_instance(){
    \HAMMERSPORTMARKETING\Inc\HSM_THEME::get_instance();
}

hsm_get_theme_instance();



?>

