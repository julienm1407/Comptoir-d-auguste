<?php
/**
 * Featured dishes carousel (plats du moment).
 *
 * @package Comptoir_Auguste
 */

$products = function_exists('ca_moment_products') ? ca_moment_products() : array_slice(ca_featured_products(), 0, 6);
if (empty($products)) {
	$products = array_slice(ca_featured_products(), 0, 6);
}
?>
<section class="section <?php echo esc_attr(ca_class('FeaturedDishes', 'section')); ?>" aria-labelledby="featured-title" data-ca-featured>
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
					</div>
				</div>

				<div class="<?php echo esc_attr(ca_class('FeaturedDishes', 'carousel')); ?>">
					<div
						class="<?php echo esc_attr(ca_class('FeaturedDishes', 'track')); ?>"
						data-ca-featured-track
						data-count="3"
						aria-live="polite"
					>
						<?php foreach ($products as $i => $product) : ?>
							<div
								class="<?php echo esc_attr(ca_class('FeaturedDishes', 'slide')); ?>"
								data-ca-featured-slide
								<?php echo $i >= 3 ? 'hidden' : ''; ?>
							>
								<?php get_template_part('template-parts/components/product', 'card', [
									'product' => $product,
									'compact' => true,
								]); ?>
							</div>
						<?php endforeach; ?>
					</div>

					<?php if (count($products) > 1) : ?>
						<div class="<?php echo esc_attr(ca_class('FeaturedDishes', 'controls')); ?>" data-ca-featured-controls hidden>
							<button type="button" class="<?php echo esc_attr(ca_class('FeaturedDishes', 'arrow')); ?>" aria-label="<?php esc_attr_e('Plats précédents', 'comptoir-auguste'); ?>" data-ca-featured-prev>←</button>
							<div class="<?php echo esc_attr(ca_class('FeaturedDishes', 'dots')); ?>" role="tablist" aria-label="<?php esc_attr_e('Pages du carrousel', 'comptoir-auguste'); ?>" data-ca-featured-dots></div>
							<button type="button" class="<?php echo esc_attr(ca_class('FeaturedDishes', 'arrow')); ?>" aria-label="<?php esc_attr_e('Plats suivants', 'comptoir-auguste'); ?>" data-ca-featured-next>→</button>
						</div>
					<?php endif; ?>
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
