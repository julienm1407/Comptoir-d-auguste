import Image from "next/image";
import { officialBrandCopy } from "@/data/demoRestaurant";
import { Reveal } from "@/components/Reveal";
import { SideMosaic } from "@/components/SideMosaic";
import styles from "./BrandDna.module.css";

export function BrandDna() {
  return (
    <section id="le-comptoir" className={`section ${styles.section}`} aria-labelledby="dna-title">
      <SideMosaic
        leftSrc="/brand/cutouts/mosaique-2-cutout.webp"
        rightSrc="/brand/cutouts/poisson-cutout.webp"
        variant="corners"
      >
        <div className={`container ${styles.layout}`}>
          <Reveal className={styles.media}>
            <Image
              src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1400&q=80"
              alt="Cuisine maison en préparation"
              fill
              sizes="(max-width: 1024px) 100vw, 80vw"
              className={styles.image}
            />
          </Reveal>

          <div className={styles.panel}>
            <p className={styles.eyebrow}>L’ADN du comptoir</p>
            <h2 id="dna-title" className={styles.title}>
              Derrière chaque plat, une envie de bien faire.
            </h2>
            <p className={styles.text}>
              {officialBrandCopy.philosophy} {officialBrandCopy.intro}
            </p>
          </div>
        </div>
      </SideMosaic>
    </section>
  );
}
