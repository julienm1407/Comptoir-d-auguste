<?php
/**
 * Hero carousel.
 *
 * @package Comptoir_Auguste
 */

$slides    = ca_hero_slides();
$spotlight = ca_featured_products()[0] ?? null;
?>
<section class="<?php echo esc_attr(ca_class('Hero', 'hero')); ?>" aria-labelledby="hero-title" data-ca-hero>
	<div class="<?php echo esc_attr(ca_class('Hero', 'carousel')); ?>" aria-hidden="true">
		<?php foreach ($slides as $i => $slide) : ?>
			<div
				class="<?php echo esc_attr(ca_class('Hero', 'slide') . ($i === 0 ? ' ' . ca_class('Hero', 'slideActive') : '')); ?>"
				data-ca-slide
			>
				<img
					class="<?php echo esc_attr(ca_class('Hero', 'slideImage')); ?>"
					src="<?php echo esc_url($slide['src']); ?>"
					alt=""
					<?php echo $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"'; ?>
					width="1800"
					height="1200"
				>
			</div>
		<?php endforeach; ?>
		<div class="<?php echo esc_attr(ca_class('Hero', 'shade')); ?>"></div>
	</div>

	<div class="<?php echo esc_attr(ca_class('Hero', 'stage')); ?>">
		<div class="<?php echo esc_attr(ca_class('Hero', 'content')); ?>">
			<div class="<?php echo esc_attr(ca_class('Hero', 'brandRow')); ?>">
				<div class="<?php echo esc_attr(ca_class('Hero', 'brandLogoWrap')); ?>">
					<img
						class="<?php echo esc_attr(ca_class('Hero', 'brandLogo')); ?>"
						src="<?php echo esc_url(ca_brand('logo-carousel.gif')); ?>"
						alt=""
						width="180"
						height="180"
					>
				</div>
				<p class="<?php echo esc_attr(ca_class('Hero', 'brandName')); ?>">
					<?php esc_html_e('Comptoir d’Auguste', 'comptoir-auguste'); ?>
				</p>
			</div>
			<h1 id="hero-title" class="<?php echo esc_attr(ca_class('Hero', 'title')); ?>">
				<?php esc_html_e('L’art de la cuisine maison.', 'comptoir-auguste'); ?>
			</h1>
			<p class="<?php echo esc_attr(ca_class('Hero', 'text')); ?>">
				<?php esc_html_e('Inspiré des saveurs de la Provence et de la Méditerranée — une cuisine généreuse, entièrement faite maison.', 'comptoir-auguste'); ?>
			</p>
			<a class="<?php echo esc_attr(ca_class('Button', 'button', 'primary', 'lg') . ' ' . ca_class('Hero', 'cta')); ?>" href="<?php echo esc_url(ca_order_url()); ?>">
				<?php esc_html_e('Commander', 'comptoir-auguste'); ?>
			</a>
		</div>

		<?php if ($spotlight) : ?>
			<aside class="<?php echo esc_attr(ca_class('Hero', 'spotlight')); ?>" aria-labelledby="spotlight-title">
				<a class="<?php echo esc_attr(ca_class('Hero', 'spotlightCard')); ?>" href="<?php echo esc_url(ca_page_url('carte')); ?>">
					<p id="spotlight-title" class="<?php echo esc_attr(ca_class('Hero', 'spotlightLabel')); ?>">
						<?php esc_html_e('À l’affiche', 'comptoir-auguste'); ?>
					</p>
					<div class="<?php echo esc_attr(ca_class('Hero', 'spotlightMedia')); ?>">
						<img
							class="<?php echo esc_attr(ca_class('Hero', 'spotlightImage')); ?>"
							src="<?php echo esc_url($spotlight['image']); ?>"
							alt="<?php echo esc_attr($spotlight['name']); ?>"
							loading="lazy"
							width="400"
							height="300"
						>
					</div>
					<div class="<?php echo esc_attr(ca_class('Hero', 'spotlightBody')); ?>">
						<h2 class="<?php echo esc_attr(ca_class('Hero', 'spotlightName')); ?>"><?php echo esc_html($spotlight['name']); ?></h2>
					</div>
				</a>
			</aside>
		<?php endif; ?>
	</div>

	<div class="<?php echo esc_attr(ca_class('Hero', 'controls')); ?>">
		<div class="<?php echo esc_attr(ca_class('Hero', 'dots')); ?>" role="tablist" aria-label="<?php esc_attr_e('Diapositives', 'comptoir-auguste'); ?>">
			<?php foreach ($slides as $i => $slide) : ?>
				<button
					type="button"
					role="tab"
					aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
					aria-label="<?php echo esc_attr(sprintf(/* translators: %d slide number */ __('Image %d', 'comptoir-auguste'), $i + 1)); ?>"
					class="<?php echo esc_attr(ca_class('Hero', 'dot') . ($i === 0 ? ' ' . ca_class('Hero', 'dotActive') : '')); ?>"
					data-ca-dot
				></button>
			<?php endforeach; ?>
		</div>
		<div class="<?php echo esc_attr(ca_class('Hero', 'arrows')); ?>">
			<button type="button" class="<?php echo esc_attr(ca_class('Hero', 'arrow')); ?>" aria-label="<?php esc_attr_e('Image précédente', 'comptoir-auguste'); ?>" data-ca-prev>←</button>
			<button type="button" class="<?php echo esc_attr(ca_class('Hero', 'arrow')); ?>" aria-label="<?php esc_attr_e('Image suivante', 'comptoir-auguste'); ?>" data-ca-next>→</button>
		</div>
	</div>
</section>
