/**
 * Showcase site: browsing only. "Commander" redirects to Foxorder (external).
 * Set NEXT_PUBLIC_ORDER_URL in .env.local to the real Foxorder URL.
 */
export const ORDER_URL =
  process.env.NEXT_PUBLIC_ORDER_URL ?? "https://votre-restaurant.foxorder.fr";
export const CART_URL = process.env.NEXT_PUBLIC_CART_URL ?? ORDER_URL;
export const CHECKOUT_URL = process.env.NEXT_PUBLIC_CHECKOUT_URL ?? ORDER_URL;

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
