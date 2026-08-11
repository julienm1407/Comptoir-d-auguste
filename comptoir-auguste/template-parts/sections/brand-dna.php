<?php
/**
 * Brand DNA section.
 *
 * @package Comptoir_Auguste
 */

$restaurant = ca_restaurant();
$pillars = [
    ['title' => 'Fait maison', 'text' => 'Entièrement préparé en cuisine, chaque jour.'],
    ['title' => 'Produits frais', 'text' => 'Des produits choisis pour leur qualité.'],
    ['title' => 'Saisonnalité', 'text' => 'Une carte qui suit les saisons et les envies.'],
    ['title' => 'Provence & Méditerranée', 'text' => 'Des saveurs inspirées, généreuses et authentiques.'],
];
?>
<section id="le-comptoir" class="section <?php echo esc_attr(ca_class('BrandDna', 'section')); ?>" aria-labelledby="dna-title">
	<?php
	get_template_part('template-parts/components/side', 'mosaic', [
		'left'    => 'cutouts/mosaique-2-cutout.webp',
		'right'   => 'cutouts/poisson-cutout.webp',
		'variant' => 'corners',
		'inner'   => static function () use ($restaurant, $pillars): void {
			?>
			<div class="container <?php echo esc_attr(ca_class('BrandDna', 'grid')); ?>">
				<div class="reveal <?php echo esc_attr(ca_class('BrandDna', 'media')); ?>">
					<img
						class="<?php echo esc_attr(ca_class('BrandDna', 'image')); ?>"
						src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1200&q=80"
						alt="<?php esc_attr_e('Cuisine maison en préparation', 'comptoir-auguste'); ?>"
						width="1200"
						height="900"
						loading="lazy"
					>
				</div>
				<div class="reveal <?php echo esc_attr(ca_class('BrandDna', 'copy')); ?>">
					<p class="<?php echo esc_attr(ca_class('BrandDna', 'eyebrow')); ?>"><?php esc_html_e('L’ADN du comptoir', 'comptoir-auguste'); ?></p>
					<h2 id="dna-title" class="<?php echo esc_attr(ca_class('BrandDna', 'title')); ?>">
						<?php esc_html_e('Derrière chaque plat, une envie de bien faire.', 'comptoir-auguste'); ?>
					</h2>
					<p class="<?php echo esc_attr(ca_class('BrandDna', 'lead')); ?>"><?php echo esc_html($restaurant['philosophy']); ?></p>
					<p class="<?php echo esc_attr(ca_class('BrandDna', 'text')); ?>"><?php echo esc_html($restaurant['intro']); ?></p>
					<ul class="<?php echo esc_attr(ca_class('BrandDna', 'pillars')); ?>">
						<?php foreach ($pillars as $item) : ?>
							<li>
								<h3><?php echo esc_html($item['title']); ?></h3>
								<p><?php echo esc_html($item['text']); ?></p>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<?php
		},
	]);
	?>
</section>
