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
	'text'  => __('Adresse, horaires et réseaux — passez nous voir ou contactez-nous.', 'comptoir-auguste'),
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
</div>
<?php
get_footer();
