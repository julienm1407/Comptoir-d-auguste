import type { ReactNode } from "react";
import Image from "next/image";
import styles from "./SideMosaic.module.css";

type MosaicVariant = "bleed" | "corners" | "dense";

interface SideMosaicProps {
  leftSrc?: string;
  rightSrc?: string;
  accentSrc?: string;
  variant?: MosaicVariant;
  className?: string;
  children: ReactNode;
}

export function SideMosaic({
  leftSrc = "/brand/cutouts/mosaique-2-cutout.webp",
  rightSrc = "/brand/cutouts/mosaique-3-cutout.webp",
  accentSrc,
  variant = "bleed",
  className,
  children,
}: SideMosaicProps) {
  return (
    <div
      className={[styles.frame, styles[variant], className].filter(Boolean).join(" ")}
    >
      <aside className={styles.gutterLeft} aria-hidden>
        <Image
          src={leftSrc}
          alt=""
          width={720}
          height={720}
          className={styles.leftPiece}
        />
      </aside>

      <div className={styles.content}>{children}</div>

      <aside className={styles.gutterRight} aria-hidden>
        <Image
          src={rightSrc}
          alt=""
          width={640}
          height={640}
          className={styles.rightPiece}
        />
        {accentSrc ? (
          <Image
            src={accentSrc}
            alt=""
            width={420}
            height={420}
            className={styles.accentPiece}
          />
        ) : null}
      </aside>
    </div>
  );
}
