import type { Metadata } from "next";
import Image from "next/image";
import { officialBrandCopy } from "@/data/demoRestaurant";
import { PageHero } from "@/components/PageHero";
import { OrderCTA } from "@/components/OrderCTA";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Notre histoire",
  description: officialBrandCopy.intro,
};

export default function NotreHistoirePage() {
  return (
    <>
      <PageHero
        title={officialBrandCopy.name}
        text={officialBrandCopy.signature}
        eyebrow="Notre histoire"
      />

      <article className={`container section ${styles.article}`}>
        <div className={styles.intro}>
          <p className={styles.lead}>{officialBrandCopy.intro}</p>
          <p>{officialBrandCopy.menu}</p>
          <p>{officialBrandCopy.closing}</p>
        </div>

        <div className={styles.media}>
          <Image
            src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80"
            alt="Cuisine maison généreuse"
            width={900}
            height={700}
            className={styles.image}
          />
        </div>

        <div className={styles.values}>
          <h2>Ce qui guide la cuisine</h2>
          <ul>
            <li>
              <h3>Inspiration Provence</h3>
              <p>Des saveurs généreuses, sincères et ensoleillées.</p>
            </li>
            <li>
              <h3>Inspiration Méditerranée</h3>
              <p>Une cuisine conviviale, ouverte et gourmande.</p>
            </li>
            <li>
              <h3>Fait maison</h3>
              <p>Entièrement préparé chaque jour en cuisine.</p>
            </li>
            <li>
              <h3>Produits frais & saison</h3>
              <p>La carte évolue selon les arrivages et les envies.</p>
            </li>
          </ul>
        </div>
      </article>

      <div className="container section--tight">
        <OrderCTA
          title="Une cuisine qui évolue avec les saisons."
          text="Venez découvrir ce qui se prépare aujourd’hui."
        />
      </div>
    </>
  );
}
