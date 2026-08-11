import Image from "next/image";
import { ORDER_URL } from "@/config/site";
import { deliverySteps } from "@/data/demoContent";
import { Button } from "@/components/Button";
import { Reveal } from "@/components/Reveal";
import styles from "./DeliveryHome.module.css";

export function DeliveryHome() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="delivery-home-title">
      <div className={`container ${styles.grid}`}>
        <Reveal className={styles.block}>
          <p className={styles.eyebrow}>Livraison & à emporter</p>
          <h2 id="delivery-home-title" className={styles.title}>
            Commandez, on s’occupe du reste.
          </h2>
          <p className={styles.lead}>
            Livraison chez vous ou retrait au comptoir — même commande, même cuisine
            maison.
          </p>
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
          <div className={styles.actions}>
            <Button href={ORDER_URL}>Commander</Button>
            <Button href="/a-emporter" variant="ghost">
              Voir le retrait
            </Button>
            <Button href="/livraison" variant="ghost">
              Infos livraison
            </Button>
          </div>
        </Reveal>

        <Reveal className={styles.visual}>
          <Image
            src="/brand/scooter-mosaique.png"
            alt="Livraison Comptoir d’Auguste — illustration mosaïque"
            width={720}
            height={720}
            className={styles.image}
          />
        </Reveal>
      </div>
    </section>
  );
}
