import Image from "next/image";
import Link from "next/link";
import type { Article } from "@/types";
import { formatDate } from "@/utils/format";
import styles from "./ArticleCard.module.css";

interface ArticleCardProps {
  article: Article;
}

export function ArticleCard({ article }: ArticleCardProps) {
  return (
    <article className={styles.card}>
      <Link href={`/actualites/${article.slug}`} className={styles.media}>
        <Image
          src={article.coverImage}
          alt=""
          fill
          sizes="(max-width: 768px) 100vw, 33vw"
          className={styles.image}
        />
      </Link>
      <div className={styles.body}>
        <p className={styles.meta}>
          <span>{article.category}</span>
          <span aria-hidden>·</span>
          <time dateTime={article.publishedAt}>{formatDate(article.publishedAt)}</time>
        </p>
        <h3 className={styles.title}>
          <Link href={`/actualites/${article.slug}`}>{article.title}</Link>
        </h3>
        <p className={styles.excerpt}>{article.excerpt}</p>
      </div>
    </article>
  );
}
