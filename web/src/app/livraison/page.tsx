import type { Metadata } from "next";
import { ORDER_URL } from "@/config/site";
import { deliverySteps } from "@/data/demoContent";
import { Button } from "@/components/Button";
import { PageHero } from "@/components/PageHero";
import { UberEatsButton } from "@/components/UberEatsButton";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Livraison",
  description:
    "Auguste vient à vous — en livraison directe ou via Uber Eats.",
};

export default function LivraisonPage() {
  return (
    <>
      <PageHero
        title="Livraison"
        text="Auguste vient à vous. Commandez chez nous pour une livraison directe, ou passez par Uber Eats."
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
              <span>Livraison directe ou Uber Eats</span>
            </li>
            <li>
              <strong>Zones</strong>
              <span>À confirmer selon le mode</span>
            </li>
            <li>
              <strong>Horaires</strong>
              <span>À confirmer selon le mode</span>
            </li>
            <li>
              <strong>Frais de livraison</strong>
              <span>Selon le mode choisi</span>
            </li>
          </ul>
          <p className={styles.note}>
            Commandez chez nous pour une livraison directe, ou sur Uber Eats —
            selon votre préférence.
          </p>
          <div className={styles.actions}>
            <Button href={ORDER_URL} size="lg" fullWidth>
              Commander (livraison directe)
            </Button>
            <UberEatsButton fullWidth />
          </div>
        </aside>
      </div>
    </>
  );
}
