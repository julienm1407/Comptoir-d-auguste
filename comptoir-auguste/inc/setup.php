<?php
/**
 * Theme setup.
 *
 * @package Comptoir_Auguste
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', static function (): void {
    load_theme_textdomain('comptoir-auguste', CA_THEME_DIR . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    register_nav_menus([
        'primary' => __('Menu principal', 'comptoir-auguste'),
        'footer'  => __('Menu footer', 'comptoir-auguste'),
    ]);
});

/**
 * Create static pages + assign templates on theme activation.
 */
add_action('after_switch_theme', static function (): void {
    $pages = [
        [
            'title'    => 'Accueil',
            'slug'     => 'accueil',
            'template' => '',
            'front'    => true,
        ],
        [
            'title'    => 'La carte',
            'slug'     => 'carte',
            'template' => 'page-templates/page-carte.php',
        ],
        [
            'title'    => 'Notre histoire',
            'slug'     => 'notre-histoire',
            'template' => 'page-templates/page-notre-histoire.php',
        ],
        [
            'title'    => 'Contact',
            'slug'     => 'contact',
            'template' => 'page-templates/page-contact.php',
        ],
        [
            'title'    => 'Livraison',
            'slug'     => 'livraison',
            'template' => 'page-templates/page-livraison.php',
        ],
        [
            'title'    => 'À emporter',
            'slug'     => 'a-emporter',
            'template' => 'page-templates/page-a-emporter.php',
        ],
        [
            'title'    => 'Actualités',
            'slug'     => 'actualites',
            'template' => 'page-templates/page-actualites.php',
        ],
        [
            'title'    => 'Mentions légales',
            'slug'     => 'mentions-legales',
            'template' => 'page-templates/page-mentions-legales.php',
        ],
        [
            'title'    => 'Politique de confidentialité',
            'slug'     => 'politique-de-confidentialite',
            'template' => 'page-templates/page-politique.php',
        ],
    ];

    $front_id = 0;

    foreach ($pages as $page) {
        $existing = get_page_by_path($page['slug']);
        if ($existing instanceof WP_Post) {
            $id = (int) $existing->ID;
        } else {
            $id = (int) wp_insert_post([
                'post_title'   => $page['title'],
                'post_name'    => $page['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ]);
        }

        if ($id > 0 && !empty($page['template'])) {
            update_post_meta($id, '_wp_page_template', $page['template']);
        }

        if (!empty($page['front'])) {
            $front_id = $id;
        }
    }

    if ($front_id > 0) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_id);
    }

    // Seed demo posts for Actualités if none exist.
    $existing_posts = get_posts([
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'post_status'    => 'any',
        'fields'         => 'ids',
    ]);

    if (empty($existing_posts)) {
        $articles = ca_demo_articles();
        foreach ($articles as $article) {
            $post_id = (int) wp_insert_post([
                'post_title'   => $article['title'],
                'post_name'    => $article['slug'],
                'post_excerpt' => $article['excerpt'],
                'post_content' => $article['content'],
                'post_status'  => 'publish',
                'post_type'    => 'post',
                'post_date'    => $article['publishedAt'] . ' 10:00:00',
            ]);
            if ($post_id > 0) {
                update_post_meta($post_id, '_ca_cover_url', $article['coverImage']);
                update_post_meta($post_id, '_ca_category_label', $article['category']);
            }
        }
    }

    flush_rewrite_rules();
});
