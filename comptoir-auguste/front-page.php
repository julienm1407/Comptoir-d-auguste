<?php
/**
 * Front page template.
 *
 * @package Comptoir_Auguste
 */

get_header();
?>
<?php get_template_part('template-parts/sections/hero'); ?>
<?php get_template_part('template-parts/sections/order', 'modes'); ?>
<?php get_template_part('template-parts/sections/menu', 'preview'); ?>
<?php get_template_part('template-parts/sections/featured', 'dishes'); ?>
<?php get_template_part('template-parts/sections/brand', 'dna'); ?>
<?php get_template_part('template-parts/sections/reviews'); ?>
<?php get_template_part('template-parts/sections/delivery', 'home'); ?>
<div class="container section--tight">
	<?php get_template_part('template-parts/components/order', 'cta', ['tone' => 'blue']); ?>
</div>
<?php get_template_part('template-parts/sections/location'); ?>
<?php
get_footer();
