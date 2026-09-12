import type { Metadata } from "next";
import { deliverySteps } from "@/data/demoContent";
import { PageHero } from "@/components/PageHero";
import { UberEatsButton } from "@/components/UberEatsButton";
import { DeliverooButton } from "@/components/DeliverooButton";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Livraison",
  description:
    "Commandez en livraison via Uber Eats ou Deliveroo — la livraison directe arrive bientôt.",
};

export default function LivraisonPage() {
  return (
    <>
      <PageHero
        title="Livraison"
        text="Pour l’instant, Auguste livre via Uber Eats et Deliveroo. La livraison directe reviendra bientôt."
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
              <span>Uber Eats ou Deliveroo (livraison directe bientôt)</span>
            </li>
            <li>
              <strong>Zones</strong>
              <span>Selon la plateforme choisie</span>
            </li>
            <li>
              <strong>Horaires</strong>
              <span>Selon la plateforme choisie</span>
            </li>
            <li>
              <strong>Frais de livraison</strong>
              <span>Selon la plateforme choisie</span>
            </li>
          </ul>
          <p className={styles.note}>
            Commandez via Uber Eats ou Deliveroo — la livraison directe du
            comptoir sera de retour bientôt.
          </p>
          <div className={styles.actions}>
            <UberEatsButton fullWidth />
            <DeliverooButton fullWidth />
          </div>
        </aside>
      </div>
    </>
  );
}
