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
	<div class="<?php echo esc_attr(ca_class('page-notre-histoire', 'intro')); ?>">
		<p class="<?php echo esc_attr(ca_class('page-notre-histoire', 'lead')); ?>"><?php echo esc_html($r['intro']); ?></p>
		<p><?php echo esc_html($r['menu']); ?></p>
		<p><?php echo esc_html($r['closing']); ?></p>
	</div>

	<div class="<?php echo esc_attr(ca_class('page-notre-histoire', 'media')); ?>">
		<img
			class="<?php echo esc_attr(ca_class('page-notre-histoire', 'image')); ?>"
			src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80"
			alt="<?php esc_attr_e('Cuisine maison généreuse', 'comptoir-auguste'); ?>"
			width="900"
			height="700"
			loading="lazy"
		>
	</div>

	<div class="<?php echo esc_attr(ca_class('page-notre-histoire', 'values')); ?>">
		<h2><?php esc_html_e('Ce qui guide la cuisine', 'comptoir-auguste'); ?></h2>
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
	</div>
</article>

<div class="container section--tight">
	<?php get_template_part('template-parts/components/order', 'cta', [
		'title' => __('Une cuisine qui évolue avec les saisons.', 'comptoir-auguste'),
		'text'  => __('Venez découvrir ce qui se prépare aujourd’hui.', 'comptoir-auguste'),
	]); ?>
</div>
<?php
get_footer();
