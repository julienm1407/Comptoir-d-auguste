<?php
/**
 * Side mosaic frame with gutters.
 *
 * @var array $args {
 *   left?, right?, accent?, variant?, content_callback? OR content via include after open
 * }
 * Usage: get_template_part with 'open' then content then 'close' — simpler: pass $content HTML.
 *
 * For simplicity this partial expects $args['inner'] as callable or we use two-part pattern.
 * We'll use a simple approach: sections include left/right images themselves with SideMosaic classes.
 *
 * @package Comptoir_Auguste
 */

$left    = $args['left'] ?? 'cutouts/mosaique-2-cutout.webp';
$right   = $args['right'] ?? 'cutouts/mosaique-3-cutout.webp';
$accent  = $args['accent'] ?? '';
$variant = $args['variant'] ?? 'bleed';
$inner   = $args['inner'] ?? '';
?>
<div class="<?php echo esc_attr(ca_class('SideMosaic', 'frame', $variant)); ?>">
	<aside class="<?php echo esc_attr(ca_class('SideMosaic', 'gutterLeft')); ?>" aria-hidden="true">
		<img class="<?php echo esc_attr(ca_class('SideMosaic', 'leftPiece')); ?>" src="<?php echo esc_url(ca_brand($left)); ?>" alt="" width="720" height="720" loading="lazy">
	</aside>
	<div class="<?php echo esc_attr(ca_class('SideMosaic', 'content')); ?>">
		<?php
		if (is_callable($inner)) {
			$inner();
		} elseif (is_string($inner) && $inner !== '') {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted template HTML
			echo $inner;
		}
		?>
	</div>
	<aside class="<?php echo esc_attr(ca_class('SideMosaic', 'gutterRight')); ?>" aria-hidden="true">
		<img class="<?php echo esc_attr(ca_class('SideMosaic', 'rightPiece')); ?>" src="<?php echo esc_url(ca_brand($right)); ?>" alt="" width="640" height="640" loading="lazy">
		<?php if ($accent !== '') : ?>
			<img class="<?php echo esc_attr(ca_class('SideMosaic', 'accentPiece')); ?>" src="<?php echo esc_url(ca_brand($accent)); ?>" alt="" width="420" height="420" loading="lazy">
		<?php endif; ?>
	</aside>
</div>
