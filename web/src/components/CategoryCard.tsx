import Image from "next/image";
import Link from "next/link";
import type { Category } from "@/types";
import styles from "./CategoryCard.module.css";

interface CategoryCardProps {
  category: Category;
}

export function CategoryCard({ category }: CategoryCardProps) {
  return (
    <Link href={`/carte#${category.slug}`} className={styles.card}>
      <div className={styles.mosaicWrap}>
        <Image
          src={category.mosaic}
          alt=""
          width={200}
          height={200}
          className={styles.mosaic}
        />
      </div>
      <div className={styles.content}>
        <h3 className={styles.name}>{category.name}</h3>
        <p className={styles.description}>{category.description}</p>
      </div>
    </Link>
  );
}
