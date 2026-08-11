<?php
/**
 * Single post (Actualités).
 *
 * @package Comptoir_Auguste
 */

get_header();

while (have_posts()) :
	the_post();
	$cover = get_post_meta(get_the_ID(), '_ca_cover_url', true);
	if (!$cover && has_post_thumbnail()) {
		$cover = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: '';
	}
	$category_label = (string) get_post_meta(get_the_ID(), '_ca_category_label', true);
	if ($category_label === '') {
		$cats = get_the_category();
		$category_label = $cats ? $cats[0]->name : '';
	}
	$date = get_the_date('Y-m-d');
	?>
	<article class="<?php echo esc_attr(ca_class('page-slug', 'article')); ?>">
		<header class="<?php echo esc_attr(ca_class('page-slug', 'hero')); ?>">
			<div class="container <?php echo esc_attr(ca_class('page-slug', 'heroInner')); ?>">
				<p class="<?php echo esc_attr(ca_class('page-slug', 'meta')); ?>">
					<?php if ($category_label !== '') : ?>
						<span><?php echo esc_html($category_label); ?></span>
						<span aria-hidden="true">·</span>
					<?php endif; ?>
					<time datetime="<?php echo esc_attr($date); ?>"><?php echo esc_html(ca_format_date($date)); ?></time>
				</p>
				<h1><?php the_title(); ?></h1>
				<?php if (has_excerpt()) : ?>
					<p class="<?php echo esc_attr(ca_class('page-slug', 'excerpt')); ?>"><?php echo esc_html(get_the_excerpt()); ?></p>
				<?php endif; ?>
			</div>
		</header>
		<div class="container <?php echo esc_attr(ca_class('page-slug', 'content')); ?>">
			<?php if ($cover) : ?>
				<div class="<?php echo esc_attr(ca_class('page-slug', 'cover')); ?>">
					<img class="<?php echo esc_attr(ca_class('page-slug', 'image')); ?>" src="<?php echo esc_url($cover); ?>" alt="" width="1200" height="700" loading="lazy">
				</div>
			<?php endif; ?>
			<div class="<?php echo esc_attr(ca_class('page-slug', 'body')); ?>">
				<?php the_content(); ?>
				<p class="<?php echo esc_attr(ca_class('page-slug', 'note')); ?>">
					<?php esc_html_e('Contenu de démonstration — les articles seront alimentés depuis WordPress.', 'comptoir-auguste'); ?>
				</p>
				<a class="<?php echo esc_attr(ca_class('Button', 'button', 'ghost', 'md')); ?>" href="<?php echo esc_url(ca_page_url('actualites')); ?>">
					<?php esc_html_e('Retour aux actualités', 'comptoir-auguste'); ?>
				</a>
			</div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
