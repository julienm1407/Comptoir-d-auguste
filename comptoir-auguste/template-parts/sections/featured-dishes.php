<?php
/**
 * Featured dishes.
 *
 * @package Comptoir_Auguste
 */

$products = array_slice(ca_featured_products(), 0, 4);
?>
<section class="section <?php echo esc_attr(ca_class('FeaturedDishes', 'section')); ?>" aria-labelledby="featured-title">
	<?php
	get_template_part('template-parts/components/side', 'mosaic', [
		'left'    => 'cutouts/mosaique-1-cutout.webp',
		'right'   => 'cutouts/cigalle-cutout.webp',
		'variant' => 'bleed',
		'inner'   => static function () use ($products): void {
			?>
			<div class="container <?php echo esc_attr(ca_class('FeaturedDishes', 'inner')); ?>">
				<div class="reveal">
					<div class="<?php echo esc_attr(ca_class('SectionTitle', 'root', 'left', 'dark')); ?>">
						<p class="<?php echo esc_attr(ca_class('SectionTitle', 'eyebrow')); ?>"><?php esc_html_e('À découvrir', 'comptoir-auguste'); ?></p>
						<h2 id="featured-title" class="<?php echo esc_attr(ca_class('SectionTitle', 'title')); ?>">
							<?php esc_html_e('Les plats du moment', 'comptoir-auguste'); ?>
						</h2>
						<p class="<?php echo esc_attr(ca_class('SectionTitle', 'text')); ?>">
							<?php esc_html_e('Notre carte évolue au gré des saisons et de nos inspirations.', 'comptoir-auguste'); ?>
						</p>
					</div>
				</div>
				<div class="<?php echo esc_attr(ca_class('FeaturedDishes', 'grid')); ?>">
					<?php foreach ($products as $product) : ?>
						<div class="reveal">
							<?php get_template_part('template-parts/components/product', 'card', ['product' => $product]); ?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="reveal <?php echo esc_attr(ca_class('FeaturedDishes', 'actions')); ?>">
					<a class="<?php echo esc_attr(ca_class('Button', 'button', 'ghost', 'md')); ?>" href="<?php echo esc_url(ca_page_url('carte')); ?>">
						<?php esc_html_e('Voir la carte', 'comptoir-auguste'); ?>
					</a>
					<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'md')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
						<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
					</a>
				</div>
			</div>
			<?php
		},
	]);
	?>
</section>
