import Link from "next/link";
import { ORDER_URL } from "@/config/site";
import { deliveryOptions } from "@/data/demoContent";
import { Button } from "@/components/Button";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import styles from "./OrderModes.module.css";

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
              <Link href={option.href} className={styles.card}>
                <h3 className={styles.name}>{option.label}</h3>
                <p className={styles.text}>{option.shortDescription}</p>
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
