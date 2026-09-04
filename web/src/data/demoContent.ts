import type { DeliveryOption, OpeningHour, Review } from "@/types";

/**
 * DEMO DATA — replace with Custom Fields / Options (WordPress).
 */
export const openingHours: OpeningHour[] = [
  { day: "Lundi", hours: "8h00 – 16h00" },
  { day: "Mardi", hours: "8h00 – 16h00" },
  { day: "Mercredi", hours: "8h00 – 16h00" },
  { day: "Jeudi", hours: "8h00 – 16h00" },
  { day: "Vendredi", hours: "8h00 – 16h00" },
  { day: "Samedi", hours: "", closed: true },
  { day: "Dimanche", hours: "", closed: true },
];

/** Horaires de retrait click & collect (différents du restaurant) */
export const takeawayHours: OpeningHour[] = [
  { day: "Lundi", hours: "10h30 – 15h00" },
  { day: "Mardi", hours: "10h30 – 15h00" },
  { day: "Mercredi", hours: "10h30 – 15h00" },
  { day: "Jeudi", hours: "10h30 – 15h00" },
  { day: "Vendredi", hours: "10h30 – 15h00" },
  { day: "Samedi", hours: "", closed: true },
  { day: "Dimanche", hours: "", closed: true },
];

export const deliveryOptions: DeliveryOption[] = [
  {
    id: "delivery",
    label: "Livraison",
    shortDescription: "On vient à vous.",
    href: "/livraison",
    icon: "delivery",
  },
  {
    id: "takeaway",
    label: "À emporter",
    shortDescription: "Vous commandez, on prépare.",
    href: "/a-emporter",
    icon: "takeaway",
  },
  {
    id: "dine-in",
    label: "Sur place",
    shortDescription: "Prenez le temps de vous installer.",
    icon: "dine-in",
  },
];

export const deliverySteps = [
  { step: 1, title: "Choisissez", text: "Parcourez la carte et laissez-vous guider." },
  { step: 2, title: "Commandez", text: "Validez votre panier en quelques clics." },
  { step: 3, title: "On prépare", text: "Chaque plat est fait maison, le jour même." },
  { step: 4, title: "On vous livre", text: "Auguste vient à vous." },
] as const;

export const takeawaySteps = [
  { step: 1, title: "Commandez", text: "Choisissez vos plats en ligne." },
  { step: 2, title: "On prépare", text: "La cuisine s’occupe du reste." },
  { step: 3, title: "Retirez", text: "Passez au comptoir à l’heure convenue." },
] as const;

/**
 * Placeholder reviews — clearly marked until Google Reviews integration.
 */
export const demoReviews: Review[] = [
  {
    id: "rev-1",
    author: "Avis placeholder",
    rating: 5,
    text: "Placeholder — les vrais avis clients seront affichés ici.",
    date: "2026-01-01",
    source: "placeholder",
    isPlaceholder: true,
  },
  {
    id: "rev-2",
    author: "Avis placeholder",
    rating: 5,
    text: "Placeholder — intégration Google Reviews prévue.",
    date: "2026-01-01",
    source: "placeholder",
    isPlaceholder: true,
  },
  {
    id: "rev-3",
    author: "Avis placeholder",
    rating: 5,
    text: "Placeholder — en attendant vos retours authentiques.",
    date: "2026-01-01",
    source: "placeholder",
    isPlaceholder: true,
  },
];

export const values = [
  {
    title: "Produits frais",
    text: "Élaborée chaque jour à partir de bons produits.",
  },
  {
    title: "Fait maison",
    text: "Entièrement fait maison, préparé avec passion.",
  },
  {
    title: "De saison",
    text: "Une carte qui suit les saisons et les arrivages.",
  },
  {
    title: "Préparé chaque jour",
    text: "Des recettes authentiques, généreuses et gourmandes.",
  },
] as const;
