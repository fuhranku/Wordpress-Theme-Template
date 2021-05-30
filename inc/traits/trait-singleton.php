<?php 
/**
 * Singleton trait which implements Singleton pattern in any class in which this trait is used.
 *
 * Using the singleton pattern in WordPress is an easy way to protect against
 * mistakes caused by creating multiple objects or multiple initialization
 * of classes which need to be initialized only once.
 *
 * With complex plugins, there are many cases where multiple copies of
 * the plugin would load, and action hooks would load (and trigger) multiple
 * times.
 *
 * If you're planning on using a global variable, then you should implement
 * this trait. Singletons are a way to safely use globals; they let you
 * access and set the global from anywhere, without risk of collision.
 *
 * If any method in a class needs to be aware of "state", then you should
 * implement this trait in that class.
 *
 * If any method in the class need to "talk" to another or be aware of what
 * another method has done, then you should implement this trait in that class.
 *
 * If you specifically need multiple objects, then use a normal class.
 *
 * @package Hammersportmarketing
 */

 namespace HAMMERSPORTMARKETING\Inc\Traits;

 trait Singleton{
    public function __contruct(){}

    public function __clone(){}

    final public static function get_instance(){
        static $instance = [];

        $called_class = get_called_class();

        if( !isset($instance[$called_class]) ){
            $instance[ $called_class ] = new $called_class();
            
            do_action( sprintf('hsm_theme_singleton_init: %s', $called_class) );
        }
        return $instance[$called_class];
    }
 }