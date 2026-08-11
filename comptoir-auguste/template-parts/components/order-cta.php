<?php
/**
 * Order CTA band.
 *
 * @var array $args { title?, text?, tone? }
 * @package Comptoir_Auguste
 */

$title = $args['title'] ?? 'On vous prépare quoi ?';
$text  = $args['text'] ?? 'Sur place, à emporter ou en livraison — une cuisine maison, prête pour vous.';
$tone  = $args['tone'] ?? 'dark';
?>
<aside class="<?php echo esc_attr(ca_class('OrderCTA', 'root', $tone)); ?>">
	<div class="<?php echo esc_attr(ca_class('OrderCTA', 'copy')); ?>">
		<h2 class="<?php echo esc_attr(ca_class('OrderCTA', 'title')); ?>"><?php echo esc_html($title); ?></h2>
		<p class="<?php echo esc_attr(ca_class('OrderCTA', 'text')); ?>"><?php echo esc_html($text); ?></p>
	</div>
	<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
		<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
	</a>
</aside>
