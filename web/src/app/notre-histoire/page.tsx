import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { officialBrandCopy } from "@/data/demoRestaurant";
import { PageHero } from "@/components/PageHero";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Notre histoire",
  description: officialBrandCopy.intro,
};

const pillars = [
  {
    title: "Inspiration Provence",
    text: "Des saveurs généreuses, sincères et ensoleillées.",
  },
  {
    title: "Inspiration Méditerranée",
    text: "Une cuisine conviviale, ouverte et gourmande.",
  },
  {
    title: "Fait maison",
    text: "Entièrement préparé chaque jour en cuisine.",
  },
  {
    title: "Produits frais & saison",
    text: "La carte évolue selon les arrivages et les envies.",
  },
] as const;

export default function NotreHistoirePage() {
  return (
    <>
      <PageHero
        eyebrow="Notre histoire"
        title={officialBrandCopy.name}
        text={officialBrandCopy.signature}
      />

      <article className={`container section ${styles.article}`}>
        <div className={styles.story}>
          <div className={styles.copy}>
            <p className={styles.lead}>{officialBrandCopy.intro}</p>
            <p>{officialBrandCopy.menu}</p>
            <p>{officialBrandCopy.closing}</p>
          </div>

          <div className={styles.media}>
            <Image
              src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1400&q=80"
              alt="Cuisine maison en préparation"
              width={900}
              height={1100}
              className={styles.image}
              priority
            />
          </div>
        </div>

        <section className={styles.values} aria-labelledby="values-title">
          <h2 id="values-title">Ce qui guide la cuisine</h2>
          <ul>
            {pillars.map((pillar) => (
              <li key={pillar.title}>
                <h3>{pillar.title}</h3>
                <p>{pillar.text}</p>
              </li>
            ))}
          </ul>
        </section>

        <p className={styles.carteLink}>
          <Link href="/carte">Voir la carte</Link>
        </p>
      </article>
    </>
  );
}
