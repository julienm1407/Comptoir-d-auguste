<?php
/**
 * Template Name: Notre histoire
 *
 * @package Comptoir_Auguste
 */

get_header();
$r = ca_restaurant();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title'   => $r['name'],
	'text'    => $r['signature'],
	'eyebrow' => __('Notre histoire', 'comptoir-auguste'),
]); ?>

<article class="container section <?php echo esc_attr(ca_class('page-notre-histoire', 'article')); ?>">
	<div class="<?php echo esc_attr(ca_class('page-notre-histoire', 'story')); ?>">
		<div class="<?php echo esc_attr(ca_class('page-notre-histoire', 'copy')); ?>">
			<p class="<?php echo esc_attr(ca_class('page-notre-histoire', 'lead')); ?>"><?php echo esc_html($r['intro']); ?></p>
			<p><?php echo esc_html($r['menu']); ?></p>
			<p><?php echo esc_html($r['closing']); ?></p>
		</div>

		<div class="<?php echo esc_attr(ca_class('page-notre-histoire', 'media')); ?>">
			<img
				class="<?php echo esc_attr(ca_class('page-notre-histoire', 'image')); ?>"
				src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1400&q=80"
				alt="<?php esc_attr_e('Cuisine maison en préparation', 'comptoir-auguste'); ?>"
				width="900"
				height="1100"
				loading="lazy"
			>
		</div>
	</div>

	<section class="<?php echo esc_attr(ca_class('page-notre-histoire', 'values')); ?>" aria-labelledby="values-title">
		<h2 id="values-title"><?php esc_html_e('Ce qui guide la cuisine', 'comptoir-auguste'); ?></h2>
		<ul>
			<li>
				<h3><?php esc_html_e('Inspiration Provence', 'comptoir-auguste'); ?></h3>
				<p><?php esc_html_e('Des saveurs généreuses, sincères et ensoleillées.', 'comptoir-auguste'); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e('Inspiration Méditerranée', 'comptoir-auguste'); ?></h3>
				<p><?php esc_html_e('Une cuisine conviviale, ouverte et gourmande.', 'comptoir-auguste'); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e('Fait maison', 'comptoir-auguste'); ?></h3>
				<p><?php esc_html_e('Entièrement préparé chaque jour en cuisine.', 'comptoir-auguste'); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e('Produits frais & saison', 'comptoir-auguste'); ?></h3>
				<p><?php esc_html_e('La carte évolue selon les arrivages et les envies.', 'comptoir-auguste'); ?></p>
			</li>
		</ul>
	</section>

	<p class="<?php echo esc_attr(ca_class('page-notre-histoire', 'carteLink')); ?>">
		<a href="<?php echo esc_url(ca_page_url('carte')); ?>"><?php esc_html_e('Voir la carte', 'comptoir-auguste'); ?></a>
	</p>
</article>
<?php
get_footer();
