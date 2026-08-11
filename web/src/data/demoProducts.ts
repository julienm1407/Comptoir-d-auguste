import type { Category, Product } from "@/types";

/**
 * DEMO DATA — replace with WooCommerce.
 * Category mosaics = brand assets.
 * Product images = free Unsplash food photos (temporary).
 */

export const demoCategories: Category[] = [
  {
    id: "cat-viandes",
    slug: "viandes",
    name: "Viandes",
    description: "Plats généreux, cuisinés maison.",
    mosaic: "/brand/viande-fleur.png",
  },
  {
    id: "cat-poissons",
    slug: "poissons",
    name: "Poissons",
    description: "Saveurs méditerranéennes, fraîcheur du jour.",
    mosaic: "/brand/poisson-fleur.png",
  },
  {
    id: "cat-vegetarien",
    slug: "vegetarien",
    name: "Végétarien",
    description: "Légumes de saison, généreux et gourmands.",
    mosaic: "/brand/vegetarien-fleur.png",
  },
  {
    id: "cat-epices",
    slug: "epices",
    name: "Épicés",
    description: "Du caractère, sans en faire trop.",
    mosaic: "/brand/epicee-fleur.png",
  },
  {
    id: "cat-vegan",
    slug: "vegan",
    name: "Vegan",
    description: "Entièrement végétal, fait maison.",
    mosaic: "/brand/vegan-fleur.png",
  },
];

export const demoProducts: Product[] = [
  {
    id: "prod-1",
    slug: "poulet-roti-maison",
    name: "Poulet rôti — démo",
    description: "Exemple viande. Photo libre de droit, à remplacer.",
    price: 15.9,
    categorySlug: "viandes",
    image:
      "https://images.unsplash.com/photo-1598103442097-8b74394b95c6?auto=format&fit=crop&w=900&q=80",
    badge: "signature",
    featured: true,
  },
  {
    id: "prod-2",
    slug: "boeuf-mijote",
    name: "Bœuf mijoté — démo",
    description: "Cuisine généreuse. Données de démonstration.",
    price: 16.5,
    categorySlug: "viandes",
    image:
      "https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=900&q=80",
    badge: "du-jour",
    featured: true,
  },
  {
    id: "prod-3",
    slug: "poisson-grille",
    name: "Poisson grillé — démo",
    description: "Exemple poisson. Photo libre de droit.",
    price: 17.5,
    categorySlug: "poissons",
    image:
      "https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=900&q=80",
    badge: "de-saison",
    featured: true,
  },
  {
    id: "prod-4",
    slug: "bowl-mediterraneen",
    name: "Bowl méditerranéen — démo",
    description: "Exemple végétarien. À remplacer par la vraie carte.",
    price: 13.9,
    categorySlug: "vegetarien",
    image:
      "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=900&q=80",
    badge: "nouveau",
    featured: true,
  },
  {
    id: "prod-5",
    slug: "plat-epice-maison",
    name: "Plat épicé — démo",
    description: "Exemple épicé. Contenu temporaire.",
    price: 14.9,
    categorySlug: "epices",
    image:
      "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=900&q=80",
    badge: "nouveau",
  },
  {
    id: "prod-6",
    slug: "assiette-vegan",
    name: "Assiette vegan — démo",
    description: "Exemple vegan. Photo libre de droit.",
    price: 13.5,
    categorySlug: "vegan",
    image:
      "https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=900&q=80",
    badge: "de-saison",
    featured: true,
  },
  {
    id: "prod-7",
    slug: "salade-fraicheur",
    name: "Salade fraîcheur — démo",
    description: "Végétarien. Données de démonstration.",
    price: 11.9,
    categorySlug: "vegetarien",
    image:
      "https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=900&q=80",
  },
  {
    id: "prod-8",
    slug: "filet-blanc",
    name: "Filet de poisson — démo",
    description: "Poisson. À mettre à jour avec la carte réelle.",
    price: 16.9,
    categorySlug: "poissons",
    image:
      "https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=900&q=80",
  },
];

export const featuredProducts = demoProducts.filter((p) => p.featured);

export const dailySpecials = demoProducts.filter(
  (p) => p.badge === "du-jour" || p.badge === "de-saison" || p.featured,
);
