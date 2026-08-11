<?php
/**
 * Site footer.
 *
 * @package Comptoir_Auguste
 */

$restaurant = ca_restaurant();
$hours      = ca_opening_hours();
$footer_nav = ca_footer_nav();
$footer_order = ca_footer_order();
$year = (int) gmdate('Y');
?>
<footer class="<?php echo esc_attr(ca_class('Footer', 'footer')); ?>">
	<div class="<?php echo esc_attr(ca_class('Footer', 'decor')); ?>" aria-hidden="true">
		<img
			class="<?php echo esc_attr(ca_class('Footer', 'decorPiece', 'decorLeft')); ?>"
			src="<?php echo esc_url(ca_brand('cutouts/mosaique-2-cutout.webp')); ?>"
			alt=""
			width="700"
			height="700"
			loading="lazy"
		>
		<img
			class="<?php echo esc_attr(ca_class('Footer', 'decorPiece', 'decorRight')); ?>"
			src="<?php echo esc_url(ca_brand('cutouts/mosaique-3-cutout.webp')); ?>"
			alt=""
			width="600"
			height="600"
			loading="lazy"
		>
	</div>

	<div class="container <?php echo esc_attr(ca_class('Footer', 'inner')); ?>">
		<div class="<?php echo esc_attr(ca_class('Footer', 'brand')); ?>">
			<img
				class="<?php echo esc_attr(ca_class('Footer', 'logo')); ?>"
				src="<?php echo esc_url(ca_brand('logo-principal.png')); ?>"
				alt="<?php esc_attr_e('Comptoir d’Auguste', 'comptoir-auguste'); ?>"
				width="140"
				height="140"
				loading="lazy"
			>
			<p class="<?php echo esc_attr(ca_class('Footer', 'signature')); ?>"><?php echo esc_html($restaurant['signature']); ?>.</p>
		</div>

		<div class="<?php echo esc_attr(ca_class('Footer', 'cols')); ?>">
			<div>
				<h2 class="<?php echo esc_attr(ca_class('Footer', 'heading')); ?>"><?php esc_html_e('Navigation', 'comptoir-auguste'); ?></h2>
				<ul class="<?php echo esc_attr(ca_class('Footer', 'list')); ?>">
					<?php foreach ($footer_nav as $link) : ?>
						<li><a href="<?php echo esc_url($link['href']); ?>"><?php echo esc_html($link['label']); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div>
				<h2 class="<?php echo esc_attr(ca_class('Footer', 'heading')); ?>"><?php esc_html_e('Commande', 'comptoir-auguste'); ?></h2>
				<ul class="<?php echo esc_attr(ca_class('Footer', 'list')); ?>">
					<?php foreach ($footer_order as $link) : ?>
						<li><a href="<?php echo esc_url($link['href']); ?>"><?php echo esc_html($link['label']); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div>
				<h2 class="<?php echo esc_attr(ca_class('Footer', 'heading')); ?>"><?php esc_html_e('Informations', 'comptoir-auguste'); ?></h2>
				<ul class="<?php echo esc_attr(ca_class('Footer', 'list')); ?>">
					<li><?php echo esc_html($restaurant['address']); ?></li>
					<li><?php echo esc_html($restaurant['phone']); ?></li>
					<li><a href="mailto:<?php echo esc_attr($restaurant['email']); ?>"><?php echo esc_html($restaurant['email']); ?></a></li>
					<li class="<?php echo esc_attr(ca_class('Footer', 'hoursPreview')); ?>">
						<?php echo esc_html($hours[0]['day'] . ' — ' . $hours[0]['hours']); ?>
					</li>
				</ul>
			</div>
			<div>
				<h2 class="<?php echo esc_attr(ca_class('Footer', 'heading')); ?>"><?php esc_html_e('Réseaux', 'comptoir-auguste'); ?></h2>
				<ul class="<?php echo esc_attr(ca_class('Footer', 'list')); ?>">
					<?php foreach ($restaurant['socials'] as $social) : ?>
						<li><a href="<?php echo esc_url($social['href']); ?>"><?php echo esc_html($social['label']); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="<?php echo esc_attr(ca_class('Footer', 'bottom')); ?>">
		<div class="container <?php echo esc_attr(ca_class('Footer', 'bottomInner')); ?>">
			<p>&copy; <?php echo esc_html((string) $year); ?> Comptoir d’Auguste</p>
			<div class="<?php echo esc_attr(ca_class('Footer', 'legal')); ?>">
				<a href="<?php echo esc_url(ca_page_url('mentions-legales')); ?>"><?php esc_html_e('Mentions légales', 'comptoir-auguste'); ?></a>
				<a href="<?php echo esc_url(ca_page_url('politique-de-confidentialite')); ?>"><?php esc_html_e('Politique de confidentialité', 'comptoir-auguste'); ?></a>
			</div>
		</div>
	</div>
</footer>
