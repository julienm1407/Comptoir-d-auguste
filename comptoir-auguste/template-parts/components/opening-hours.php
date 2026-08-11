<?php
/**
 * Opening hours list.
 *
 * @package Comptoir_Auguste
 */

$hours = ca_opening_hours();
?>
<div class="<?php echo esc_attr(ca_class('RestaurantInfo', 'hours')); ?>">
	<h3 class="<?php echo esc_attr(ca_class('RestaurantInfo', 'label')); ?>"><?php esc_html_e('Horaires', 'comptoir-auguste'); ?></h3>
	<ul class="<?php echo esc_attr(ca_class('RestaurantInfo', 'list')); ?>">
		<?php foreach ($hours as $item) : ?>
			<li class="<?php echo esc_attr(ca_class('RestaurantInfo', 'row')); ?>">
				<span><?php echo esc_html($item['day']); ?></span>
				<span><?php echo esc_html($item['hours']); ?></span>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
