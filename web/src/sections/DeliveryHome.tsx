import Image from "next/image";
import { ORDER_URL } from "@/config/site";
import { deliverySteps, takeawaySteps } from "@/data/demoContent";
import { Button } from "@/components/Button";
import { Reveal } from "@/components/Reveal";
import styles from "./DeliveryHome.module.css";

export function DeliveryHome() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="delivery-home-title">
      <div className={`container ${styles.grid}`}>
        <Reveal className={styles.block}>
          <p className={styles.eyebrow}>Livraison</p>
          <h2 id="delivery-home-title" className={styles.title}>
            Auguste vient à vous.
          </h2>
          <ol className={styles.steps}>
            {deliverySteps.map((step) => (
              <li key={step.step}>
                <span className={styles.num}>{step.step}</span>
                <div>
                  <h3>{step.title}</h3>
                  <p>{step.text}</p>
                </div>
              </li>
            ))}
          </ol>
          <Button href={ORDER_URL}>Commander</Button>
        </Reveal>

        <Reveal className={styles.visual}>
          <Image
            src="/brand/scooter-mosaique.png"
            alt="Livraison Comptoir d’Auguste — illustration mosaïque"
            width={560}
            height={560}
            className={styles.image}
          />
        </Reveal>

        <Reveal className={`${styles.block} ${styles.takeaway}`}>
          <p className={styles.eyebrow}>À emporter</p>
          <h2 className={styles.title}>Vous commandez, on prépare.</h2>
          <ol className={styles.steps}>
            {takeawaySteps.map((step) => (
              <li key={step.step}>
                <span className={styles.num}>{step.step}</span>
                <div>
                  <h3>{step.title}</h3>
                  <p>{step.text}</p>
                </div>
              </li>
            ))}
          </ol>
          <div className={styles.actions}>
            <Button href="/a-emporter" variant="ghost">
              Voir le retrait
            </Button>
            <Button href={ORDER_URL}>Commander</Button>
          </div>
        </Reveal>
      </div>
    </section>
  );
}
