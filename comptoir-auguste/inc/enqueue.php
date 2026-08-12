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
    $theme_css = CA_THEME_DIR . '/assets/css/theme.css';
    $theme_js  = CA_THEME_DIR . '/assets/js/theme.js';
    $ver_css   = CA_THEME_VERSION . '.' . (is_readable($theme_css) ? (string) filemtime($theme_css) : '0');
    $ver_js    = CA_THEME_VERSION . '.' . (is_readable($theme_js) ? (string) filemtime($theme_js) : '0');

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
        $ver_css
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
        $ver_js,
        true
    );

    wp_localize_script('ca-theme', 'caTheme', [
        'orderUrl' => ca_order_url(),
        'homeUrl'  => home_url('/'),
        'version'  => CA_THEME_VERSION,
    ]);
});
