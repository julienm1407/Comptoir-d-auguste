import Image from "next/image";
import styles from "./MosaicInset.module.css";

export function MosaicInset() {
  return (
    <section className={styles.section} aria-hidden="true">
      <div className={styles.frame}>
        <Image
          src="/brand/cutouts/mosaique-2-cutout.webp"
          alt=""
          width={720}
          height={720}
          className={styles.piece}
        />
        <Image
          src="/brand/cutouts/mosaique-1-cutout.webp"
          alt=""
          width={640}
          height={640}
          className={`${styles.piece} ${styles.pieceSecondary}`}
        />
        <Image
          src="/brand/cutouts/mosaique-3-cutout.webp"
          alt=""
          width={640}
          height={640}
          className={styles.piece}
        />
      </div>
    </section>
  );
}
