import type { Metadata } from "next";
import { demoRestaurant } from "@/data/demoRestaurant";
import { OpeningHours, RestaurantInfo } from "@/components/RestaurantInfo";
import { PageHero } from "@/components/PageHero";
import { ContactForm } from "@/components/ContactForm";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Contact",
  description: "Retrouvez Auguste — adresse, horaires, téléphone et formulaire de contact.",
};

export default function ContactPage() {
  return (
    <>
      <PageHero title="Retrouvez Auguste" text="Une question ? Écrivez-nous ou passez nous voir." />

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

        <div className={styles.formBlock}>
          <h2>Une question ?</h2>
          <p>Le formulaire est prêt pour une future intégration (WordPress / e-mail).</p>
          <ContactForm />
        </div>

        <div className={styles.map}>
          <div className={styles.mapPlaceholder}>
            <p>Carte à venir</p>
            <span>Emplacement à confirmer</span>
          </div>
        </div>
      </div>
    </>
  );
}
