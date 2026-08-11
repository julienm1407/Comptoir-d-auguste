<?php
/**
 * Review card.
 *
 * @var array $args { review }
 * @package Comptoir_Auguste
 */

$review = $args['review'] ?? [];
if (empty($review)) {
    return;
}
$rating = (int) ($review['rating'] ?? 5);
$placeholder = !empty($review['placeholder']);
?>
<blockquote class="<?php echo esc_attr(ca_class('ReviewCard', 'card')); ?>"<?php echo $placeholder ? ' data-placeholder="true"' : ''; ?>>
	<div class="<?php echo esc_attr(ca_class('ReviewCard', 'stars')); ?>" aria-label="<?php echo esc_attr(sprintf(/* translators: %d rating */ __('%d sur 5', 'comptoir-auguste'), $rating)); ?>">
		<?php echo esc_html(str_repeat('★', max(0, $rating))); ?>
		<span class="<?php echo esc_attr(ca_class('ReviewCard', 'starsEmpty')); ?>"><?php echo esc_html(str_repeat('★', max(0, 5 - $rating))); ?></span>
	</div>
	<p class="<?php echo esc_attr(ca_class('ReviewCard', 'text')); ?>">« <?php echo esc_html($review['text'] ?? ''); ?> »</p>
	<footer class="<?php echo esc_attr(ca_class('ReviewCard', 'footer')); ?>">
		<cite class="<?php echo esc_attr(ca_class('ReviewCard', 'author')); ?>"><?php echo esc_html($review['author'] ?? ''); ?></cite>
		<?php if ($placeholder) : ?>
			<span class="<?php echo esc_attr(ca_class('ReviewCard', 'tag')); ?>"><?php esc_html_e('Placeholder', 'comptoir-auguste'); ?></span>
		<?php endif; ?>
	</footer>
</blockquote>
