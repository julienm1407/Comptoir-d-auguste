<?php
/**
 * 404 template.
 *
 * @package Comptoir_Auguste
 */

get_header();
?>
<?php get_template_part('template-parts/components/page', 'hero', [
	'title' => __('Page introuvable', 'comptoir-auguste'),
	'text'  => __('Cette page n’existe pas ou a été déplacée.', 'comptoir-auguste'),
]); ?>
<div class="container section container--narrow" style="text-align:center">
	<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg')); ?>" href="<?php echo esc_url(home_url('/')); ?>">
		<?php esc_html_e('Retour à l’accueil', 'comptoir-auguste'); ?>
	</a>
</div>
<?php
get_footer();
