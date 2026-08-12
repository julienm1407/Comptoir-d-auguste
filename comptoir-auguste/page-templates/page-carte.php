<?php
/**
 * Template Name: La carte
 *
 * @package Comptoir_Auguste
 */

get_header();

$categories = ca_categories();
$products   = ca_products();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('La carte', 'comptoir-auguste'),
	'text'  => __('Formules, plats du moment, salades, snacking, desserts et boissons — une cuisine maison, claire et généreuse.', 'comptoir-auguste'),
]); ?>

<div class="<?php echo esc_attr(ca_class('page-carte', 'shell')); ?>">
	<?php
	get_template_part('template-parts/components/side', 'mosaic', [
		'left'    => 'cutouts/mosaique-2-cutout.webp',
		'right'   => 'cutouts/mosaique-3-cutout.webp',
		'variant' => 'dense',
		'inner'   => static function () use ($categories, $products): void {
			?>
			<div class="container section <?php echo esc_attr(ca_class('page-carte', 'page')); ?>">
				<nav class="<?php echo esc_attr(ca_class('page-carte', 'anchors')); ?>" aria-label="<?php esc_attr_e('Catégories', 'comptoir-auguste'); ?>">
					<?php foreach ($categories as $category) : ?>
						<a href="#<?php echo esc_attr($category['slug']); ?>" class="<?php echo esc_attr(ca_class('page-carte', 'anchor')); ?>">
							<span class="<?php echo esc_attr(ca_class('page-carte', 'anchorIcon')); ?>">
								<img src="<?php echo esc_url(ca_brand($category['mosaic'])); ?>" alt="" width="28" height="28">
							</span>
							<span><?php echo esc_html($category['name']); ?></span>
						</a>
					<?php endforeach; ?>
				</nav>

				<?php foreach ($categories as $category) : ?>
					<?php
					$cat_products = array_values(array_filter(
						$products,
						static fn(array $p): bool => ($p['categorySlug'] ?? '') === $category['slug']
					));
					$families = array_values(array_unique(array_filter(array_map(
						static fn(array $p) => $p['family'] ?? null,
						$cat_products
					))));
					$use_families = count($families) > 1;
					?>
					<section
						id="<?php echo esc_attr($category['slug']); ?>"
						class="<?php echo esc_attr(ca_class('page-carte', 'category')); ?>"
						aria-labelledby="<?php echo esc_attr($category['slug'] . '-title'); ?>"
					>
						<div class="<?php echo esc_attr(ca_class('page-carte', 'categoryHeader')); ?>">
							<span class="<?php echo esc_attr(ca_class('page-carte', 'categoryMosaic')); ?>">
								<img src="<?php echo esc_url(ca_brand($category['mosaic'])); ?>" alt="" width="72" height="72">
							</span>
							<div>
								<h2 id="<?php echo esc_attr($category['slug'] . '-title'); ?>"><?php echo esc_html($category['name']); ?></h2>
								<p><?php echo esc_html($category['description']); ?></p>
							</div>
						</div>

						<?php if (!$cat_products) : ?>
							<p class="<?php echo esc_attr(ca_class('page-carte', 'empty')); ?>">
								<?php esc_html_e('Les plats de cette catégorie seront ajoutés prochainement.', 'comptoir-auguste'); ?>
							</p>
						<?php elseif ($use_families) : ?>
							<?php foreach ($families as $family) : ?>
								<?php
								$family_products = array_values(array_filter(
									$cat_products,
									static fn(array $p): bool => ($p['family'] ?? '') === $family
								));
								?>
								<div class="<?php echo esc_attr(ca_class('page-carte', 'family')); ?>">
									<h3 class="<?php echo esc_attr(ca_class('page-carte', 'familyTitle')); ?>"><?php echo esc_html($family); ?></h3>
									<div class="<?php echo esc_attr(ca_class('page-carte', 'grid')); ?>">
										<?php foreach ($family_products as $product) : ?>
											<div id="<?php echo esc_attr($product['slug']); ?>">
												<?php get_template_part('template-parts/components/product', 'card', ['product' => $product]); ?>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="<?php echo esc_attr(ca_class('page-carte', 'grid')); ?>">
								<?php foreach ($cat_products as $product) : ?>
									<div id="<?php echo esc_attr($product['slug']); ?>">
										<?php get_template_part('template-parts/components/product', 'card', ['product' => $product]); ?>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</section>
				<?php endforeach; ?>
			</div>
			<?php
		},
	]);
	?>
</div>

<div class="container section--tight">
	<?php get_template_part('template-parts/components/order', 'cta', [
		'title' => __('On vous prépare quoi ?', 'comptoir-auguste'),
		'tone'  => 'blue',
	]); ?>
</div>
<?php
get_footer();
