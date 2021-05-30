<?php
/**
 * Template for entry content
 * 
 * To be used inside Wordpress The Loop
 * 
 * @package Hammersportmarketing 
 */

?>

<div class="entry-content">
    <?php 
    if(is_single()){
        the_content(
            sprintf(
                wp_kses(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hammersportmarketing'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            )
        ); 
                    
        wp_link_pages([
            'before' => '<div class="page-links">'. esc_html__('Pages:', 'hammersportmarketing'),
            'after' => '</div>'
        ]);
    }else{
        hsm_the_excerpt(10);
        echo hsm_excerpt_more();
    }

    ?>
</div>