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
