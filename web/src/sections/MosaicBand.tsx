import Image from "next/image";
import { MosaicPattern } from "@/components/MosaicPattern";
import styles from "./MosaicBand.module.css";

export function MosaicBand() {
  return (
    <section className={styles.section} aria-label="Motif mosaïque Comptoir d’Auguste">
      <div className={styles.pattern}>
        <MosaicPattern variant="dense" />
      </div>
      <div className={`container ${styles.inner}`}>
        <div className={styles.copy}>
          <p className={styles.eyebrow}>Signature visuelle</p>
          <h2 className={styles.title}>Une mosaïque contemporaine.</h2>
          <p className={styles.text}>
            Graphique, artisanale, méditerranéenne — le langage visuel d’Auguste.
          </p>
        </div>
        <div className={styles.gallery}>
          <Image src="/brand/mosaique-2.png" alt="" width={320} height={320} className={styles.img} />
          <Image src="/brand/mosaique-3.png" alt="" width={260} height={260} className={styles.img} />
        </div>
      </div>
    </section>
  );
}
