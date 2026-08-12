<?php
/**
 * Reviews section.
 *
 * @package Comptoir_Auguste
 */

$reviews = ca_reviews();
?>
<section class="section <?php echo esc_attr(ca_class('Reviews', 'section')); ?>" aria-labelledby="reviews-title">
	<?php
	get_template_part('template-parts/components/side', 'mosaic', [
		'left'    => 'cutouts/rameaux-olivier-cutout.webp',
		'right'   => 'cutouts/cigalle-cutout.webp',
		'variant' => 'soft',
		'inner'   => static function () use ($reviews): void {
			?>
			<div class="container">
				<div class="reveal">
					<div class="<?php echo esc_attr(ca_class('SectionTitle', 'root', 'left', 'dark')); ?>">
						<h2 id="reviews-title" class="<?php echo esc_attr(ca_class('SectionTitle', 'title')); ?>">
							<?php esc_html_e('Ils en parlent mieux que nous.', 'comptoir-auguste'); ?>
						</h2>
						<p class="<?php echo esc_attr(ca_class('SectionTitle', 'text')); ?>">
							<?php esc_html_e('Les avis ci-dessous sont des placeholders. Les vrais retours clients seront intégrés prochainement (Google Reviews).', 'comptoir-auguste'); ?>
						</p>
					</div>
				</div>

				<div class="<?php echo esc_attr(ca_class('Reviews', 'grid')); ?>">
					<?php foreach ($reviews as $review) : ?>
						<div class="reveal">
							<?php get_template_part('template-parts/components/review', 'card', ['review' => $review]); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php
		},
	]);
	?>
</section>
