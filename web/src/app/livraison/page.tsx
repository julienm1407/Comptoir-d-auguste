import type { Metadata } from "next";
import { deliverySteps } from "@/data/demoContent";
import { PageHero } from "@/components/PageHero";
import { UberEatsButton } from "@/components/UberEatsButton";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Livraison",
  description:
    "Commandez en livraison via Uber Eats — la livraison directe arrive bientôt.",
};

export default function LivraisonPage() {
  return (
    <>
      <PageHero
        title="Livraison"
        text="Pour l’instant, Auguste livre via Uber Eats. La livraison directe reviendra bientôt."
      />

      <div className={`container section ${styles.page}`}>
        <ol className={styles.steps}>
          {deliverySteps.map((step) => (
            <li key={step.step}>
              <span>{step.step}</span>
              <div>
                <h2>{step.title}</h2>
                <p>{step.text}</p>
              </div>
            </li>
          ))}
        </ol>

        <aside className={styles.info}>
          <h2>Informations</h2>
          <ul>
            <li>
              <strong>Modes</strong>
              <span>Uber Eats (livraison directe bientôt)</span>
            </li>
            <li>
              <strong>Zones</strong>
              <span>Selon Uber Eats</span>
            </li>
            <li>
              <strong>Horaires</strong>
              <span>Selon Uber Eats</span>
            </li>
            <li>
              <strong>Frais de livraison</strong>
              <span>Selon Uber Eats</span>
            </li>
          </ul>
          <p className={styles.note}>
            Commandez via Uber Eats — la livraison directe du comptoir sera de
            retour bientôt.
          </p>
          <div className={styles.actions}>
            <UberEatsButton fullWidth />
          </div>
        </aside>
      </div>
    </>
  );
}
