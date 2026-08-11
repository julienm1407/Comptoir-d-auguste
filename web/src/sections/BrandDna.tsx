import Image from "next/image";
import { officialBrandCopy } from "@/data/demoRestaurant";
import { Reveal } from "@/components/Reveal";
import { SideMosaic } from "@/components/SideMosaic";
import styles from "./BrandDna.module.css";

const pillars = [
  { title: "Fait maison", text: "Entièrement préparé en cuisine, chaque jour." },
  { title: "Produits frais", text: "Des produits choisis pour leur qualité." },
  { title: "Saisonnalité", text: "Une carte qui suit les saisons et les envies." },
  {
    title: "Provence & Méditerranée",
    text: "Des saveurs inspirées, généreuses et authentiques.",
  },
];

export function BrandDna() {
  return (
    <section id="le-comptoir" className={`section ${styles.section}`} aria-labelledby="dna-title">
      <SideMosaic
        leftSrc="/brand/cutouts/mosaique-2-cutout.webp"
        rightSrc="/brand/cutouts/poisson-cutout.webp"
        variant="corners"
      >
        <div className={`container ${styles.grid}`}>
          <Reveal className={styles.media}>
            <Image
              src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1200&q=80"
              alt="Cuisine maison en préparation"
              fill
              sizes="(max-width: 1024px) 100vw, 50vw"
              className={styles.image}
            />
          </Reveal>

          <Reveal className={styles.copy}>
            <p className={styles.eyebrow}>L’ADN du comptoir</p>
            <h2 id="dna-title" className={styles.title}>
              Derrière chaque plat, une envie de bien faire.
            </h2>
            <p className={styles.lead}>{officialBrandCopy.philosophy}</p>
            <p className={styles.text}>{officialBrandCopy.intro}</p>

            <ul className={styles.pillars}>
              {pillars.map((item) => (
                <li key={item.title}>
                  <h3>{item.title}</h3>
                  <p>{item.text}</p>
                </li>
              ))}
            </ul>
          </Reveal>
        </div>
      </SideMosaic>
    </section>
  );
}
