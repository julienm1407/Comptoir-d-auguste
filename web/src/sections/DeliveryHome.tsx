import Image from "next/image";
import Link from "next/link";
import { ORDER_URL } from "@/config/site";
import { Button } from "@/components/Button";
import { Reveal } from "@/components/Reveal";
import styles from "./DeliveryHome.module.css";

const journey = [
  {
    step: 1,
    title: "Choisissez",
    text: "Parcourez la carte en ligne.",
  },
  {
    step: 2,
    title: "Commandez",
    text: "Validez en quelques clics.",
  },
  {
    step: 3,
    title: "On prépare",
    text: "Cuisine maison, le jour même.",
  },
  {
    step: 4,
    title: "Recevez",
    text: "Livré chez vous ou prêt au comptoir.",
  },
] as const;

const modes = [
  {
    id: "delivery",
    label: "Livraison",
    text: "Auguste vient jusqu’à vous.",
    href: "/livraison",
    tone: "delivery",
  },
  {
    id: "takeaway",
    label: "À emporter",
    text: "Vous commandez, vous retirez.",
    href: "/a-emporter",
    tone: "takeaway",
  },
] as const;

export function DeliveryHome() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="delivery-home-title">
      <div className={`container ${styles.wrap}`}>
        <div className={styles.top}>
          <Reveal className={styles.intro}>
            <p className={styles.eyebrow}>Livraison & à emporter</p>
            <h2 id="delivery-home-title" className={styles.title}>
              Commandez, on s’occupe du reste.
            </h2>
            <p className={styles.lead}>
              Même carte, même cuisine maison — à vous de choisir comment la recevoir.
            </p>
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

        <Reveal className={styles.lower}>
          <div className={styles.modes}>
            {modes.map((mode) => (
              <Link
                key={mode.id}
                href={mode.href}
                className={[styles.mode, styles[`mode-${mode.tone}`]].join(" ")}
              >
                <span className={styles.modeLabel}>{mode.label}</span>
                <span className={styles.modeText}>{mode.text}</span>
              </Link>
            ))}
          </div>

          <ol className={styles.journey}>
            {journey.map((item, index) => (
              <li key={item.step} className={styles.step}>
                <div className={styles.stepHead}>
                  <span className={styles.num}>{item.step}</span>
                  {index < journey.length - 1 ? (
                    <span className={styles.connector} aria-hidden />
                  ) : null}
                </div>
                <h3 className={styles.stepTitle}>{item.title}</h3>
                <p className={styles.stepText}>{item.text}</p>
              </li>
            ))}
          </ol>

          <div className={styles.actions}>
            <Button href={ORDER_URL}>Commander</Button>
            <Button href="/livraison" variant="ghost">
              Infos livraison
            </Button>
          </div>
        </Reveal>
      </div>
    </section>
  );
}
