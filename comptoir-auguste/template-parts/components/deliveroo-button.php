<?php
/**
 * Deliveroo CTA button.
 *
 * @package Comptoir_Auguste
 *
 * @var array $args {
 *   @type string $size      md|lg (default lg)
 *   @type bool   $fullWidth Full width button
 * }
 */

$size = ($args['size'] ?? 'lg') === 'md' ? 'md' : 'lg';
$full = !empty($args['fullWidth']);
$url  = ca_deliveroo_url();
$ready = $url !== '';
$classes = ca_class('DeliverooButton', 'button', $size);
if ($full) {
	$classes .= ' ' . ca_class('DeliverooButton', 'fullWidth');
}
if (!$ready) {
	$classes .= ' ' . ca_class('DeliverooButton', 'disabled');
}
?>
<?php if ($ready) : ?>
<a
	class="<?php echo esc_attr($classes); ?>"
	href="<?php echo esc_url($url); ?>"
	target="_blank"
	rel="noopener noreferrer"
	aria-label="<?php esc_attr_e('Commander sur Deliveroo — ouvre un nouvel onglet', 'comptoir-auguste'); ?>"
>
<?php else : ?>
<span
	class="<?php echo esc_attr($classes); ?>"
	role="link"
	aria-disabled="true"
	aria-label="<?php esc_attr_e('Deliveroo — lien à venir', 'comptoir-auguste'); ?>"
	title="<?php esc_attr_e('Lien Deliveroo à venir', 'comptoir-auguste'); ?>"
>
<?php endif; ?>
	<span class="<?php echo esc_attr(ca_class('DeliverooButton', 'mark')); ?>" aria-hidden="true">
		<span class="<?php echo esc_attr(ca_class('DeliverooButton', 'd')); ?>">D</span>
	</span>
	<span class="<?php echo esc_attr(ca_class('DeliverooButton', 'label')); ?>">
		<span class="<?php echo esc_attr(ca_class('DeliverooButton', 'kicker')); ?>">
			<?php echo $ready ? esc_html__('Aussi sur', 'comptoir-auguste') : esc_html__('Bientôt sur', 'comptoir-auguste'); ?>
		</span>
		<span class="<?php echo esc_attr(ca_class('DeliverooButton', 'brand')); ?>">Deliveroo</span>
	</span>
<?php if ($ready) : ?>
</a>
<?php else : ?>
</span>
<?php endif; ?>
