<?php 
/**
 * Header Navigation Template
 * 
 * @package Hammersportmarketing
 */
$menu_class = \HAMMERSPORTMARKETING\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('hsm-header-menu');
$header_menu = wp_get_nav_menu_items($header_menu_id);

?>

<nav>
    
    <?php if (function_exists('the_custom_logo')){
            the_custom_logo();
        }
    ?>

    <!-- Nav menu -->
    <?php 
        if(!empty($header_menu) && is_array($header_menu)){
        ?>
            <ul>
            <?php 
                foreach ($header_menu as $menu_item){
                    if(!$menu_item->menu_item_parent){
                        $child_menu_items = $menu_class->get_child_menu_items($header_menu, $menu_item->ID);
                        $has_children = !empty($child_menu_items) && is_array($child_menu_items);
                        if(!$has_children){
                            ?>
                                <li><a href="<?php echo esc_url($menu_item->url);?>">
                                    <?php echo esc_html( $menu_item->title); ?>
                                </a></li>
                            <?php
                        } else{
                            ?>
                            <li>
                                <a href="<?php echo esc_url($menu_item->url);?>">
                                    <?php echo esc_html( $menu_item->title); ?>
                                </a>
                                <div>
                                    <?php 
                                        foreach($child_menu_items as $child_menu_item){
                                            ?>
                                                <a href="<?php echo esc_url($child_menu_item->url);?>">
                                                <?php echo esc_html( $child_menu_item->title); ?>
                                                </a>                
                                            <?php
                                        }
                                    ?>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                    }
                }
            ?>
            </ul>
        <?php
        }
    ?>    
</nav>