import type { RestaurantInfo } from "@/types";

/**
 * DEMO DATA — replace with WordPress Options / ACF fields.
 * Do not present temporary values as definitive without confirmation.
 */
export const demoRestaurant: RestaurantInfo = {
  name: "Comptoir d’Auguste",
  signature: "L’art de la cuisine maison",
  positioning:
    "Inspiré des saveurs de la Provence et de la Méditerranée, Comptoir d’Auguste vous invite à découvrir une cuisine généreuse, entièrement faite maison, élaborée chaque jour à partir de produits frais et de saison.",
  address: {
    street: "Adresse à confirmer",
    postalCode: "",
    city: "À confirmer",
    full: "Adresse du restaurant à confirmer",
  },
  phone: "Téléphone à confirmer",
  email: "contact@comptoirdauguste.fr",
  socials: [
    { label: "Instagram", href: "#" },
    { label: "TikTok", href: "#" },
    { label: "Facebook", href: "#" },
  ],
  mapEmbedUrl: "",
  mapLink: "#",
  notes: [
    "Les informations pratiques ci-dessous sont des placeholders en attendant les données définitives.",
  ],
};

export const officialBrandCopy = {
  name: "Comptoir d’Auguste",
  signature: "L’art de la cuisine maison",
  intro:
    "Inspiré des saveurs de la Provence et de la Méditerranée, Comptoir d’Auguste vous invite à découvrir une cuisine généreuse, entièrement faite maison, élaborée chaque jour à partir de produits frais et de saison.",
  menu:
    "Plats du jour, salades, gourmandises salées, soupes, entrées et desserts… Notre carte évolue régulièrement au gré des saisons et de nos inspirations, afin de vous proposer des recettes toujours authentiques et gourmandes.",
  closing:
    "Sur place, à emporter ou en livraison, laissez-vous séduire par une cuisine sincère, conviviale et préparée avec passion.",
  philosophy: "Une cuisine sincère, conviviale et préparée avec passion.",
} as const;
