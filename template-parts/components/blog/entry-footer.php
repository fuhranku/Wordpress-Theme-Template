<?php
/**
 * Template for entry footer
 * 
 * To be used inside of Wordpress The Loop
 * 
 * @package Hammersportmarketing
 */
$post_id = get_the_ID();
$article_terms = wp_get_post_terms( $post_id , ['category', 'post_tag']);

if( empty($article_terms) || !is_array($article_terms)){
    return;
}
?>

 <div class="entry-footer">
    <?php
        foreach ($article_terms as $key => $article_term){
            ?>
            <button>
                <a href="<?php echo esc_url( get_term_link( $article_term )); ?>">
                    <?php echo esc_html( $article_term->name); ?>
                </a>
            </button>
            <?php
        }
    ?>
 </div>