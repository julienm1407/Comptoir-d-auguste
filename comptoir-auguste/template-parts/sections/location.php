<?php
/**
 * Location / infos pratiques.
 *
 * @package Comptoir_Auguste
 */

$r = ca_restaurant();
?>
<section class="section <?php echo esc_attr(ca_class('Location', 'section')); ?>" aria-labelledby="location-title">
	<div class="container <?php echo esc_attr(ca_class('Location', 'grid')); ?>">
		<div class="reveal">
			<div class="<?php echo esc_attr(ca_class('SectionTitle', 'root', 'left', 'dark')); ?>">
				<h2 id="location-title" class="<?php echo esc_attr(ca_class('SectionTitle', 'title')); ?>">
					<?php esc_html_e('Retrouvez Auguste', 'comptoir-auguste'); ?>
				</h2>
				<p class="<?php echo esc_attr(ca_class('SectionTitle', 'text')); ?>">
					<?php esc_html_e('Sur place, à emporter ou en livraison — venez nous rejoindre à La Seyne-sur-Mer.', 'comptoir-auguste'); ?>
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
			<?php if (!empty($r['mapEmbedUrl'])) : ?>
				<iframe
					class="<?php echo esc_attr(ca_class('Location', 'mapFrame')); ?>"
					title="<?php echo esc_attr(sprintf(/* translators: %s address */ __('Carte — %s', 'comptoir-auguste'), $r['address'])); ?>"
					src="<?php echo esc_url($r['mapEmbedUrl']); ?>"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					allowfullscreen
				></iframe>
			<?php else : ?>
				<a class="<?php echo esc_attr(ca_class('Location', 'mapPlaceholder')); ?>" href="<?php echo esc_url($r['mapLink'] ?? '#'); ?>" target="_blank" rel="noreferrer">
					<p><?php esc_html_e('Voir sur Google Maps', 'comptoir-auguste'); ?></p>
					<span><?php echo esc_html($r['address']); ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
