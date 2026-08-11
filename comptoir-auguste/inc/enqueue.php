<?php
/**
 * Enqueue styles and scripts.
 *
 * @package Comptoir_Auguste
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', static function (): void {
    wp_enqueue_style(
        'ca-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'ca-theme',
        ca_asset('assets/css/theme.css'),
        ['ca-google-fonts'],
        CA_THEME_VERSION
    );

    // style.css is required by WP but kept minimal; main design is theme.css
    wp_enqueue_style(
        'ca-style',
        get_stylesheet_uri(),
        ['ca-theme'],
        CA_THEME_VERSION
    );

    wp_enqueue_script(
        'ca-theme',
        ca_asset('assets/js/theme.js'),
        [],
        CA_THEME_VERSION,
        true
    );

    wp_localize_script('ca-theme', 'caTheme', [
        'orderUrl' => ca_order_url(),
        'homeUrl'  => home_url('/'),
    ]);
});
