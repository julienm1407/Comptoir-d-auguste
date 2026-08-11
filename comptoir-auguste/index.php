<?php
/**
 * Main fallback template.
 *
 * @package Comptoir_Auguste
 */

get_header();
?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<?php get_template_part('template-parts/components/page', 'hero', ['title' => get_the_title()]); ?>
		<div class="container section container--narrow">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part('template-parts/components/page', 'hero', [
		'title' => __('Aucun contenu', 'comptoir-auguste'),
		'text'  => __('Aucun résultat pour le moment.', 'comptoir-auguste'),
	]); ?>
<?php endif; ?>
<?php
get_footer();
