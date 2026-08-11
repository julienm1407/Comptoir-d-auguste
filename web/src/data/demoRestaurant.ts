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
    street: "2459 Avenue Pierre-Auguste Renoir",
    postalCode: "83500",
    city: "La Seyne-sur-Mer",
    full: "2459 Avenue Pierre-Auguste Renoir, 83500 La Seyne-sur-Mer",
  },
  phone: "Téléphone à confirmer",
  email: "contact@comptoirdauguste.fr",
  socials: [
    { label: "Instagram", href: "#" },
    { label: "TikTok", href: "#" },
    { label: "Facebook", href: "#" },
  ],
  mapEmbedUrl:
    "https://www.google.com/maps?q=2459+Avenue+Pierre-Auguste+Renoir,+83500+La+Seyne-sur-Mer&output=embed",
  mapLink:
    "https://www.google.com/maps/search/?api=1&query=2459+Avenue+Pierre-Auguste+Renoir+83500+La+Seyne-sur-Mer",
  notes: [],
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
