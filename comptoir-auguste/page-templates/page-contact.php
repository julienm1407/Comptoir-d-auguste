<?php
/**
 * Template Name: Contact
 *
 * @package Comptoir_Auguste
 */

get_header();
$r = ca_restaurant();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('Retrouvez Auguste', 'comptoir-auguste'),
	'text'  => __('Une question ? Écrivez-nous ou passez nous voir.', 'comptoir-auguste'),
]); ?>

<div class="container section <?php echo esc_attr(ca_class('page-contact', 'page')); ?>">
	<div class="<?php echo esc_attr(ca_class('page-contact', 'info')); ?>">
		<?php get_template_part('template-parts/components/restaurant', 'info'); ?>
		<?php get_template_part('template-parts/components/opening', 'hours'); ?>
		<div>
			<h2 class="<?php echo esc_attr(ca_class('page-contact', 'heading')); ?>"><?php esc_html_e('Réseaux', 'comptoir-auguste'); ?></h2>
			<ul class="<?php echo esc_attr(ca_class('page-contact', 'socials')); ?>">
				<?php foreach ($r['socials'] as $social) : ?>
					<li><a href="<?php echo esc_url($social['href']); ?>"><?php echo esc_html($social['label']); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="<?php echo esc_attr(ca_class('page-contact', 'formBlock')); ?>">
		<h2><?php esc_html_e('Une question ?', 'comptoir-auguste'); ?></h2>
		<p><?php esc_html_e('Le formulaire est prêt pour une future intégration (WordPress / e-mail).', 'comptoir-auguste'); ?></p>
		<?php get_template_part('template-parts/components/contact', 'form'); ?>
	</div>

	<div class="<?php echo esc_attr(ca_class('page-contact', 'map')); ?>">
		<div class="<?php echo esc_attr(ca_class('page-contact', 'mapPlaceholder')); ?>">
			<p><?php esc_html_e('Carte à venir', 'comptoir-auguste'); ?></p>
			<span><?php esc_html_e('Emplacement à confirmer', 'comptoir-auguste'); ?></span>
		</div>
	</div>
</div>
<?php
get_footer();
