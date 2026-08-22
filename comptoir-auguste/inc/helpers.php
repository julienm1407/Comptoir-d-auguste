<?php
/**
 * Theme helpers.
 *
 * @package Comptoir_Auguste
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * CSS module class helper: ca_class('Hero', 'hero', 'content') => "ca-Hero-hero ca-Hero-content"
 */
function ca_class(string $component, string ...$names): string
{
    $classes = [];
    foreach ($names as $name) {
        $classes[] = 'ca-' . $component . '-' . $name;
    }
    return implode(' ', $classes);
}

/**
 * Theme asset URI.
 */
function ca_asset(string $relative): string
{
    return trailingslashit(CA_THEME_URI) . ltrim($relative, '/');
}

/**
 * Brand image URI (assets/images/brand/...).
 */
function ca_brand(string $path): string
{
    return ca_asset('assets/images/brand/' . ltrim($path, '/'));
}

/**
 * Order / Commander URL (Foxorder or current fallback).
 */
function ca_order_url(): string
{
    $url = CA_ORDER_URL;

    // Relative paths stay relative to site home.
    if (str_starts_with($url, '/') && !str_starts_with($url, '//')) {
        $url = home_url($url);
    }

    return (string) apply_filters('ca_order_url', $url);
}

/**
 * Uber Eats store URL.
 */
function ca_uber_eats_url(): string
{
    return (string) apply_filters('ca_uber_eats_url', CA_UBER_EATS_URL);
}

/**
 * Internal page URL by slug (falls back to home + slug).
 */
function ca_page_url(string $slug): string
{
    $page = get_page_by_path($slug);
    if ($page instanceof WP_Post) {
        return get_permalink($page) ?: home_url('/' . $slug . '/');
    }
    return home_url('/' . trim($slug, '/') . '/');
}

/**
 * Format price EUR fr-FR.
 */
function ca_format_price(float $price): string
{
    if (class_exists('NumberFormatter')) {
        $fmt = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);
        return $fmt->formatCurrency($price, 'EUR') ?: number_format($price, 2, ',', ' ') . ' €';
    }
    return number_format($price, 2, ',', ' ') . ' €';
}

/**
 * Format date fr-FR (long).
 */
function ca_format_date(string $ymd): string
{
    $ts = strtotime($ymd);
    if ($ts === false) {
        return $ymd;
    }
    if (class_exists('IntlDateFormatter')) {
        $fmt = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            wp_timezone_string() ?: 'Europe/Paris',
            IntlDateFormatter::GREGORIAN
        );
        $out = $fmt->format($ts);
        if (is_string($out) && $out !== '') {
            return $out;
        }
    }
    return date_i18n('j F Y', $ts);
}

/**
 * Escape and echo attribute.
 */
function ca_attr(string $value): void
{
    echo esc_attr($value);
}
