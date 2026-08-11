<?php
/**
 * Product card.
 *
 * @package Comptoir_Auguste
 *
 * @var array $args {
 *   @type array $product Product data.
 * }
 */

$product = $args['product'] ?? [];
if (empty($product)) {
    return;
}
$badges = ca_badge_labels();
$badge  = $product['badge'] ?? null;
?>
<article class="<?php echo esc_attr(ca_class('ProductCard', 'card')); ?>">
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
			<p class="<?php echo esc_attr(ca_class('ProductCard', 'price')); ?>"><?php echo esc_html(ca_format_price((float) $product['price'])); ?></p>
		</div>
		<p class="<?php echo esc_attr(ca_class('ProductCard', 'description')); ?>"><?php echo esc_html($product['description']); ?></p>
		<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'sm') . ' ' . ca_class('ProductCard', 'cta')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
			<?php esc_html_e('Ajouter', 'comptoir-auguste'); ?>
		</a>
	</div>
</article>
