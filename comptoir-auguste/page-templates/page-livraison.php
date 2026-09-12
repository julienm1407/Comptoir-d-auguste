<?php
/**
 * Template Name: Livraison
 *
 * @package Comptoir_Auguste
 */

get_header();
$steps = ca_delivery_steps();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('Livraison', 'comptoir-auguste'),
	'text'  => __('Pour l’instant, Auguste livre via Uber Eats et Deliveroo. La livraison directe reviendra bientôt.', 'comptoir-auguste'),
]); ?>

<div class="container section <?php echo esc_attr(ca_class('page-livraison', 'page')); ?>">
	<ol class="<?php echo esc_attr(ca_class('page-livraison', 'steps')); ?>">
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

	<aside class="<?php echo esc_attr(ca_class('page-livraison', 'info')); ?>">
		<h2><?php esc_html_e('Informations', 'comptoir-auguste'); ?></h2>
		<ul>
			<li><strong><?php esc_html_e('Modes', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('Uber Eats ou Deliveroo (livraison directe bientôt)', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Zones', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('Selon la plateforme choisie', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Horaires', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('Selon la plateforme choisie', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Frais de livraison', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('Selon la plateforme choisie', 'comptoir-auguste'); ?></span></li>
		</ul>
		<p class="<?php echo esc_attr(ca_class('page-livraison', 'note')); ?>">
			<?php esc_html_e('Commandez via Uber Eats ou Deliveroo — la livraison directe du comptoir sera de retour bientôt.', 'comptoir-auguste'); ?>
		</p>
		<div class="<?php echo esc_attr(ca_class('page-livraison', 'actions')); ?>">
			<?php get_template_part('template-parts/components/uber', 'eats-button', ['fullWidth' => true]); ?>
			<?php get_template_part('template-parts/components/deliveroo', 'button', ['fullWidth' => true]); ?>
		</div>
	</aside>
</div>
<?php
get_footer();
