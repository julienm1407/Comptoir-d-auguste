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
	'text'  => __('Auguste vient à vous. Choisissez, commandez, on prépare, on vous livre.', 'comptoir-auguste'),
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
			<li><strong><?php esc_html_e('Zones', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('À confirmer', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Horaires', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('À confirmer', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Minimum de commande', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('À confirmer', 'comptoir-auguste'); ?></span></li>
			<li><strong><?php esc_html_e('Frais de livraison', 'comptoir-auguste'); ?></strong><span><?php esc_html_e('À confirmer', 'comptoir-auguste'); ?></span></li>
		</ul>
		<p class="<?php echo esc_attr(ca_class('page-livraison', 'note')); ?>">
			<?php esc_html_e('Ces informations seront mises à jour dès qu’elles seront définitives.', 'comptoir-auguste'); ?>
		</p>
		<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
			<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
		</a>
	</aside>
</div>
<?php
get_footer();
