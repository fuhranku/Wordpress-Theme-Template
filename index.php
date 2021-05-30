<?php

/**
 * Main Template file
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
                    ?>
                        <?php
						$index         = 0;
						$no_of_columns = 3;

						while ( have_posts() ) : the_post();

							if ( 0 === $index % $no_of_columns ) {
								?>
								<div class="">
								<?php
							}

							get_template_part( 'template-parts/content' );

							$index ++;

							if ( 0 !== $index && 0 === $index % $no_of_columns ) {
								?>
								</div>
								<?php
							}

						endwhile;
						?>
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