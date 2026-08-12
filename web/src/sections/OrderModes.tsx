import Link from "next/link";
import { ORDER_URL } from "@/config/site";
import { deliveryOptions } from "@/data/demoContent";
import { Button } from "@/components/Button";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import styles from "./OrderModes.module.css";

const icons = {
  delivery: (
    <svg viewBox="0 0 48 48" aria-hidden className={styles.iconSvg}>
      <path
        d="M6 30h22v-9.5A4.5 4.5 0 0 0 23.5 16H10a4 4 0 0 0-4 4v10Z"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinejoin="round"
      />
      <path
        d="M28 24h7.2l4.3 5.2V30H28"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinejoin="round"
      />
      <circle cx="14" cy="33.5" r="3.2" fill="none" stroke="currentColor" strokeWidth="2.2" />
      <circle cx="34" cy="33.5" r="3.2" fill="none" stroke="currentColor" strokeWidth="2.2" />
      <path
        d="M10 20h10"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
    </svg>
  ),
  takeaway: (
    <svg viewBox="0 0 48 48" aria-hidden className={styles.iconSvg}>
      <path
        d="M17 20h14l1.4 16.5a2.5 2.5 0 0 1-2.5 2.7H18.1a2.5 2.5 0 0 1-2.5-2.7L17 20Z"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinejoin="round"
      />
      <path
        d="M16 20h16"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
      <path
        d="M20 20v-3.2c0-2.3 1.8-4.3 4-4.3s4 2 4 4.3V20"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
      <path
        d="M22.5 27.5c1.2 1.3 1.8 1.3 3 0s1.8-1.3 3 0"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
    </svg>
  ),
  "dine-in": (
    <svg viewBox="0 0 48 48" aria-hidden className={styles.iconSvg}>
      <path
        d="M15 12v24"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
      <path
        d="M11 12c0 4 1.8 6.5 4 6.5S19 16 19 12"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
      <path
        d="M29 12v8.5c0 2.4 1.6 3.5 3.5 3.5H35"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
        strokeLinejoin="round"
      />
      <path
        d="M32.5 12v24"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
      <path
        d="M10 39h28"
        fill="none"
        stroke="currentColor"
        strokeWidth="2.2"
        strokeLinecap="round"
      />
    </svg>
  ),
} as const;

export function OrderModes() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="order-modes-title">
      <div className="container">
        <Reveal>
          <SectionTitle
            title="Comment voulez-vous profiter d’Auguste ?"
            as="h2"
            align="center"
            className={styles.title}
          />
        </Reveal>

        <div className={styles.grid}>
          {deliveryOptions.map((option) => (
            <Reveal key={option.id}>
              <Link
                href={option.href}
                className={[styles.card, styles[`tone-${option.icon}`]].join(" ")}
              >
                <span className={styles.icon} aria-hidden>
                  {icons[option.icon as keyof typeof icons]}
                </span>
                <div className={styles.copy}>
                  <h3 className={styles.name}>{option.label}</h3>
                  <p className={styles.text}>{option.shortDescription}</p>
                </div>
                <span className={styles.accent} aria-hidden />
              </Link>
            </Reveal>
          ))}
        </div>

        <Reveal className={styles.cta}>
          <Button href={ORDER_URL} size="lg">
            Commander
          </Button>
        </Reveal>
      </div>
    </section>
  );
}
