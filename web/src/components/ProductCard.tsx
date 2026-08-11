import Image from "next/image";
import Link from "next/link";
import type { Product } from "@/types";
import { ORDER_URL } from "@/config/site";
import { badgeLabels, formatPrice } from "@/utils/format";
import { Button } from "./Button";
import styles from "./ProductCard.module.css";

interface ProductCardProps {
  product: Product;
}

export function ProductCard({ product }: ProductCardProps) {
  return (
    <article className={styles.card}>
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
          <p className={styles.price}>{formatPrice(product.price)}</p>
        </div>
        <p className={styles.description}>{product.description}</p>
        <Button href={ORDER_URL} size="sm" className={styles.cta}>
          Ajouter
        </Button>
      </div>
    </article>
  );
}
