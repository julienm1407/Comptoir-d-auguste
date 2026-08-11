/**
 * Order / WooCommerce URLs — replace with real WooCommerce endpoints.
 */
export const ORDER_URL = process.env.NEXT_PUBLIC_ORDER_URL ?? "/carte";
export const CART_URL = process.env.NEXT_PUBLIC_CART_URL ?? "#panier";
export const CHECKOUT_URL = process.env.NEXT_PUBLIC_CHECKOUT_URL ?? "#commande";

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
