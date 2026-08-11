import type { DeliveryOption, OpeningHour, Review } from "@/types";
import { ORDER_URL } from "@/config/site";

/**
 * DEMO DATA — replace with Custom Fields / Options (WordPress).
 */
export const openingHours: OpeningHour[] = [
  { day: "Lundi", hours: "Horaires à confirmer" },
  { day: "Mardi", hours: "Horaires à confirmer" },
  { day: "Mercredi", hours: "Horaires à confirmer" },
  { day: "Jeudi", hours: "Horaires à confirmer" },
  { day: "Vendredi", hours: "Horaires à confirmer" },
  { day: "Samedi", hours: "Horaires à confirmer" },
  { day: "Dimanche", hours: "Horaires à confirmer" },
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
    href: ORDER_URL,
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
