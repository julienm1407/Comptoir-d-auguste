import Image from "next/image";
import Link from "next/link";
import { FOOTER_NAV, FOOTER_ORDER } from "@/config/site";
import { demoRestaurant } from "@/data/demoRestaurant";
import styles from "./Footer.module.css";

export function Footer() {
  const year = new Date().getFullYear();

  return (
    <footer className={styles.footer}>
      <div className={styles.decor} aria-hidden>
        <Image
          src="/brand/cutouts/mosaique-2-cutout.webp"
          alt=""
          width={700}
          height={700}
          className={`${styles.decorPiece} ${styles.decorLeft}`}
        />
        <Image
          src="/brand/cutouts/mosaique-3-cutout.webp"
          alt=""
          width={600}
          height={600}
          className={`${styles.decorPiece} ${styles.decorRight}`}
        />
      </div>
      <div className={`container ${styles.inner}`}>
        <div className={styles.brand}>
          <Image
            src="/brand/logo-principal.png"
            alt="Comptoir d’Auguste"
            width={140}
            height={140}
            className={styles.logo}
          />
          <p className={styles.signature}>{demoRestaurant.signature}.</p>
        </div>

        <div className={styles.cols}>
          <div>
            <h2 className={styles.heading}>Navigation</h2>
            <ul className={styles.list}>
              {FOOTER_NAV.map((link) => (
                <li key={link.href}>
                  <Link href={link.href}>{link.label}</Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h2 className={styles.heading}>Commande</h2>
            <ul className={styles.list}>
              {FOOTER_ORDER.map((link) => (
                <li key={link.href}>
                  <Link href={link.href}>{link.label}</Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h2 className={styles.heading}>Informations</h2>
            <ul className={styles.list}>
              <li>{demoRestaurant.address.full}</li>
              <li>{demoRestaurant.phone}</li>
              <li>
                <a href={`mailto:${demoRestaurant.email}`}>{demoRestaurant.email}</a>
              </li>
            </ul>
          </div>

          <div>
            <h2 className={styles.heading}>Réseaux</h2>
            <ul className={styles.list}>
              {demoRestaurant.socials.map((social) => (
                <li key={social.label}>
                  <a href={social.href}>{social.label}</a>
                </li>
              ))}
            </ul>
          </div>
        </div>
      </div>

      <div className={styles.bottom}>
        <div className={`container ${styles.bottomInner}`}>
          <p>© {year} Comptoir d’Auguste</p>
          <div className={styles.legal}>
            <Link href="/mentions-legales">Mentions légales</Link>
            <Link href="/politique-de-confidentialite">Politique de confidentialité</Link>
          </div>
        </div>
      </div>
    </footer>
  );
}
