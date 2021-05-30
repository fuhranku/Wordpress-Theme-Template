<?php

/**
 * Single post Template file
 * 
 * @package HammersportMarketing
 * 
 */
get_header();
?>

<div class="primary">
    <main id="main" class="site-main" role="main">
        <?php 
            if(have_posts()):
                ?>
                    <div class="container">

                    <?php 
                    if(is_home() && !is_front_page()):
                        ?>
                        <header>
                            <h1><?php single_post_title();?></h1>
                        </header>
                    <?php 
                    endif;
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content' );
                        
                    endwhile;
						?>
                    </div>
                    <div class="container">
                        <?php get_sidebar(); ?>
                    </div>
                <?php
            else: 
                get_template_part( 'template-parts/content-none' );
            endif;

            hsm_pagination();
        ?>
    </main>
</div>

<?php 
get_footer();