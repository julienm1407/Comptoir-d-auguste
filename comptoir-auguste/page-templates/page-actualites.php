<?php
/**
 * Template Name: Actualités
 *
 * @package Comptoir_Auguste
 */

get_header();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('Actualités', 'comptoir-auguste'),
	'text'  => __('Nouveautés, plats du moment et coulisses — une cuisine qui évolue.', 'comptoir-auguste'),
]); ?>

<div class="container section <?php echo esc_attr(ca_class('page-actualites', 'grid')); ?>">
	<?php
	$query = new WP_Query([
		'post_type'           => 'post',
		'posts_per_page'      => 12,
		'ignore_sticky_posts' => true,
	]);

	if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
			$cover = get_post_meta(get_the_ID(), '_ca_cover_url', true);
			if (!$cover && has_post_thumbnail()) {
				$cover = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: '';
			}
			$category_label = (string) get_post_meta(get_the_ID(), '_ca_category_label', true);
			if ($category_label === '') {
				$cats = get_the_category();
				$category_label = $cats ? $cats[0]->name : '';
			}
			get_template_part('template-parts/components/article', 'card', [
				'title'    => get_the_title(),
				'url'      => get_permalink(),
				'excerpt'  => get_the_excerpt(),
				'date'     => get_the_date('Y-m-d'),
				'category' => $category_label,
				'cover'    => $cover,
			]);
		endwhile;
		wp_reset_postdata();
	else :
		foreach (ca_demo_articles() as $article) {
			get_template_part('template-parts/components/article', 'card', [
				'title'    => $article['title'],
				'url'      => home_url('/' . $article['slug'] . '/'),
				'excerpt'  => $article['excerpt'],
				'date'     => $article['publishedAt'],
				'category' => $article['category'],
				'cover'    => $article['coverImage'],
			]);
		}
	endif;
	?>
</div>
<?php
get_footer();
