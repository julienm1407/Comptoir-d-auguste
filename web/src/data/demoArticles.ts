import type { Article } from "@/types";

/**
 * DEMO DATA — replace with WordPress Posts.
 */
export const demoArticles: Article[] = [
  {
    id: "art-1",
    slug: "les-plats-du-moment",
    title: "Les plats du moment",
    excerpt:
      "Notre carte évolue au gré des saisons et de nos inspirations. Voici ce qui se prépare en cuisine.",
    content:
      "Contenu de démonstration. Les actualités seront alimentées depuis WordPress.",
    coverImage:
      "https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80",
    publishedAt: "2026-08-01",
    category: "Carte",
  },
  {
    id: "art-2",
    slug: "fait-maison-chaque-jour",
    title: "Fait maison, chaque jour",
    excerpt:
      "Derrière chaque plat, une envie de bien faire — avec des produits frais et de saison.",
    content:
      "Contenu de démonstration. Les coulisses et nouveautés seront publiées ici.",
    coverImage:
      "https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1200&q=80",
    publishedAt: "2026-07-20",
    category: "Coulisses",
  },
  {
    id: "art-3",
    slug: "auguste-vient-a-vous",
    title: "Auguste vient à vous",
    excerpt:
      "Livraison et à emporter : on prépare, vous savourez. Les détails pratiques arrivent bientôt.",
    content:
      "Contenu de démonstration. Zones, horaires et modalités seront précisés.",
    coverImage: "/brand/scooter-mosaique.png",
    publishedAt: "2026-07-05",
    category: "Services",
  },
];

export function getArticleBySlug(slug: string) {
  return demoArticles.find((article) => article.slug === slug);
}
