import type { Metadata } from "next";
import Image from "next/image";
import { notFound } from "next/navigation";
import { demoArticles, getArticleBySlug } from "@/data/demoArticles";
import { formatDate } from "@/utils/format";
import { Button } from "@/components/Button";
import styles from "./page.module.css";

interface PageProps {
  params: Promise<{ slug: string }>;
}

export async function generateStaticParams() {
  return demoArticles.map((article) => ({ slug: article.slug }));
}

export async function generateMetadata({ params }: PageProps): Promise<Metadata> {
  const { slug } = await params;
  const article = getArticleBySlug(slug);
  if (!article) return { title: "Article" };
  return {
    title: article.title,
    description: article.excerpt,
  };
}

export default async function ArticlePage({ params }: PageProps) {
  const { slug } = await params;
  const article = getArticleBySlug(slug);
  if (!article) notFound();

  return (
    <article className={styles.article}>
      <header className={styles.hero}>
        <div className={`container ${styles.heroInner}`}>
          <p className={styles.meta}>
            <span>{article.category}</span>
            <span aria-hidden>·</span>
            <time dateTime={article.publishedAt}>{formatDate(article.publishedAt)}</time>
          </p>
          <h1>{article.title}</h1>
          <p className={styles.excerpt}>{article.excerpt}</p>
        </div>
      </header>

      <div className={`container ${styles.content}`}>
        <div className={styles.cover}>
          <Image
            src={article.coverImage}
            alt=""
            width={1200}
            height={700}
            className={styles.image}
          />
        </div>
        <div className={styles.body}>
          <p>{article.content}</p>
          <p className={styles.note}>
            Contenu de démonstration — les articles seront alimentés depuis WordPress.
          </p>
          <Button href="/actualites" variant="ghost">
            Retour aux actualités
          </Button>
        </div>
      </div>
    </article>
  );
}
