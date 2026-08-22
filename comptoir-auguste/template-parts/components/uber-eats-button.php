<?php
/**
 * Uber Eats CTA button.
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
$classes = ca_class('UberEatsButton', 'button', $size);
if ($full) {
	$classes .= ' ' . ca_class('UberEatsButton', 'fullWidth');
}
?>
<a
	class="<?php echo esc_attr($classes); ?>"
	href="<?php echo esc_url(ca_uber_eats_url()); ?>"
	target="_blank"
	rel="noopener noreferrer"
	aria-label="<?php esc_attr_e('Commander sur Uber Eats — ouvre un nouvel onglet', 'comptoir-auguste'); ?>"
>
	<span class="<?php echo esc_attr(ca_class('UberEatsButton', 'mark')); ?>" aria-hidden="true">
		<span class="<?php echo esc_attr(ca_class('UberEatsButton', 'u')); ?>">U</span>
	</span>
	<span class="<?php echo esc_attr(ca_class('UberEatsButton', 'label')); ?>">
		<span class="<?php echo esc_attr(ca_class('UberEatsButton', 'kicker')); ?>"><?php esc_html_e('Aussi sur', 'comptoir-auguste'); ?></span>
		<span class="<?php echo esc_attr(ca_class('UberEatsButton', 'brand')); ?>">Uber Eats</span>
	</span>
</a>
