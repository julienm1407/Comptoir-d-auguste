<?php
/**
 * Template Name: Politique de confidentialité
 *
 * @package Comptoir_Auguste
 */

get_header();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('Politique de confidentialité', 'comptoir-auguste'),
	'text'  => __('Contenu RGPD à compléter.', 'comptoir-auguste'),
]); ?>
<div class="container section container--narrow">
	<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			$content = trim((string) get_the_content());
			if ($content !== '') {
				the_content();
			} else {
				echo '<p>' . esc_html__('Cette page est un placeholder. La politique de confidentialité définitive sera ajoutée avant la mise en ligne.', 'comptoir-auguste') . '</p>';
			}
		}
	}
	?>
</div>
<?php
get_footer();
