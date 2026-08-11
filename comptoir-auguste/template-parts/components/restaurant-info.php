<?php
/**
 * Restaurant contact info.
 *
 * @package Comptoir_Auguste
 */

$r = ca_restaurant();
?>
<div class="<?php echo esc_attr(ca_class('RestaurantInfo', 'root')); ?>">
	<div>
		<h3 class="<?php echo esc_attr(ca_class('RestaurantInfo', 'label')); ?>"><?php esc_html_e('Adresse', 'comptoir-auguste'); ?></h3>
		<p><?php echo esc_html($r['address']); ?></p>
	</div>
	<div>
		<h3 class="<?php echo esc_attr(ca_class('RestaurantInfo', 'label')); ?>"><?php esc_html_e('Téléphone', 'comptoir-auguste'); ?></h3>
		<p><?php echo esc_html($r['phone']); ?></p>
	</div>
	<div>
		<h3 class="<?php echo esc_attr(ca_class('RestaurantInfo', 'label')); ?>"><?php esc_html_e('E-mail', 'comptoir-auguste'); ?></h3>
		<p><a href="mailto:<?php echo esc_attr($r['email']); ?>"><?php echo esc_html($r['email']); ?></a></p>
	</div>
	<?php if (!empty($r['notes'])) : ?>
		<p class="<?php echo esc_attr(ca_class('RestaurantInfo', 'note')); ?>"><?php echo esc_html($r['notes']); ?></p>
	<?php endif; ?>
</div>
