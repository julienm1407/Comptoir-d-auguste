import Link from "next/link";
import { demoRestaurant } from "@/data/demoRestaurant";
import { OpeningHours, RestaurantInfo } from "@/components/RestaurantInfo";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import styles from "./Location.module.css";

export function Location() {
  const { address, mapEmbedUrl, mapLink } = demoRestaurant;

  return (
    <section className={`section ${styles.section}`} aria-labelledby="location-title">
      <div className={`container ${styles.grid}`}>
        <Reveal>
          <SectionTitle
            title="Retrouvez Auguste"
            text="Sur place, à emporter ou en livraison — venez nous rejoindre à La Seyne-sur-Mer."
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
          {mapEmbedUrl ? (
            <iframe
              className={styles.mapFrame}
              title={`Carte — ${address.full}`}
              src={mapEmbedUrl}
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
              allowFullScreen
            />
          ) : (
            <a className={styles.mapPlaceholder} href={mapLink} target="_blank" rel="noreferrer">
              <p>Voir sur Google Maps</p>
              <span>{address.full}</span>
            </a>
          )}
        </Reveal>
      </div>
    </section>
  );
}
