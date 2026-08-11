<?php
/**
 * Article card.
 *
 * @var array $args {
 *   title, url, excerpt, date, category, cover
 * }
 * @package Comptoir_Auguste
 */

$title    = $args['title'] ?? '';
$url      = $args['url'] ?? '#';
$excerpt  = $args['excerpt'] ?? '';
$date     = $args['date'] ?? '';
$category = $args['category'] ?? '';
$cover    = $args['cover'] ?? '';
?>
<article class="<?php echo esc_attr(ca_class('ArticleCard', 'card')); ?>">
	<a class="<?php echo esc_attr(ca_class('ArticleCard', 'media')); ?>" href="<?php echo esc_url($url); ?>">
		<?php if ($cover !== '') : ?>
			<img
				class="<?php echo esc_attr(ca_class('ArticleCard', 'image')); ?>"
				src="<?php echo esc_url($cover); ?>"
				alt=""
				loading="lazy"
				width="800"
				height="500"
			>
		<?php endif; ?>
	</a>
	<div class="<?php echo esc_attr(ca_class('ArticleCard', 'body')); ?>">
		<p class="<?php echo esc_attr(ca_class('ArticleCard', 'meta')); ?>">
			<?php if ($category !== '') : ?>
				<span><?php echo esc_html($category); ?></span>
				<span aria-hidden="true">·</span>
			<?php endif; ?>
			<?php if ($date !== '') : ?>
				<time datetime="<?php echo esc_attr($date); ?>"><?php echo esc_html(ca_format_date($date)); ?></time>
			<?php endif; ?>
		</p>
		<h3 class="<?php echo esc_attr(ca_class('ArticleCard', 'title')); ?>">
			<a href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a>
		</h3>
		<p class="<?php echo esc_attr(ca_class('ArticleCard', 'excerpt')); ?>"><?php echo esc_html($excerpt); ?></p>
	</div>
</article>
