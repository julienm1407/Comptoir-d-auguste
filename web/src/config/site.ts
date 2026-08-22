/**
 * Showcase site: browsing only. "Commander" redirects to Foxorder (external).
 * Set NEXT_PUBLIC_ORDER_URL in .env.local to the real Foxorder URL.
 */
export const ORDER_URL =
  process.env.NEXT_PUBLIC_ORDER_URL ?? "https://votre-restaurant.foxorder.fr";
export const CART_URL = process.env.NEXT_PUBLIC_CART_URL ?? ORDER_URL;
export const CHECKOUT_URL = process.env.NEXT_PUBLIC_CHECKOUT_URL ?? ORDER_URL;

/** Uber Eats (livraison alternative — en plus de la livraison directe) */
export const UBER_EATS_URL =
  process.env.NEXT_PUBLIC_UBER_EATS_URL ??
  "https://www.ubereats.com/fr/store/comptoir-dauguste/O3N2_Ki-Tu27yNL3-ZqdUA?pl=JTdCJTIyYWRkcmVzcyUyMiUzQSUyMjIzMiUyMEF2LiUyMGRlJTIwbGElMjBKZXQlQzMlQTllJTIyJTJDJTIycmVmZXJlbmNlJTIyJTNBJTIyQ2hJSnJhU2VYc3NjeVJJUlhnRXVFNFJpakI0JTIyJTJDJTIycmVmZXJlbmNlVHlwZSUyMiUzQSUyMmdvb2dsZV9wbGFjZXMlMjIlMkMlMjJsYXRpdHVkZSUyMiUzQTQzLjA3NjM1ODclMkMlMjJsb25naXR1ZGUlMjIlM0E1Ljg5OTkyOTk5OTk5OTk5OTUlN0Q%3D";

export const SITE_URL =
  process.env.NEXT_PUBLIC_SITE_URL ?? "https://comptoirdauguste.fr";

/** Navigation principale — volontairement courte */
export const NAV_LINKS = [
  { label: "La carte", href: "/carte" },
  { label: "Notre histoire", href: "/notre-histoire" },
  { label: "Contact", href: "/contact" },
] as const;

export const FOOTER_NAV = [
  { label: "La carte", href: "/carte" },
  { label: "Notre histoire", href: "/notre-histoire" },
  { label: "Actualités", href: "/actualites" },
  { label: "Contact", href: "/contact" },
] as const;

export const FOOTER_ORDER = [
  { label: "Commander", href: ORDER_URL },
  { label: "Livraison", href: "/livraison" },
  { label: "À emporter", href: "/a-emporter" },
] as const;
