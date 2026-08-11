export function formatPrice(price: number): string {
  return new Intl.NumberFormat("fr-FR", {
    style: "currency",
    currency: "EUR",
  }).format(price);
}

export function formatDate(date: string): string {
  return new Intl.DateTimeFormat("fr-FR", {
    day: "numeric",
    month: "long",
    year: "numeric",
  }).format(new Date(date));
}

export const badgeLabels: Record<string, string> = {
  "du-jour": "Du jour",
  "de-saison": "De saison",
  nouveau: "Nouveau",
  signature: "Signature",
};
