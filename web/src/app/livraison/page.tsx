import type { Metadata } from "next";
import { ORDER_URL } from "@/config/site";
import { deliverySteps } from "@/data/demoContent";
import { Button } from "@/components/Button";
import { PageHero } from "@/components/PageHero";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Livraison",
  description:
    "Auguste vient à vous. Commandez en ligne et faites-vous livrer une cuisine maison.",
};

export default function LivraisonPage() {
  return (
    <>
      <PageHero
        title="Livraison"
        text="Auguste vient à vous. Choisissez, commandez, on prépare, on vous livre."
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
              <strong>Zones</strong>
              <span>À confirmer</span>
            </li>
            <li>
              <strong>Horaires</strong>
              <span>À confirmer</span>
            </li>
            <li>
              <strong>Minimum de commande</strong>
              <span>À confirmer</span>
            </li>
            <li>
              <strong>Frais de livraison</strong>
              <span>À confirmer</span>
            </li>
          </ul>
          <p className={styles.note}>
            Ces informations seront mises à jour dès qu’elles seront définitives.
          </p>
          <Button href={ORDER_URL} size="lg">
            Commander
          </Button>
        </aside>
      </div>
    </>
  );
}
