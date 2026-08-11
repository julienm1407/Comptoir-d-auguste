# Comptoir d’Auguste — thème WordPress

Thème classique installable (ZIP), conversion fidèle du frontend Next.js.
Contenu encore **statique** (étape 1) — champs administrables en étape 2.

## Installation

1. Compressez le dossier `comptoir-auguste` en ZIP (le ZIP doit contenir le dossier du thème à la racine).
2. WordPress → **Apparence → Thèmes → Ajouter → Téléverser un thème**.
3. Activez **Comptoir d’Auguste**.
4. À l’activation, le thème crée les pages (Accueil, Carte, Notre histoire, Contact, Livraison, À emporter, Actualités, Mentions, Politique) et définit la page d’accueil.

## Bouton « Commander » (Foxorder)

Par défaut, le thème pointe vers :

```php
define('CA_ORDER_URL', 'https://votre-restaurant.foxorder.fr');
```

Remplacez cette URL dans `functions.php` (ou redéfinissez-la dans `wp-config.php` avant le chargement du thème) par votre vraie URL Foxorder.

## Structure

- `style.css` — en-tête du thème
- `functions.php` + `inc/` — setup, assets, données statiques
- `front-page.php`, `page.php`, `single.php`, `404.php`
- `page-templates/` — templates des pages du site
- `template-parts/` — sections & composants
- `assets/` — CSS, JS, polices, images de marque

## Non inclus (volontairement)

- WooCommerce
- WordPress headless
- Connexion Foxorder / paiement
- Contenu administrable (ACF / options) — étape 2
