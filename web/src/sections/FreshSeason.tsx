import { values } from "@/data/demoContent";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import styles from "./FreshSeason.module.css";

export function FreshSeason() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="fresh-title">
      <div className="container">
        <Reveal>
          <SectionTitle
            title="Chaque jour, avec de bons produits."
            text="Élaborée chaque jour à partir de produits frais et de saison."
            align="center"
            className={styles.title}
          />
        </Reveal>

        <div className={styles.grid}>
          {values.map((item) => (
            <Reveal key={item.title} className={styles.card}>
              <h3>{item.title}</h3>
              <p>{item.text}</p>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  );
}
