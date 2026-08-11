<?php
/**
 * Mosaic inset signature band.
 *
 * @package Comptoir_Auguste
 */
?>
<section class="<?php echo esc_attr(ca_class('MosaicInset', 'section')); ?>" aria-label="<?php esc_attr_e('Motifs mosaïque Comptoir d’Auguste', 'comptoir-auguste'); ?>">
	<div class="<?php echo esc_attr(ca_class('MosaicInset', 'frame')); ?>">
		<aside class="<?php echo esc_attr(ca_class('MosaicInset', 'gutterLeft')); ?>" aria-hidden="true">
			<img class="<?php echo esc_attr(ca_class('MosaicInset', 'leftPiece')); ?>" src="<?php echo esc_url(ca_brand('cutouts/mosaique-2-cutout.webp')); ?>" alt="" width="720" height="720" loading="lazy">
			<img class="<?php echo esc_attr(ca_class('MosaicInset', 'leftPieceSecondary')); ?>" src="<?php echo esc_url(ca_brand('cutouts/mosaique-1-cutout.webp')); ?>" alt="" width="640" height="640" loading="lazy">
		</aside>
		<div class="reveal <?php echo esc_attr(ca_class('MosaicInset', 'copy')); ?>">
			<p class="<?php echo esc_attr(ca_class('MosaicInset', 'eyebrow')); ?>"><?php esc_html_e('Signature visuelle', 'comptoir-auguste'); ?></p>
			<h2 class="<?php echo esc_attr(ca_class('MosaicInset', 'title')); ?>"><?php esc_html_e('Une mosaïque contemporaine.', 'comptoir-auguste'); ?></h2>
			<p class="<?php echo esc_attr(ca_class('MosaicInset', 'text')); ?>">
				<?php esc_html_e('Graphique, artisanale, méditerranéenne — le langage visuel d’Auguste, incrusté dans chaque page.', 'comptoir-auguste'); ?>
			</p>
		</div>
		<aside class="<?php echo esc_attr(ca_class('MosaicInset', 'gutterRight')); ?>" aria-hidden="true">
			<img class="<?php echo esc_attr(ca_class('MosaicInset', 'rightPiece')); ?>" src="<?php echo esc_url(ca_brand('cutouts/mosaique-3-cutout.webp')); ?>" alt="" width="640" height="640" loading="lazy">
		</aside>
	</div>
</section>
