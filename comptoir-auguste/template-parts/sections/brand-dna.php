<?php
/**
 * Brand DNA section.
 *
 * @package Comptoir_Auguste
 */

$restaurant = ca_restaurant();
?>
<section id="le-comptoir" class="section <?php echo esc_attr(ca_class('BrandDna', 'section')); ?>" aria-labelledby="dna-title">
	<?php
	get_template_part('template-parts/components/side', 'mosaic', [
		'left'    => 'cutouts/mosaique-2-cutout.webp',
		'right'   => 'cutouts/poisson-cutout.webp',
		'variant' => 'corners',
		'inner'   => static function () use ($restaurant): void {
			?>
			<div class="container <?php echo esc_attr(ca_class('BrandDna', 'layout')); ?>">
				<div class="reveal <?php echo esc_attr(ca_class('BrandDna', 'media')); ?>">
					<img
						class="<?php echo esc_attr(ca_class('BrandDna', 'image')); ?>"
						src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1400&q=80"
						alt="<?php esc_attr_e('Cuisine maison en préparation', 'comptoir-auguste'); ?>"
						width="1400"
						height="900"
						loading="lazy"
					>
				</div>

				<div class="<?php echo esc_attr(ca_class('BrandDna', 'panel')); ?>">
					<p class="<?php echo esc_attr(ca_class('BrandDna', 'eyebrow')); ?>"><?php esc_html_e('L’ADN du comptoir', 'comptoir-auguste'); ?></p>
					<h2 id="dna-title" class="<?php echo esc_attr(ca_class('BrandDna', 'title')); ?>">
						<?php esc_html_e('Derrière chaque plat, une envie de bien faire.', 'comptoir-auguste'); ?>
					</h2>
					<p class="<?php echo esc_attr(ca_class('BrandDna', 'text')); ?>">
						<?php echo esc_html($restaurant['philosophy'] . ' ' . $restaurant['intro']); ?>
					</p>
				</div>
			</div>
			<?php
		},
	]);
	?>
</section>
