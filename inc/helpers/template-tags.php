<?php

/**
 * Custom template tags for the theme.
 *
 * @package Hammersportmarketing
 */

/**
 * Gets the thumbnail with Lazy Load.
 * Should be called in the WordPress Loop.
 *
 * @param int|null $post_id               Post ID.
 * @param string   $size                  The registered image size.
 * @param array    $additional_attributes Additional attributes.
 *
 * @return string
 */
function get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{
	$custom_thumbnail = '';

	if (null === $post_id) {
		$post_id = get_the_ID();
	}

	if (has_post_thumbnail($post_id)) {
		$default_attributes = [
			'loading' => 'lazy'
		];

		$attributes = array_merge($additional_attributes, $default_attributes);

		$custom_thumbnail = wp_get_attachment_image(
			get_post_thumbnail_id($post_id),
			$size,
			false,
			$attributes
		);
	}

	return $custom_thumbnail;
}

/**
 * Renders Custom Thumbnail with Lazy Load.
 *
 * @param int    $post_id               Post ID.
 * @param string $size                  The registered image size.
 * @param array  $additional_attributes Additional attributes.
 */
function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{
	echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

function hsm_posted_on()
{
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	// Post is modified (When post published time is not equal to post modified time)
	if (get_the_time('U') !== get_the_modified_time('U')) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
		<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr(get_the_date(DATE_W3C)),
		esc_attr(get_the_date()),
		esc_attr(get_the_modified_date(DATE_W3C)),
		esc_attr(get_the_modified_date())
	);

	$posted_on = sprintf(
		esc_html_x('Posted on %s', 'post date', 'hammersportmarketing'),
		'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-one text-secondary">' . $posted_on . '</span>';
}

function hsm_posted_by()
{
	$byline = sprintf(
		esc_html_x('by %s', 'post author', 'hammersportmarketing'),
		'<span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
	);

	echo '<span class="byline text-secondary">' . $byline . '</span>';
}

function theme_the_excerpt($trim_character_count = 0)
{

	if (0 === $trim_character_count) {
		the_excerpt();
		return;
	}

	$excerpt = wp_strip_all_tags(get_the_excerpt());
	$excerpt = substr($excerpt, 0, $trim_character_count);
	if (strlen($excerpt) > $trim_character_count - 3) {
		$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
		echo $excerpt . '...';
	} else {
		echo $excerpt;
	}
}

function hsm_excerpt_more($more = '')
{
	if (!is_single()) {
		$more = sprintf(
			'<button><a class="hsm-read-more text-white" href="%1$s">%2$s</a></button>',
			get_permalink(get_the_ID()),
			__('Read more', 'hammersportmarketing')
		);
	}
	return $more;
}

function theme_pagination()
{

	$allowed_tags = [
		'span' => [
			'class' => []
		],
		'a' => [
			'class' => [],
			'href' => []
		]
	];
	$args = [
		'before_page_number' => '<span>',
		'after_page_number' => '</span>'
	];

	printf('<nav class="hsm-pagination">%s </nav>', wp_kses(paginate_links($args), $allowed_tags));
}

function theme_lazy_image($id, $classes = "", $alt = "", $width = null, $height = null)
{
	// Fetch the mime type and base64 value
	$mimeType = get_post_mime_type($id);
	//$base64 = get_post_meta($id, "base64")[0];
	ob_start();
	$img_url = wp_get_attachment_image_src($id, "tiny-lazy");
	$img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
?>
	<img class="<?php echo ('lazyload blur-up ' . $classes); ?>" data-sizes="auto" data-src="<?= $img_url[0]; ?>" data-srcset="<?php echo wp_get_attachment_image_srcset($id, "full"); ?>" alt="<?php echo $alt !== "" ? $alt : $img_alt ?>" <?php if ($width != null) : ?> width=<?= $width ?> <?php endif;
																																																																							if ($height != null) :
																																																																								?> height=<?= $height ?> <?php endif; ?>>
<?php
	echo ob_get_clean();
}

function theme_lazy_video($video_id, $poster_id = "", $classes = "")
{
	ob_start();
?>
	<video class="<?php echo ('lazyload ' . $classes); ?>" <?php if ($poster_id !== "") : ?> data-poster="<?php echo wp_get_attachment_url($poster_id); ?>" <?php endif; ?> preload="none" controls>
		<source src="<?php echo wp_get_attachment_url($video_id); ?>" type=video/mp4>
	</video>
<?php
	echo ob_get_clean();
}
