<?php
/**
 * Opening hours list.
 *
 * @package Comptoir_Auguste
 *
 * @var array $args {
 *   @type string $title Optional heading (default: Horaires). Empty = no heading.
 *   @type array  $hours Optional hours rows (default: restaurant hours).
 * }
 */

$hours = (isset($args['hours']) && is_array($args['hours']) && $args['hours'] !== [])
	? $args['hours']
	: ca_opening_hours();
$raw_title = array_key_exists('title', $args ?? [])
	? ($args['title'] ?? '')
	: __('Horaires', 'comptoir-auguste');
$show_title = is_string($raw_title) && $raw_title !== '';
$title = $show_title ? $raw_title : '';
?>
<div class="<?php echo esc_attr(ca_class('RestaurantInfo', 'hours')); ?>">
	<?php if ($show_title) : ?>
		<h3 class="<?php echo esc_attr(ca_class('RestaurantInfo', 'label')); ?>"><?php echo esc_html($title); ?></h3>
	<?php endif; ?>
	<ul class="<?php echo esc_attr(ca_class('RestaurantInfo', 'list')); ?>">
		<?php foreach ($hours as $item) : ?>
			<li class="<?php echo esc_attr(ca_class('RestaurantInfo', 'row')); ?>">
				<span><?php echo esc_html($item['day']); ?></span>
				<span><?php echo esc_html($item['hours']); ?></span>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
