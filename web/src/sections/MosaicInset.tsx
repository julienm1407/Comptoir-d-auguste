import Image from "next/image";
import { Reveal } from "@/components/Reveal";
import styles from "./MosaicInset.module.css";

export function MosaicInset() {
  return (
    <section className={styles.section} aria-label="Motifs mosaïque Comptoir d’Auguste">
      <div className={styles.frame}>
        <aside className={styles.gutterLeft} aria-hidden>
          <Image
            src="/brand/cutouts/mosaique-2-cutout.webp"
            alt=""
            width={720}
            height={720}
            className={styles.leftPiece}
          />
          <Image
            src="/brand/cutouts/mosaique-1-cutout.webp"
            alt=""
            width={640}
            height={640}
            className={styles.leftPieceSecondary}
          />
        </aside>

        <Reveal className={styles.copy}>
          <p className={styles.eyebrow}>Signature visuelle</p>
          <h2 className={styles.title}>Une mosaïque contemporaine.</h2>
          <p className={styles.text}>
            Graphique, artisanale, méditerranéenne — le langage visuel d’Auguste,
            incrusté dans chaque page.
          </p>
        </Reveal>

        <aside className={styles.gutterRight} aria-hidden>
          <Image
            src="/brand/cutouts/mosaique-3-cutout.webp"
            alt=""
            width={640}
            height={640}
            className={styles.rightPiece}
          />
        </aside>
      </div>
    </section>
  );
}
