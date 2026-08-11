<?php
/**
 * Order modes (livraison / emporter / sur place).
 *
 * @package Comptoir_Auguste
 */

$options = ca_delivery_options();
?>
<section class="section <?php echo esc_attr(ca_class('OrderModes', 'section')); ?>" aria-labelledby="order-modes-title">
	<div class="container">
		<div class="reveal <?php echo esc_attr(ca_class('OrderModes', 'title')); ?>">
			<div class="<?php echo esc_attr(ca_class('SectionTitle', 'root', 'center', 'dark')); ?>">
				<h2 id="order-modes-title" class="<?php echo esc_attr(ca_class('SectionTitle', 'title')); ?>">
					<?php esc_html_e('Comment voulez-vous profiter d’Auguste ?', 'comptoir-auguste'); ?>
				</h2>
			</div>
		</div>

		<div class="<?php echo esc_attr(ca_class('OrderModes', 'grid')); ?>">
			<?php foreach ($options as $option) : ?>
				<div class="reveal">
					<a class="<?php echo esc_attr(ca_class('OrderModes', 'card')); ?>" href="<?php echo esc_url($option['href']); ?>">
						<h3 class="<?php echo esc_attr(ca_class('OrderModes', 'name')); ?>"><?php echo esc_html($option['label']); ?></h3>
						<p class="<?php echo esc_attr(ca_class('OrderModes', 'text')); ?>"><?php echo esc_html($option['text']); ?></p>
					</a>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="reveal <?php echo esc_attr(ca_class('OrderModes', 'cta')); ?>">
			<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
				<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
			</a>
		</div>
	</div>
</section>
