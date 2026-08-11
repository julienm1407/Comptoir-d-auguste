<?php
/**
 * Template Name: Mentions légales
 *
 * @package Comptoir_Auguste
 */

get_header();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('Mentions légales', 'comptoir-auguste'),
	'text'  => __('Contenu juridique à compléter.', 'comptoir-auguste'),
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
				echo '<p>' . esc_html__('Cette page est un placeholder. Les mentions légales définitives seront ajoutées avant la mise en ligne.', 'comptoir-auguste') . '</p>';
			}
		}
	}
	?>
</div>
<?php
get_footer();
