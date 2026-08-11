<?php
/**
 * Delivery + takeaway home section.
 *
 * @package Comptoir_Auguste
 */

$delivery = ca_delivery_steps();
$takeaway = ca_takeaway_steps();
?>
<section class="section <?php echo esc_attr(ca_class('DeliveryHome', 'section')); ?>" aria-labelledby="delivery-home-title">
	<div class="container <?php echo esc_attr(ca_class('DeliveryHome', 'grid')); ?>">
		<div class="reveal <?php echo esc_attr(ca_class('DeliveryHome', 'block')); ?>">
			<p class="<?php echo esc_attr(ca_class('DeliveryHome', 'eyebrow')); ?>"><?php esc_html_e('Livraison', 'comptoir-auguste'); ?></p>
			<h2 id="delivery-home-title" class="<?php echo esc_attr(ca_class('DeliveryHome', 'title')); ?>">
				<?php esc_html_e('Auguste vient à vous.', 'comptoir-auguste'); ?>
			</h2>
			<ol class="<?php echo esc_attr(ca_class('DeliveryHome', 'steps')); ?>">
				<?php foreach ($delivery as $step) : ?>
					<li>
						<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'num')); ?>"><?php echo esc_html((string) $step['step']); ?></span>
						<div>
							<h3><?php echo esc_html($step['title']); ?></h3>
							<p><?php echo esc_html($step['text']); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
			<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'md')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
				<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
			</a>
		</div>

		<div class="reveal <?php echo esc_attr(ca_class('DeliveryHome', 'visual')); ?>">
			<img
				class="<?php echo esc_attr(ca_class('DeliveryHome', 'image')); ?>"
				src="<?php echo esc_url(ca_brand('scooter-mosaique.png')); ?>"
				alt="<?php esc_attr_e('Livraison Comptoir d’Auguste — illustration mosaïque', 'comptoir-auguste'); ?>"
				width="560"
				height="560"
				loading="lazy"
			>
		</div>

		<div class="reveal <?php echo esc_attr(ca_class('DeliveryHome', 'block', 'takeaway')); ?>">
			<p class="<?php echo esc_attr(ca_class('DeliveryHome', 'eyebrow')); ?>"><?php esc_html_e('À emporter', 'comptoir-auguste'); ?></p>
			<h2 class="<?php echo esc_attr(ca_class('DeliveryHome', 'title')); ?>">
				<?php esc_html_e('Vous commandez, on prépare.', 'comptoir-auguste'); ?>
			</h2>
			<ol class="<?php echo esc_attr(ca_class('DeliveryHome', 'steps')); ?>">
				<?php foreach ($takeaway as $step) : ?>
					<li>
						<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'num')); ?>"><?php echo esc_html((string) $step['step']); ?></span>
						<div>
							<h3><?php echo esc_html($step['title']); ?></h3>
							<p><?php echo esc_html($step['text']); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
			<div class="<?php echo esc_attr(ca_class('DeliveryHome', 'actions')); ?>">
				<a class="<?php echo esc_attr(ca_class('Button', 'button', 'ghost', 'md')); ?>" href="<?php echo esc_url(ca_page_url('a-emporter')); ?>">
					<?php esc_html_e('Voir le retrait', 'comptoir-auguste'); ?>
				</a>
				<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'md')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
					<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
				</a>
			</div>
		</div>
	</div>
</section>
