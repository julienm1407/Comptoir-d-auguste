<?php
/**
 * Menu categories preview.
 *
 * @package Comptoir_Auguste
 */

$categories = ca_home_categories();
?>
<section class="section <?php echo esc_attr(ca_class('MenuPreview', 'section')); ?>" aria-labelledby="menu-preview-title">
	<?php
	get_template_part('template-parts/components/side', 'mosaic', [
		'left'    => 'cutouts/rameaux-olivier-cutout.webp',
		'right'   => 'cutouts/huole-dolive-cutout.webp',
		'variant' => 'corners',
		'inner'   => static function () use ($categories): void {
			?>
			<div class="container <?php echo esc_attr(ca_class('MenuPreview', 'inner')); ?>">
				<div class="<?php echo esc_attr(ca_class('MenuPreview', 'header')); ?>">
					<div class="reveal">
						<div class="<?php echo esc_attr(ca_class('SectionTitle', 'root', 'left', 'dark')); ?>">
							<h2 id="menu-preview-title" class="<?php echo esc_attr(ca_class('SectionTitle', 'title')); ?>">
								<?php esc_html_e('La cuisine d’Auguste', 'comptoir-auguste'); ?>
							</h2>
							<p class="<?php echo esc_attr(ca_class('SectionTitle', 'text')); ?>">
								<?php esc_html_e('Formules, entrées, plats du moment, salades, snacking et desserts — plus les boissons sur la carte complète.', 'comptoir-auguste'); ?>
							</p>
						</div>
					</div>
					<div class="reveal">
						<a class="<?php echo esc_attr(ca_class('MenuPreview', 'link')); ?>" href="<?php echo esc_url(ca_page_url('carte')); ?>">
							<?php esc_html_e('Voir la carte', 'comptoir-auguste'); ?>
						</a>
					</div>
				</div>
				<div class="<?php echo esc_attr(ca_class('MenuPreview', 'grid')); ?>">
					<?php foreach ($categories as $category) : ?>
						<div class="reveal">
							<a class="<?php echo esc_attr(ca_class('CategoryCard', 'card')); ?>" href="<?php echo esc_url(ca_page_url('carte') . '#' . $category['slug']); ?>">
								<div class="<?php echo esc_attr(ca_class('CategoryCard', 'mosaicWrap')); ?>">
									<img class="<?php echo esc_attr(ca_class('CategoryCard', 'mosaic')); ?>" src="<?php echo esc_url(ca_brand($category['mosaic'])); ?>" alt="" width="200" height="200" loading="lazy">
								</div>
								<div class="<?php echo esc_attr(ca_class('CategoryCard', 'content')); ?>">
									<h3 class="<?php echo esc_attr(ca_class('CategoryCard', 'name')); ?>"><?php echo esc_html($category['name']); ?></h3>
									<p class="<?php echo esc_attr(ca_class('CategoryCard', 'description')); ?>"><?php echo esc_html($category['description']); ?></p>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php
		},
	]);
	?>
</section>
