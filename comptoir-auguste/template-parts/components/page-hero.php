<?php
/**
 * Page hero.
 *
 * @var array $args { title, text?, eyebrow? }
 * @package Comptoir_Auguste
 */

$title   = $args['title'] ?? '';
$text    = $args['text'] ?? '';
$eyebrow = $args['eyebrow'] ?? '';
?>
<header class="<?php echo esc_attr(ca_class('PageHero', 'hero')); ?>">
	<div class="container <?php echo esc_attr(ca_class('PageHero', 'inner')); ?>">
		<?php if ($eyebrow !== '') : ?>
			<p class="<?php echo esc_attr(ca_class('PageHero', 'eyebrow')); ?>"><?php echo esc_html($eyebrow); ?></p>
		<?php endif; ?>
		<h1 class="<?php echo esc_attr(ca_class('PageHero', 'title')); ?>"><?php echo esc_html($title); ?></h1>
		<?php if ($text !== '') : ?>
			<p class="<?php echo esc_attr(ca_class('PageHero', 'text')); ?>"><?php echo esc_html($text); ?></p>
		<?php endif; ?>
	</div>
</header>
