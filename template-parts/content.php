<?php
/**
 * Content template
 * 
 * @package Hammersportmarketing
 * 
 */

 ?>
<article id="post-<?php the_ID();?>" <?php post_class( 'post-class');?>>
    <?php 
    get_template_part( 'template-parts/components/blog/entry-header');
    get_template_part( 'template-parts/components/blog/entry-meta');
    get_template_part( 'template-parts/components/blog/entry-content');
    get_template_part( 'template-parts/components/blog/entry-footer');
    ?>
</article>