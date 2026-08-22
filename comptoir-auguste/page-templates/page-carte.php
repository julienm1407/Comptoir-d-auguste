<?php
/**
 * Template Name: La carte
 *
 * Showcase: categories only — full dish list lives on Fox Order / Uber Eats.
 *
 * @package Comptoir_Auguste
 */

get_header();

$categories = ca_categories();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('La carte', 'comptoir-auguste'),
	'text'  => __('Nos univers culinaires — la carte détaillée et les disponibilités sont à la commande.', 'comptoir-auguste'),
]); ?>

<div class="<?php echo esc_attr(ca_class('page-carte', 'shell')); ?>">
	<?php
	get_template_part('template-parts/components/side', 'mosaic', [
		'left'    => 'cutouts/mosaique-2-cutout.webp',
		'right'   => 'cutouts/mosaique-3-cutout.webp',
		'variant' => 'dense',
		'inner'   => static function () use ($categories): void {
			?>
			<div class="container section <?php echo esc_attr(ca_class('page-carte', 'page')); ?>">
				<p class="<?php echo esc_attr(ca_class('page-carte', 'lead')); ?>">
					<?php esc_html_e('Survolez les familles de plats ci-dessous. Pour commander, les plats du jour et les prix sont sur Fox Order (ou Uber Eats en livraison).', 'comptoir-auguste'); ?>
				</p>

				<div class="<?php echo esc_attr(ca_class('page-carte', 'grid')); ?>">
					<?php foreach ($categories as $category) : ?>
						<article
							id="<?php echo esc_attr($category['slug']); ?>"
							class="<?php echo esc_attr(ca_class('page-carte', 'category')); ?>"
						>
							<span class="<?php echo esc_attr(ca_class('page-carte', 'mosaic')); ?>" aria-hidden="true">
								<img src="<?php echo esc_url(ca_brand($category['mosaic'])); ?>" alt="" width="96" height="96">
							</span>
							<div class="<?php echo esc_attr(ca_class('page-carte', 'copy')); ?>">
								<h2><?php echo esc_html($category['name']); ?></h2>
								<p><?php echo esc_html($category['description']); ?></p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>

				<div class="<?php echo esc_attr(ca_class('page-carte', 'actions')); ?>">
					<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
						<?php esc_html_e('Voir la carte & commander', 'comptoir-auguste'); ?>
					</a>
					<?php get_template_part('template-parts/components/uber', 'eats-button'); ?>
				</div>
			</div>
			<?php
		},
	]);
	?>
</div>

<div class="container section--tight">
	<?php get_template_part('template-parts/components/order', 'cta', [
		'title' => __('On vous prépare quoi ?', 'comptoir-auguste'),
		'text'  => __('La carte complète est à la commande — frais, du jour, fait maison.', 'comptoir-auguste'),
		'tone'  => 'blue',
	]); ?>
</div>
<?php
get_footer();
