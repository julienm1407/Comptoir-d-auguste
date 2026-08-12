import Link from "next/link";
import { homeCategories } from "@/data/demoProducts";
import { CategoryCard } from "@/components/CategoryCard";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import { SideMosaic } from "@/components/SideMosaic";
import styles from "./MenuPreview.module.css";

export function MenuPreview() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="menu-preview-title">
      <SideMosaic
        leftSrc="/brand/cutouts/rameaux-olivier-cutout.webp"
        rightSrc="/brand/cutouts/huole-dolive-cutout.webp"
        variant="corners"
      >
        <div className={`container ${styles.inner}`}>
          <div className={styles.header}>
            <Reveal>
              <SectionTitle
                title="La cuisine d’Auguste"
                text="Formules, entrées, plats du moment, salades, snacking et desserts — plus les boissons sur la carte complète."
              />
            </Reveal>
            <Reveal>
              <Link href="/carte" className={styles.link}>
                Voir la carte
              </Link>
            </Reveal>
          </div>

          <div className={styles.grid}>
            {homeCategories.map((category) => (
              <Reveal key={category.id}>
                <CategoryCard category={category} />
              </Reveal>
            ))}
          </div>
        </div>
      </SideMosaic>
    </section>
  );
}
