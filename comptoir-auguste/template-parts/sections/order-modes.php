<?php
/**
 * Order modes (livraison / emporter / sur place) + scooter visual.
 *
 * @package Comptoir_Auguste
 */

$options = ca_delivery_options();

$icons = [
	'delivery' => '<svg viewBox="0 0 48 48" aria-hidden="true" class="' . esc_attr(ca_class('OrderModes', 'iconSvg')) . '"><path d="M6 30h22v-9.5A4.5 4.5 0 0 0 23.5 16H10a4 4 0 0 0-4 4v10Z" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/><path d="M28 24h7.2l4.3 5.2V30H28" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/><circle cx="14" cy="33.5" r="3.2" fill="none" stroke="currentColor" stroke-width="2.2"/><circle cx="34" cy="33.5" r="3.2" fill="none" stroke="currentColor" stroke-width="2.2"/><path d="M10 20h10" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>',
	'takeaway' => '<svg viewBox="0 0 48 48" aria-hidden="true" class="' . esc_attr(ca_class('OrderModes', 'iconSvg')) . '"><path d="M17 20h14l1.4 16.5a2.5 2.5 0 0 1-2.5 2.7H18.1a2.5 2.5 0 0 1-2.5-2.7L17 20Z" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/><path d="M16 20h16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><path d="M20 20v-3.2c0-2.3 1.8-4.3 4-4.3s4 2 4 4.3V20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><path d="M22.5 27.5c1.2 1.3 1.8 1.3 3 0s1.8-1.3 3 0" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>',
	'dine-in'  => '<svg viewBox="0 0 48 48" aria-hidden="true" class="' . esc_attr(ca_class('OrderModes', 'iconSvg')) . '"><path d="M15 12v24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><path d="M11 12c0 4 1.8 6.5 4 6.5S19 16 19 12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><path d="M29 12v8.5c0 2.4 1.6 3.5 3.5 3.5H35" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M32.5 12v24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><path d="M10 39h28" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>',
];
?>
<section class="section <?php echo esc_attr(ca_class('OrderModes', 'section')); ?>" aria-labelledby="order-modes-title">
	<div class="container">
		<div class="<?php echo esc_attr(ca_class('OrderModes', 'top')); ?>">
			<div class="reveal <?php echo esc_attr(ca_class('OrderModes', 'intro')); ?>">
				<h2 id="order-modes-title" class="<?php echo esc_attr(ca_class('OrderModes', 'heading')); ?>">
					<?php esc_html_e('Comment voulez-vous', 'comptoir-auguste'); ?><br>
					<?php esc_html_e('profiter d’Auguste ?', 'comptoir-auguste'); ?>
				</h2>
			</div>

			<div class="reveal <?php echo esc_attr(ca_class('OrderModes', 'visual')); ?>">
				<img
					class="<?php echo esc_attr(ca_class('OrderModes', 'scooter')); ?>"
					src="<?php echo esc_url(ca_brand('scooter-mosaique.png')); ?>"
					alt="<?php esc_attr_e('Livraison Comptoir d’Auguste — illustration mosaïque', 'comptoir-auguste'); ?>"
					width="720"
					height="720"
					loading="lazy"
				>
			</div>
		</div>

		<div class="<?php echo esc_attr(ca_class('OrderModes', 'grid')); ?>">
			<?php foreach ($options as $option) : ?>
				<?php
				$icon    = $option['icon'] ?? 'delivery';
				$tone    = 'tone-' . $icon;
				$href    = trim((string) ($option['href'] ?? ''));
				$is_link = $href !== '';
				$classes = ca_class('OrderModes', 'card', $tone) . ($is_link ? '' : ' ' . ca_class('OrderModes', 'static'));
				?>
				<div class="reveal">
					<?php if ($is_link) : ?>
						<a class="<?php echo esc_attr($classes); ?>" href="<?php echo esc_url($href); ?>">
					<?php else : ?>
						<div class="<?php echo esc_attr($classes); ?>" aria-label="<?php echo esc_attr($option['label']); ?>">
					<?php endif; ?>
						<span class="<?php echo esc_attr(ca_class('OrderModes', 'icon')); ?>" aria-hidden="true">
							<?php echo $icons[$icon] ?? $icons['delivery']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG ?>
						</span>
						<div class="<?php echo esc_attr(ca_class('OrderModes', 'copy')); ?>">
							<h3 class="<?php echo esc_attr(ca_class('OrderModes', 'name')); ?>"><?php echo esc_html($option['label']); ?></h3>
							<p class="<?php echo esc_attr(ca_class('OrderModes', 'text')); ?>"><?php echo esc_html($option['text']); ?></p>
						</div>
						<span class="<?php echo esc_attr(ca_class('OrderModes', 'accent')); ?>" aria-hidden="true"></span>
					<?php if ($is_link) : ?>
						</a>
					<?php else : ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="reveal <?php echo esc_attr(ca_class('OrderModes', 'cta')); ?>">
			<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
				<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
			</a>
			<?php get_template_part('template-parts/components/uber', 'eats-button'); ?>
		</div>
	</div>
</section>
