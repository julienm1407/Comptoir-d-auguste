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

define('CA_THEME_VERSION', '1.0.0');
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

require_once CA_THEME_DIR . '/inc/helpers.php';
require_once CA_THEME_DIR . '/inc/data.php';
require_once CA_THEME_DIR . '/inc/setup.php';
require_once CA_THEME_DIR . '/inc/enqueue.php';
