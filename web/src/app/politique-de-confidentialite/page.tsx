import type { Metadata } from "next";
import { PageHero } from "@/components/PageHero";

export const metadata: Metadata = {
  title: "Politique de confidentialité",
};

export default function PolitiqueConfidentialitePage() {
  return (
    <>
      <PageHero
        title="Politique de confidentialité"
        text="Contenu RGPD à compléter."
      />
      <div className="container section container--narrow">
        <p>
          Cette page est un placeholder. La politique de confidentialité définitive
          sera ajoutée avant la mise en ligne.
        </p>
      </div>
    </>
  );
}
