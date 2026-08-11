<?php
/**
 * Mobile sticky order bar.
 *
 * @package Comptoir_Auguste
 */
?>
<div class="<?php echo esc_attr(ca_class('MobileOrderBar', 'bar')); ?>" role="region" aria-label="<?php esc_attr_e('Commande rapide', 'comptoir-auguste'); ?>">
	<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg', 'fullWidth')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
		<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
	</a>
</div>
