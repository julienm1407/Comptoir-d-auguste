import type { Metadata } from "next";
import { ORDER_URL } from "@/config/site";
import { takeawaySteps } from "@/data/demoContent";
import { demoRestaurant } from "@/data/demoRestaurant";
import { Button } from "@/components/Button";
import { OpeningHours } from "@/components/RestaurantInfo";
import { PageHero } from "@/components/PageHero";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "À emporter",
  description:
    "Vous commandez, on prépare. Retirez votre commande au Comptoir d’Auguste.",
};

export default function AEmporterPage() {
  return (
    <>
      <PageHero
        title="À emporter"
        text="Vous commandez, on prépare. Passez retirer votre commande au comptoir."
      />

      <div className={`container section ${styles.page}`}>
        <ol className={styles.steps}>
          {takeawaySteps.map((step) => (
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
          <h2>Retrait</h2>
          <p>
            <strong>Adresse</strong>
            <br />
            {demoRestaurant.address.full}
          </p>
          <OpeningHours />
          <p className={styles.note}>
            Horaires et modalités de retrait à confirmer.
          </p>
          <Button href={ORDER_URL} size="lg">
            Commander
          </Button>
        </aside>
      </div>
    </>
  );
}
