<?php
/**
 * Delivery / takeaway home section.
 *
 * @package Comptoir_Auguste
 */

$steps = ca_delivery_steps();
?>
<section class="section <?php echo esc_attr(ca_class('DeliveryHome', 'section')); ?>" aria-labelledby="delivery-home-title">
	<div class="container <?php echo esc_attr(ca_class('DeliveryHome', 'wrap')); ?>">
		<div class="<?php echo esc_attr(ca_class('DeliveryHome', 'top')); ?>">
			<div class="reveal <?php echo esc_attr(ca_class('DeliveryHome', 'intro')); ?>">
				<p class="<?php echo esc_attr(ca_class('DeliveryHome', 'eyebrow')); ?>">
					<?php esc_html_e('Livraison & à emporter', 'comptoir-auguste'); ?>
				</p>
				<h2 id="delivery-home-title" class="<?php echo esc_attr(ca_class('DeliveryHome', 'title')); ?>">
					<?php esc_html_e('Commandez, on s’occupe du reste.', 'comptoir-auguste'); ?>
				</h2>
				<p class="<?php echo esc_attr(ca_class('DeliveryHome', 'lead')); ?>">
					<?php esc_html_e('Même carte, même cuisine maison — à vous de choisir comment la recevoir.', 'comptoir-auguste'); ?>
				</p>
			</div>

			<div class="reveal <?php echo esc_attr(ca_class('DeliveryHome', 'visual')); ?>">
				<img
					class="<?php echo esc_attr(ca_class('DeliveryHome', 'image')); ?>"
					src="<?php echo esc_url(ca_brand('scooter-mosaique.png')); ?>"
					alt="<?php esc_attr_e('Livraison Comptoir d’Auguste — illustration mosaïque', 'comptoir-auguste'); ?>"
					width="720"
					height="720"
					loading="lazy"
				>
			</div>
		</div>

		<div class="reveal <?php echo esc_attr(ca_class('DeliveryHome', 'lower')); ?>">
			<div class="<?php echo esc_attr(ca_class('DeliveryHome', 'modes')); ?>">
				<a class="<?php echo esc_attr(ca_class('DeliveryHome', 'mode', 'mode-delivery')); ?>" href="<?php echo esc_url(ca_page_url('livraison')); ?>">
					<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'modeLabel')); ?>"><?php esc_html_e('Livraison', 'comptoir-auguste'); ?></span>
					<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'modeText')); ?>"><?php esc_html_e('Auguste vient jusqu’à vous.', 'comptoir-auguste'); ?></span>
				</a>
				<a class="<?php echo esc_attr(ca_class('DeliveryHome', 'mode', 'mode-takeaway')); ?>" href="<?php echo esc_url(ca_page_url('a-emporter')); ?>">
					<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'modeLabel')); ?>"><?php esc_html_e('À emporter', 'comptoir-auguste'); ?></span>
					<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'modeText')); ?>"><?php esc_html_e('Vous commandez, vous retirez.', 'comptoir-auguste'); ?></span>
				</a>
			</div>

			<ol class="<?php echo esc_attr(ca_class('DeliveryHome', 'journey')); ?>">
				<?php foreach ($steps as $index => $step) : ?>
					<li class="<?php echo esc_attr(ca_class('DeliveryHome', 'step')); ?>">
						<div class="<?php echo esc_attr(ca_class('DeliveryHome', 'stepHead')); ?>">
							<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'num')); ?>"><?php echo esc_html((string) $step['step']); ?></span>
							<?php if ($index < count($steps) - 1) : ?>
								<span class="<?php echo esc_attr(ca_class('DeliveryHome', 'connector')); ?>" aria-hidden="true"></span>
							<?php endif; ?>
						</div>
						<h3 class="<?php echo esc_attr(ca_class('DeliveryHome', 'stepTitle')); ?>"><?php echo esc_html($step['title']); ?></h3>
						<p class="<?php echo esc_attr(ca_class('DeliveryHome', 'stepText')); ?>"><?php echo esc_html($step['text']); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>

			<div class="<?php echo esc_attr(ca_class('DeliveryHome', 'actions')); ?>">
				<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'md')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
					<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
				</a>
				<a class="<?php echo esc_attr(ca_class('Button', 'button', 'ghost', 'md')); ?>" href="<?php echo esc_url(ca_page_url('livraison')); ?>">
					<?php esc_html_e('Infos livraison', 'comptoir-auguste'); ?>
				</a>
			</div>
		</div>
	</div>
</section>
