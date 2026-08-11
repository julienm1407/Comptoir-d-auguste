import Link from "next/link";
import { OpeningHours, RestaurantInfo } from "@/components/RestaurantInfo";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import styles from "./Location.module.css";

export function Location() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="location-title">
      <div className={`container ${styles.grid}`}>
        <Reveal>
          <SectionTitle
            title="Retrouvez Auguste"
            text="Sur place, à emporter ou en livraison — les informations pratiques seront précisées dès confirmation."
          />
          <div className={styles.info}>
            <RestaurantInfo />
            <OpeningHours />
          </div>
          <Link href="/contact" className={styles.link}>
            Nous contacter
          </Link>
        </Reveal>

        <Reveal className={styles.map}>
          <div className={styles.mapPlaceholder}>
            <p>Carte interactive à venir</p>
            <span>Emplacement à confirmer</span>
          </div>
        </Reveal>
      </div>
    </section>
  );
}
