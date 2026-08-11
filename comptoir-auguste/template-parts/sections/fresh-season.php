<?php
/**
 * Fresh / values section.
 *
 * @package Comptoir_Auguste
 */

$values = ca_values();
?>
<section class="section <?php echo esc_attr(ca_class('FreshSeason', 'section')); ?>" aria-labelledby="fresh-title">
	<div class="container">
		<div class="reveal <?php echo esc_attr(ca_class('FreshSeason', 'title')); ?>">
			<div class="<?php echo esc_attr(ca_class('SectionTitle', 'root', 'center', 'dark')); ?>">
				<h2 id="fresh-title" class="<?php echo esc_attr(ca_class('SectionTitle', 'title')); ?>">
					<?php esc_html_e('Chaque jour, avec de bons produits.', 'comptoir-auguste'); ?>
				</h2>
				<p class="<?php echo esc_attr(ca_class('SectionTitle', 'text')); ?>">
					<?php esc_html_e('Élaborée chaque jour à partir de produits frais et de saison.', 'comptoir-auguste'); ?>
				</p>
			</div>
		</div>
		<div class="<?php echo esc_attr(ca_class('FreshSeason', 'grid')); ?>">
			<?php foreach ($values as $item) : ?>
				<div class="reveal <?php echo esc_attr(ca_class('FreshSeason', 'card')); ?>">
					<h3><?php echo esc_html($item['title']); ?></h3>
					<p><?php echo esc_html($item['text']); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
