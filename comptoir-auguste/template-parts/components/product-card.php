<?php
/**
 * Product card (showcase — no add-to-cart; order via Commander / Foxorder).
 *
 * @package Comptoir_Auguste
 *
 * @var array $args {
 *   @type array $product Product data.
 *   @type bool  $compact Compact layout for carousels.
 * }
 */

$product = $args['product'] ?? [];
$compact = !empty($args['compact']);
if (empty($product)) {
	return;
}
$badges = ca_badge_labels();
$badge  = $product['badge'] ?? null;
$desc   = (string) ($product['description'] ?? '');
if ($compact && mb_strlen($desc) > 90) {
	$desc = rtrim(mb_substr($desc, 0, 87)) . '…';
}
$classes = ca_class('ProductCard', 'card') . ($compact ? ' ' . ca_class('ProductCard', 'compact') : '');
?>
<article class="<?php echo esc_attr($classes); ?>">
	<a class="<?php echo esc_attr(ca_class('ProductCard', 'media')); ?>" href="<?php echo esc_url(ca_page_url('carte') . '#' . $product['slug']); ?>">
		<img
			class="<?php echo esc_attr(ca_class('ProductCard', 'image')); ?>"
			src="<?php echo esc_url($product['image']); ?>"
			alt="<?php echo esc_attr($product['name']); ?>"
			loading="lazy"
			width="600"
			height="450"
		>
		<?php if ($badge && isset($badges[$badge])) : ?>
			<span class="<?php echo esc_attr(ca_class('ProductCard', 'badge')); ?>"><?php echo esc_html($badges[$badge]); ?></span>
		<?php endif; ?>
	</a>
	<div class="<?php echo esc_attr(ca_class('ProductCard', 'body')); ?>">
		<div class="<?php echo esc_attr(ca_class('ProductCard', 'top')); ?>">
			<h3 class="<?php echo esc_attr(ca_class('ProductCard', 'name')); ?>"><?php echo esc_html($product['name']); ?></h3>
		</div>
		<p class="<?php echo esc_attr(ca_class('ProductCard', 'description')); ?>"><?php echo esc_html($desc); ?></p>
	</div>
</article>
