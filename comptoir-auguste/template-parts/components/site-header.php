<?php
/**
 * Site header (sticky nav).
 *
 * @package Comptoir_Auguste
 */

$nav = ca_nav_links();
$order = ca_order_url();
?>
<header class="<?php echo esc_attr(ca_class('Header', 'header')); ?>" data-ca-header>
	<div class="container <?php echo esc_attr(ca_class('Header', 'inner')); ?>">
		<a class="<?php echo esc_attr(ca_class('Header', 'logo')); ?>" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Comptoir d’Auguste — Accueil', 'comptoir-auguste'); ?>">
			<img
				class="<?php echo esc_attr(ca_class('Header', 'logoImage')); ?>"
				src="<?php echo esc_url(ca_brand('logo-header.png')); ?>"
				alt="<?php esc_attr_e('Comptoir d’Auguste', 'comptoir-auguste'); ?>"
				width="180"
				height="180"
			>
		</a>

		<nav class="<?php echo esc_attr(ca_class('Header', 'nav')); ?>" aria-label="<?php esc_attr_e('Navigation principale', 'comptoir-auguste'); ?>">
			<?php foreach ($nav as $link) : ?>
				<a class="<?php echo esc_attr(ca_class('Header', 'link')); ?>" href="<?php echo esc_url($link['href']); ?>">
					<?php echo esc_html($link['label']); ?>
				</a>
			<?php endforeach; ?>
		</nav>

		<div class="<?php echo esc_attr(ca_class('Header', 'actions')); ?>">
			<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'sm') . ' ' . ca_class('Header', 'desktopCta')); ?>" href="<?php echo esc_url($order); ?>">
				<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
			</a>
			<button
				type="button"
				class="<?php echo esc_attr(ca_class('Header', 'menuButton')); ?>"
				data-ca-menu-toggle
				aria-expanded="false"
				aria-controls="mobile-menu"
				aria-label="<?php esc_attr_e('Ouvrir le menu', 'comptoir-auguste'); ?>"
			>
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>

	<div id="mobile-menu" class="<?php echo esc_attr(ca_class('Header', 'mobilePanel')); ?>" hidden>
		<nav class="<?php echo esc_attr(ca_class('Header', 'mobileNav')); ?>" aria-label="<?php esc_attr_e('Navigation mobile', 'comptoir-auguste'); ?>">
			<?php foreach ($nav as $link) : ?>
				<a class="<?php echo esc_attr(ca_class('Header', 'mobileLink')); ?>" href="<?php echo esc_url($link['href']); ?>">
					<?php echo esc_html($link['label']); ?>
				</a>
			<?php endforeach; ?>
			<div class="<?php echo esc_attr(ca_class('Header', 'mobileOrder')); ?>">
				<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'md', 'fullWidth')); ?>" href="<?php echo esc_url($order); ?>">
					<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
				</a>
			</div>
		</nav>
	</div>
</header>
