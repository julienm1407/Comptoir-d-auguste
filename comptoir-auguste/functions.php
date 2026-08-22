<?php
/**
 * Comptoir d’Auguste — functions bootstrap.
 *
 * @package Comptoir_Auguste
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('CA_THEME_VERSION', '1.2.5');
define('CA_THEME_DIR', get_template_directory());
define('CA_THEME_URI', get_template_directory_uri());

/**
 * URL du bouton Commander.
 * Dans le projet Next.js : NEXT_PUBLIC_ORDER_URL (défaut /carte).
 * Remplacez par votre URL Foxorder complète si besoin, ex. :
 * define('CA_ORDER_URL', 'https://votre-restaurant.foxorder.fr');
 * avant l’inclusion, ou via le filtre `ca_order_url`.
 */
if (!defined('CA_ORDER_URL')) {
    define('CA_ORDER_URL', 'https://votre-restaurant.foxorder.fr');
}

if (!defined('CA_UBER_EATS_URL')) {
    define(
        'CA_UBER_EATS_URL',
        'https://www.ubereats.com/fr/store/comptoir-dauguste/O3N2_Ki-Tu27yNL3-ZqdUA?pl=JTdCJTIyYWRkcmVzcyUyMiUzQSUyMjIzMiUyMEF2LiUyMGRlJTIwbGElMjBKZXQlQzMlQTllJTIyJTJDJTIycmVmZXJlbmNlJTIyJTNBJTIyQ2hJSnJhU2VYc3NjeVJJUlhnRXVFNFJpakI0JTIyJTJDJTIycmVmZXJlbmNlVHlwZSUyMiUzQSUyMmdvb2dsZV9wbGFjZXMlMjIlMkMlMjJsYXRpdHVkZSUyMiUzQTQzLjA3NjM1ODclMkMlMjJsb25naXR1ZGUlMjIlM0E1Ljg5OTkyOTk5OTk5OTk5OTUlN0Q%3D'
    );
}

require_once CA_THEME_DIR . '/inc/helpers.php';
require_once CA_THEME_DIR . '/inc/menu-data.php';
require_once CA_THEME_DIR . '/inc/data.php';
require_once CA_THEME_DIR . '/inc/setup.php';
require_once CA_THEME_DIR . '/inc/enqueue.php';
