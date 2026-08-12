export type ProductBadge = "du-jour" | "de-saison" | "nouveau" | "signature";

export type CategorySlug =
  | "formules"
  | "entrees"
  | "plats-du-moment"
  | "salades"
  | "snacking"
  | "desserts"
  | "boissons"
  | "boissons-chaudes";

export interface Category {
  id: string;
  slug: CategorySlug;
  name: string;
  description: string;
  mosaic: string;
  showOnHome?: boolean;
}

export interface Product {
  id: string;
  slug: string;
  name: string;
  description: string;
  price: number;
  categorySlug: CategorySlug;
  /** Sous-famille (ex. Sodas, Bières) pour regrouper dans la carte */
  family?: string;
  image: string;
  badge?: ProductBadge;
  featured?: boolean;
  available?: boolean;
  allergens?: string[];
}

export interface Article {
  id: string;
  slug: string;
  title: string;
  excerpt: string;
  content: string;
  coverImage: string;
  publishedAt: string;
  category: string;
}

export interface Review {
  id: string;
  author: string;
  rating: number;
  text: string;
  date: string;
  source: "placeholder" | "google";
  isPlaceholder: boolean;
}

export interface OpeningHour {
  day: string;
  hours: string;
  closed?: boolean;
}

export interface DeliveryOption {
  id: string;
  label: string;
  shortDescription: string;
  href: string;
  icon: "delivery" | "takeaway" | "dine-in";
}

export interface SocialLink {
  label: string;
  href: string;
}

export interface RestaurantInfo {
  name: string;
  signature: string;
  positioning: string;
  address: {
    street: string;
    postalCode: string;
    city: string;
    full: string;
  };
  phone: string;
  email: string;
  socials: SocialLink[];
  mapEmbedUrl: string;
  mapLink: string;
  notes: string[];
}
