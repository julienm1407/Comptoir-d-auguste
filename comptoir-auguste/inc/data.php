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

function ca_restaurant(): array
{
    return [
        'name'         => 'Comptoir d’Auguste',
        'signature'    => 'L’art de la cuisine maison',
        'address'      => '2459 Avenue Pierre-Auguste Renoir, 83500 La Seyne-sur-Mer',
        'phone'        => 'Téléphone à confirmer',
        'email'        => 'contact@comptoirdauguste.fr',
        'mapEmbedUrl'  => 'https://www.google.com/maps?q=2459+Avenue+Pierre-Auguste+Renoir,+83500+La+Seyne-sur-Mer&output=embed',
        'mapLink'      => 'https://www.google.com/maps/search/?api=1&query=2459+Avenue+Pierre-Auguste+Renoir+83500+La+Seyne-sur-Mer',
        'socials'      => [
            ['label' => 'Instagram', 'href' => '#'],
            ['label' => 'TikTok', 'href' => '#'],
            ['label' => 'Facebook', 'href' => '#'],
        ],
        'notes'        => '',
        'intro'        => 'Inspiré des saveurs de la Provence et de la Méditerranée, Comptoir d’Auguste vous invite à découvrir une cuisine généreuse, entièrement faite maison, élaborée chaque jour à partir de produits frais et de saison.',
        'menu'         => 'Plats du jour, salades, gourmandises salées, soupes, entrées et desserts… Notre carte évolue régulièrement au gré des saisons et de nos inspirations, afin de vous proposer des recettes toujours authentiques et gourmandes.',
        'closing'      => 'Sur place, à emporter ou en livraison, laissez-vous séduire par une cuisine sincère, conviviale et préparée avec passion.',
        'philosophy'   => 'Une cuisine sincère, conviviale et préparée avec passion.',
    ];
}

function ca_opening_hours(): array
{
    return [
        ['day' => 'Lundi', 'hours' => '8h00 – 16h00'],
        ['day' => 'Mardi', 'hours' => '8h00 – 16h00'],
        ['day' => 'Mercredi', 'hours' => '8h00 – 16h00'],
        ['day' => 'Jeudi', 'hours' => '8h00 – 16h00'],
        ['day' => 'Vendredi', 'hours' => '8h00 – 16h00'],
        ['day' => 'Samedi', 'hours' => 'Fermé'],
        ['day' => 'Dimanche', 'hours' => 'Fermé'],
    ];
}

/** Horaires de retrait click & collect (différents du restaurant). */
function ca_takeaway_hours(): array
{
    return [
        ['day' => 'Lundi', 'hours' => '10h30 – 15h00'],
        ['day' => 'Mardi', 'hours' => '10h30 – 15h00'],
        ['day' => 'Mercredi', 'hours' => '10h30 – 15h00'],
        ['day' => 'Jeudi', 'hours' => '10h30 – 15h00'],
        ['day' => 'Vendredi', 'hours' => '10h30 – 15h00'],
        ['day' => 'Samedi', 'hours' => 'Fermé'],
        ['day' => 'Dimanche', 'hours' => 'Fermé'],
    ];
}

function ca_delivery_options(): array
{
    return [
        [
            'label' => 'Livraison',
            'text'  => 'Chez vous, ou via Uber Eats.',
            'href'  => ca_page_url('livraison'),
            'icon'  => 'delivery',
        ],
        [
            'label' => 'À emporter',
            'text'  => 'Vous commandez, on prépare.',
            'href'  => ca_page_url('a-emporter'),
            'icon'  => 'takeaway',
        ],
        [
            'label' => 'Sur place',
            'text'  => 'Prenez le temps de vous installer.',
            'href'  => '',
            'icon'  => 'dine-in',
        ],
    ];
}

function ca_delivery_steps(): array
{
    return [
        ['step' => 1, 'title' => 'Choisissez', 'text' => 'Parcourez la carte en ligne.'],
        ['step' => 2, 'title' => 'Commandez', 'text' => 'Validez en quelques clics.'],
        ['step' => 3, 'title' => 'On prépare', 'text' => 'Cuisine maison, le jour même.'],
        ['step' => 4, 'title' => 'Recevez', 'text' => 'Livré chez vous ou prêt au comptoir.'],
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
