import type { Metadata } from "next";
import Image from "next/image";
import { ORDER_URL } from "@/config/site";
import { demoCategories } from "@/data/demoProducts";
import { Button } from "@/components/Button";
import { PageHero } from "@/components/PageHero";
import { OrderCTA } from "@/components/OrderCTA";
import { SideMosaic } from "@/components/SideMosaic";
import { UberEatsButton } from "@/components/UberEatsButton";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "La carte",
  description:
    "Formules, entrées, plats du moment, salades, snacking, desserts et boissons — découvrez les univers du Comptoir d’Auguste. La carte complète est à la commande.",
};

export default function CartePage() {
  return (
    <>
      <PageHero
        title="La carte"
        text="Nos univers culinaires — la carte détaillée et les disponibilités sont à la commande."
      />

      <div className={styles.shell}>
        <SideMosaic
          leftSrc="/brand/cutouts/mosaique-2-cutout.webp"
          rightSrc="/brand/cutouts/mosaique-3-cutout.webp"
          variant="dense"
        >
          <div className={`container section ${styles.page}`}>
            <p className={styles.lead}>
              Survolez les familles de plats ci-dessous. Pour commander, les plats
              du jour et les prix sont sur Fox Order (ou Uber Eats en livraison).
            </p>

            <div className={styles.grid}>
              {demoCategories.map((category) => (
                <article
                  key={category.id}
                  id={category.slug}
                  className={styles.category}
                >
                  <span className={styles.mosaic} aria-hidden>
                    <Image
                      src={category.mosaic}
                      alt=""
                      width={96}
                      height={96}
                    />
                  </span>
                  <div className={styles.copy}>
                    <h2>{category.name}</h2>
                    <p>{category.description}</p>
                  </div>
                </article>
              ))}
            </div>

            <div className={styles.actions}>
              <Button href={ORDER_URL} size="lg">
                Voir la carte & commander
              </Button>
              <UberEatsButton />
            </div>
          </div>
        </SideMosaic>
      </div>

      <div className="container section--tight">
        <OrderCTA
          title="On vous prépare quoi ?"
          text="La carte complète est à la commande — frais, du jour, fait maison."
          tone="blue"
        />
      </div>
    </>
  );
}
