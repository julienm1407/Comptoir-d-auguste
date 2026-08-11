<?php
/**
 * Location / infos pratiques.
 *
 * @package Comptoir_Auguste
 */
?>
<section class="section <?php echo esc_attr(ca_class('Location', 'section')); ?>" aria-labelledby="location-title">
	<div class="container <?php echo esc_attr(ca_class('Location', 'grid')); ?>">
		<div class="reveal">
			<div class="<?php echo esc_attr(ca_class('SectionTitle', 'root', 'left', 'dark')); ?>">
				<h2 id="location-title" class="<?php echo esc_attr(ca_class('SectionTitle', 'title')); ?>">
					<?php esc_html_e('Retrouvez Auguste', 'comptoir-auguste'); ?>
				</h2>
				<p class="<?php echo esc_attr(ca_class('SectionTitle', 'text')); ?>">
					<?php esc_html_e('Sur place, à emporter ou en livraison — les informations pratiques seront précisées dès confirmation.', 'comptoir-auguste'); ?>
				</p>
			</div>
			<div class="<?php echo esc_attr(ca_class('Location', 'info')); ?>">
				<?php get_template_part('template-parts/components/restaurant', 'info'); ?>
				<?php get_template_part('template-parts/components/opening', 'hours'); ?>
			</div>
			<a class="<?php echo esc_attr(ca_class('Location', 'link')); ?>" href="<?php echo esc_url(ca_page_url('contact')); ?>">
				<?php esc_html_e('Nous contacter', 'comptoir-auguste'); ?>
			</a>
		</div>
		<div class="reveal <?php echo esc_attr(ca_class('Location', 'map')); ?>">
			<div class="<?php echo esc_attr(ca_class('Location', 'mapPlaceholder')); ?>">
				<p><?php esc_html_e('Carte interactive à venir', 'comptoir-auguste'); ?></p>
				<span><?php esc_html_e('Emplacement à confirmer', 'comptoir-auguste'); ?></span>
			</div>
		</div>
	</div>
</section>
