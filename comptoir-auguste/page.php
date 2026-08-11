<?php
/**
 * Default page template.
 *
 * @package Comptoir_Auguste
 */

get_header();
?>
<?php while (have_posts()) : ?>
	<?php the_post(); ?>
	<?php get_template_part('template-parts/components/page', 'hero', [
		'title' => get_the_title(),
	]); ?>
	<div class="container section container--narrow">
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>
<?php
get_footer();
