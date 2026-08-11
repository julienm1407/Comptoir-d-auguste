<?php
/**
 * Template Name: À emporter
 *
 * @package Comptoir_Auguste
 */

get_header();
$steps = ca_takeaway_steps();
$r     = ca_restaurant();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('À emporter', 'comptoir-auguste'),
	'text'  => __('Vous commandez, on prépare. Passez retirer votre commande au comptoir.', 'comptoir-auguste'),
]); ?>

<div class="container section <?php echo esc_attr(ca_class('page-a-emporter', 'page')); ?>">
	<ol class="<?php echo esc_attr(ca_class('page-a-emporter', 'steps')); ?>">
		<?php foreach ($steps as $step) : ?>
			<li>
				<span><?php echo esc_html((string) $step['step']); ?></span>
				<div>
					<h2><?php echo esc_html($step['title']); ?></h2>
					<p><?php echo esc_html($step['text']); ?></p>
				</div>
			</li>
		<?php endforeach; ?>
	</ol>

	<aside class="<?php echo esc_attr(ca_class('page-a-emporter', 'info')); ?>">
		<h2><?php esc_html_e('Retrait', 'comptoir-auguste'); ?></h2>
		<p>
			<strong><?php esc_html_e('Adresse', 'comptoir-auguste'); ?></strong><br>
			<?php echo esc_html($r['address']); ?>
		</p>
		<?php get_template_part('template-parts/components/opening', 'hours'); ?>
		<p class="<?php echo esc_attr(ca_class('page-a-emporter', 'note')); ?>">
			<?php esc_html_e('Horaires et modalités de retrait à confirmer.', 'comptoir-auguste'); ?>
		</p>
		<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
			<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
		</a>
	</aside>
</div>
<?php
get_footer();
