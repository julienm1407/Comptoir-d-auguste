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
        'phone'        => '04 83 73 95 34',
        'email'        => 'contact@comptoirdauguste.fr',
        'mapEmbedUrl'  => 'https://www.google.com/maps?q=2459+Avenue+Pierre-Auguste+Renoir,+83500+La+Seyne-sur-Mer&output=embed',
        'mapLink'      => 'https://www.google.com/maps/search/?api=1&query=2459+Avenue+Pierre-Auguste+Renoir+83500+La+Seyne-sur-Mer',
        'socials'      => [
            ['label' => 'Instagram', 'href' => 'https://www.instagram.com/comptoirdauguste/'],
            ['label' => 'TikTok', 'href' => 'https://www.tiktok.com/@comptoir.dauguste'],
            ['label' => 'Facebook', 'href' => 'https://www.facebook.com/profile.php?id=61593331573704'],
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
        ['day' => 'Lundi', 'hours' => '8h00 – 14h30 / 18h00 – 20h45'],
        ['day' => 'Mardi', 'hours' => '8h00 – 14h30 / 18h00 – 20h45'],
        ['day' => 'Mercredi', 'hours' => '8h00 – 14h30 / 18h00 – 20h45'],
        ['day' => 'Jeudi', 'hours' => '8h00 – 14h30 / 18h00 – 20h45'],
        ['day' => 'Vendredi', 'hours' => '8h00 – 14h30 / 18h00 – 20h45'],
        ['day' => 'Samedi', 'hours' => '9h00 – 13h00'],
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
        ['day' => 'Samedi', 'hours' => '9h00 – 13h00'],
        ['day' => 'Dimanche', 'hours' => 'Fermé'],
    ];
}

function ca_delivery_options(): array
{
    return [
        [
            'label' => 'Livraison',
            'text'  => 'Uber Eats & Deliveroo',
            'href'  => '',
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
        // Livraison propre en standby — réactiver lien vers ca_page_url('livraison')
        ['label' => 'À emporter', 'href' => ca_page_url('a-emporter')],
    ];
}

function ca_hero_slides(): array
{
    return [
        [
            'src' => ca_brand('devanture.jpg'),
            'alt' => 'Devanture du Comptoir d’Auguste à La Seyne-sur-Mer',
        ],
        [
            'src' => ca_brand('dishes/encornets-farcis.jpg'),
            'alt' => 'Encornets farcis à la provençale',
        ],
        [
            'src' => ca_brand('dishes/couscous-poulet.jpg'),
            'alt' => 'Couscous au poulet et ses légumes',
        ],
        [
            'src' => ca_brand('dishes/salade-mediterraneenne-v2.jpg'),
            'alt' => 'Salade Méditerranéenne — thon, œuf et légumes',
        ],
        [
            'src' => ca_brand('dishes/salade-auguste-v2.jpg'),
            'alt' => 'Salade L’Auguste — poulpe et pommes de terre',
        ],
    ];
}
