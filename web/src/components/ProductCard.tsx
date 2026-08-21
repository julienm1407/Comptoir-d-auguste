import Image from "next/image";
import Link from "next/link";
import type { Product } from "@/types";
import { badgeLabels } from "@/utils/format";
import styles from "./ProductCard.module.css";

interface ProductCardProps {
  product: Product;
  /** Texte court, aligné à gauche — pour carrousels / aperçus */
  compact?: boolean;
}

export function ProductCard({ product, compact = false }: ProductCardProps) {
  const description = compact
    ? product.description.length > 90
      ? `${product.description.slice(0, 87).trim()}…`
      : product.description
    : product.description;

  return (
    <article className={[styles.card, compact ? styles.compact : ""].join(" ")}>
      <Link href={`/carte#${product.slug}`} className={styles.media}>
        <Image
          src={product.image}
          alt={product.name}
          fill
          sizes="(max-width: 768px) 100vw, 33vw"
          className={styles.image}
        />
        {product.badge ? (
          <span className={styles.badge}>{badgeLabels[product.badge]}</span>
        ) : null}
      </Link>

      <div className={styles.body}>
        <div className={styles.top}>
          <h3 className={styles.name}>{product.name}</h3>
        </div>
        <p className={styles.description}>{description}</p>
      </div>
    </article>
  );
}
