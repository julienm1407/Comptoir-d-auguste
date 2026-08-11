<?php
/**
 * Static demo data (mirrors Next.js /src/data).
 * Content stays static in v1 — CMS fields come later.
 *
 * @package Comptoir_Auguste
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function ca_badge_labels(): array
{
    return [
        'du-jour'   => 'Du jour',
        'de-saison' => 'De saison',
        'nouveau'   => 'Nouveau',
        'signature' => 'Signature',
    ];
}

function ca_categories(): array
{
    return [
        [
            'slug'        => 'viandes',
            'name'        => 'Viandes',
            'description' => 'Plats généreux, cuisinés maison.',
            'mosaic'      => 'viande-fleur.png',
        ],
        [
            'slug'        => 'poissons',
            'name'        => 'Poissons',
            'description' => 'Saveurs méditerranéennes, fraîcheur du jour.',
            'mosaic'      => 'poisson-fleur.png',
        ],
        [
            'slug'        => 'vegetarien',
            'name'        => 'Végétarien',
            'description' => 'Légumes de saison, généreux et gourmands.',
            'mosaic'      => 'vegetarien-fleur.png',
        ],
        [
            'slug'        => 'epices',
            'name'        => 'Épicés',
            'description' => 'Du caractère, sans en faire trop.',
            'mosaic'      => 'epicee-fleur.png',
        ],
        [
            'slug'        => 'vegan',
            'name'        => 'Vegan',
            'description' => 'Entièrement végétal, fait maison.',
            'mosaic'      => 'vegan-fleur.png',
        ],
    ];
}

function ca_products(): array
{
    return [
        [
            'slug'         => 'poulet-roti-maison',
            'name'         => 'Poulet rôti — démo',
            'description'  => 'Exemple viande. Photo libre de droit, à remplacer.',
            'price'        => 15.9,
            'categorySlug' => 'viandes',
            'image'        => 'https://images.unsplash.com/photo-1598103442097-8b74394b95c6?auto=format&fit=crop&w=900&q=80',
            'badge'        => 'signature',
            'featured'     => true,
        ],
        [
            'slug'         => 'boeuf-mijote',
            'name'         => 'Bœuf mijoté — démo',
            'description'  => 'Cuisine généreuse. Données de démonstration.',
            'price'        => 16.5,
            'categorySlug' => 'viandes',
            'image'        => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=900&q=80',
            'badge'        => 'du-jour',
            'featured'     => true,
        ],
        [
            'slug'         => 'poisson-grille',
            'name'         => 'Poisson grillé — démo',
            'description'  => 'Exemple poisson. Photo libre de droit.',
            'price'        => 17.5,
            'categorySlug' => 'poissons',
            'image'        => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=900&q=80',
            'badge'        => 'de-saison',
            'featured'     => true,
        ],
        [
            'slug'         => 'bowl-mediterraneen',
            'name'         => 'Bowl méditerranéen — démo',
            'description'  => 'Exemple végétarien. À remplacer par la vraie carte.',
            'price'        => 13.9,
            'categorySlug' => 'vegetarien',
            'image'        => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=900&q=80',
            'badge'        => 'nouveau',
            'featured'     => true,
        ],
        [
            'slug'         => 'plat-epice-maison',
            'name'         => 'Plat épicé — démo',
            'description'  => 'Exemple épicé. Contenu temporaire.',
            'price'        => 14.9,
            'categorySlug' => 'epices',
            'image'        => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=900&q=80',
            'badge'        => 'nouveau',
            'featured'     => false,
        ],
        [
            'slug'         => 'assiette-vegan',
            'name'         => 'Assiette vegan — démo',
            'description'  => 'Exemple vegan. Photo libre de droit.',
            'price'        => 13.5,
            'categorySlug' => 'vegan',
            'image'        => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=900&q=80',
            'badge'        => 'de-saison',
            'featured'     => true,
        ],
        [
            'slug'         => 'salade-fraicheur',
            'name'         => 'Salade fraîcheur — démo',
            'description'  => 'Végétarien. Données de démonstration.',
            'price'        => 11.9,
            'categorySlug' => 'vegetarien',
            'image'        => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=900&q=80',
            'badge'        => null,
            'featured'     => false,
        ],
        [
            'slug'         => 'filet-blanc',
            'name'         => 'Filet de poisson — démo',
            'description'  => 'Poisson. À mettre à jour avec la carte réelle.',
            'price'        => 16.9,
            'categorySlug' => 'poissons',
            'image'        => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=900&q=80',
            'badge'        => null,
            'featured'     => false,
        ],
    ];
}

function ca_featured_products(): array
{
    return array_values(array_filter(ca_products(), static fn(array $p): bool => !empty($p['featured'])));
}

function ca_restaurant(): array
{
    return [
        'name'      => 'Comptoir d’Auguste',
        'signature' => 'L’art de la cuisine maison',
        'address'   => 'Adresse du restaurant à confirmer',
        'phone'     => 'Téléphone à confirmer',
        'email'     => 'contact@comptoirdauguste.fr',
        'socials'   => [
            ['label' => 'Instagram', 'href' => '#'],
            ['label' => 'TikTok', 'href' => '#'],
            ['label' => 'Facebook', 'href' => '#'],
        ],
        'notes'     => 'Les informations pratiques ci-dessous sont des placeholders en attendant les données définitives.',
        'intro'     => 'Inspiré des saveurs de la Provence et de la Méditerranée, Comptoir d’Auguste vous invite à découvrir une cuisine généreuse, entièrement faite maison, élaborée chaque jour à partir de produits frais et de saison.',
        'menu'      => 'Plats du jour, salades, gourmandises salées, soupes, entrées et desserts… Notre carte évolue régulièrement au gré des saisons et de nos inspirations, afin de vous proposer des recettes toujours authentiques et gourmandes.',
        'closing'   => 'Sur place, à emporter ou en livraison, laissez-vous séduire par une cuisine sincère, conviviale et préparée avec passion.',
        'philosophy'=> 'Une cuisine sincère, conviviale et préparée avec passion.',
    ];
}

function ca_opening_hours(): array
{
    $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    $out = [];
    foreach ($days as $day) {
        $out[] = ['day' => $day, 'hours' => 'Horaires à confirmer'];
    }
    return $out;
}

function ca_delivery_options(): array
{
    return [
        [
            'label' => 'Livraison',
            'text'  => 'On vient à vous.',
            'href'  => ca_page_url('livraison'),
        ],
        [
            'label' => 'À emporter',
            'text'  => 'Vous commandez, on prépare.',
            'href'  => ca_page_url('a-emporter'),
        ],
        [
            'label' => 'Sur place',
            'text'  => 'Prenez le temps de vous installer.',
            'href'  => ca_order_url(),
        ],
    ];
}

function ca_delivery_steps(): array
{
    return [
        ['step' => 1, 'title' => 'Choisissez', 'text' => 'Parcourez la carte et laissez-vous guider.'],
        ['step' => 2, 'title' => 'Commandez', 'text' => 'Validez votre panier en quelques clics.'],
        ['step' => 3, 'title' => 'On prépare', 'text' => 'Chaque plat est fait maison, le jour même.'],
        ['step' => 4, 'title' => 'On vous livre', 'text' => 'Auguste vient à vous.'],
    ];
}

function ca_takeaway_steps(): array
{
    return [
        ['step' => 1, 'title' => 'Commandez', 'text' => 'Choisissez vos plats en ligne.'],
        ['step' => 2, 'title' => 'On prépare', 'text' => 'La cuisine s’occupe du reste.'],
        ['step' => 3, 'title' => 'Retirez', 'text' => 'Passez au comptoir à l’heure convenue.'],
    ];
}

function ca_reviews(): array
{
    return [
        [
            'author' => 'Avis placeholder',
            'rating' => 5,
            'text'   => 'Placeholder — les vrais avis clients seront affichés ici.',
            'placeholder' => true,
        ],
        [
            'author' => 'Avis placeholder',
            'rating' => 5,
            'text'   => 'Placeholder — intégration Google Reviews prévue.',
            'placeholder' => true,
        ],
        [
            'author' => 'Avis placeholder',
            'rating' => 5,
            'text'   => 'Placeholder — en attendant vos retours authentiques.',
            'placeholder' => true,
        ],
    ];
}

function ca_values(): array
{
    return [
        ['title' => 'Produits frais', 'text' => 'Élaborée chaque jour à partir de bons produits.'],
        ['title' => 'Fait maison', 'text' => 'Entièrement fait maison, préparé avec passion.'],
        ['title' => 'De saison', 'text' => 'Une carte qui suit les saisons et les arrivages.'],
        ['title' => 'Préparé chaque jour', 'text' => 'Des recettes authentiques, généreuses et gourmandes.'],
    ];
}

function ca_demo_articles(): array
{
    return [
        [
            'slug'        => 'les-plats-du-moment',
            'title'       => 'Les plats du moment',
            'excerpt'     => 'Notre carte évolue au gré des saisons et de nos inspirations. Voici ce qui se prépare en cuisine.',
            'content'     => 'Contenu de démonstration. Les actualités seront alimentées depuis WordPress.',
            'coverImage'  => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80',
            'publishedAt' => '2026-08-01',
            'category'    => 'Carte',
        ],
        [
            'slug'        => 'fait-maison-chaque-jour',
            'title'       => 'Fait maison, chaque jour',
            'excerpt'     => 'Derrière chaque plat, une envie de bien faire — avec des produits frais et de saison.',
            'content'     => 'Contenu de démonstration. Les coulisses et nouveautés seront publiées ici.',
            'coverImage'  => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1200&q=80',
            'publishedAt' => '2026-07-20',
            'category'    => 'Coulisses',
        ],
        [
            'slug'        => 'auguste-vient-a-vous',
            'title'       => 'Auguste vient à vous',
            'excerpt'     => 'Livraison et à emporter : on prépare, vous savourez. Les détails pratiques arrivent bientôt.',
            'content'     => 'Contenu de démonstration. Zones, horaires et modalités seront précisés.',
            'coverImage'  => ca_brand('scooter-mosaique.png'),
            'publishedAt' => '2026-07-05',
            'category'    => 'Services',
        ],
    ];
}

function ca_nav_links(): array
{
    return [
        ['label' => 'La carte', 'href' => ca_page_url('carte')],
        ['label' => 'Notre histoire', 'href' => ca_page_url('notre-histoire')],
        ['label' => 'Contact', 'href' => ca_page_url('contact')],
    ];
}

function ca_footer_nav(): array
{
    return [
        ['label' => 'La carte', 'href' => ca_page_url('carte')],
        ['label' => 'Notre histoire', 'href' => ca_page_url('notre-histoire')],
        ['label' => 'Actualités', 'href' => ca_page_url('actualites')],
        ['label' => 'Contact', 'href' => ca_page_url('contact')],
    ];
}

function ca_footer_order(): array
{
    return [
        ['label' => 'Commander', 'href' => ca_order_url()],
        ['label' => 'Livraison', 'href' => ca_page_url('livraison')],
        ['label' => 'À emporter', 'href' => ca_page_url('a-emporter')],
    ];
}

function ca_hero_slides(): array
{
    return [
        [
            'src' => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=1800&q=80',
            'alt' => 'Assiette fraîche de cuisine maison',
        ],
        [
            'src' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1800&q=80',
            'alt' => 'Plat généreux méditerranéen',
        ],
        [
            'src' => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=1800&q=80',
            'alt' => 'Poisson grillé maison',
        ],
        [
            'src' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1800&q=80',
            'alt' => 'Cuisine préparée avec passion',
        ],
    ];
}
