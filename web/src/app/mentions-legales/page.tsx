import type { Metadata } from "next";
import { PageHero } from "@/components/PageHero";

export const metadata: Metadata = {
  title: "Mentions légales",
};

export default function MentionsLegalesPage() {
  return (
    <>
      <PageHero title="Mentions légales" text="Contenu juridique à compléter." />
      <div className="container section container--narrow">
        <p>
          Cette page est un placeholder. Les mentions légales définitives seront
          ajoutées avant la mise en ligne.
        </p>
      </div>
    </>
  );
}
