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
	'text'  => __('Auguste vient à vous. Commandez chez nous pour une livraison directe, ou passez par Uber Eats.', 'comptoir-auguste'),
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
			<li><strong><?php esc_html_e('Modes', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('Livraison directe ou Uber Eats', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Zones', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('À confirmer selon le mode', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Horaires', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('À confirmer selon le mode', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Frais de livraison', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('Selon le mode choisi', 'comptoir-auguste'); ?></span></li>
		</ul>
		<p class="<?php echo esc_attr(ca_class('page-livraison', 'note')); ?>">
			<?php esc_html_e('Commandez chez nous pour une livraison directe, ou sur Uber Eats — selon votre préférence.', 'comptoir-auguste'); ?>
		</p>
		<div class="<?php echo esc_attr(ca_class('page-livraison', 'actions')); ?>">
			<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg', 'fullWidth')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
				<?php esc_html_e('Commander (livraison directe)', 'comptoir-auguste'); ?>
			</a>
			<?php get_template_part('template-parts/components/uber', 'eats-button', ['fullWidth' => true]); ?>
		</div>
	</aside>
</div>
<?php
get_footer();
