import type { Metadata } from "next";
import { demoRestaurant } from "@/data/demoRestaurant";
import { OpeningHours, RestaurantInfo } from "@/components/RestaurantInfo";
import { PageHero } from "@/components/PageHero";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Contact",
  description: "Retrouvez Auguste — adresse, horaires, téléphone et réseaux.",
};

export default function ContactPage() {
  return (
    <>
      <PageHero
        title="Retrouvez Auguste"
        text="Adresse, horaires et réseaux — passez nous voir ou contactez-nous."
      />

      <div className={`container section ${styles.page}`}>
        <div className={styles.info}>
          <RestaurantInfo />
          <OpeningHours />
          <div>
            <h2 className={styles.heading}>Réseaux</h2>
            <ul className={styles.socials}>
              {demoRestaurant.socials.map((social) => (
                <li key={social.label}>
                  <a href={social.href}>{social.label}</a>
                </li>
              ))}
            </ul>
          </div>
        </div>
      </div>
    </>
  );
}
