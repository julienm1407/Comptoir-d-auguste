import type { Metadata } from "next";
import { demoArticles } from "@/data/demoArticles";
import { ArticleCard } from "@/components/ArticleCard";
import { PageHero } from "@/components/PageHero";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "Actualités",
  description:
    "Nouveaux plats, plats du moment, coulisses et actualités du Comptoir d’Auguste.",
};

export default function ActualitesPage() {
  return (
    <>
      <PageHero
        title="Actualités"
        text="Nouveautés, plats du moment et coulisses — une cuisine qui évolue."
      />
      <div className={`container section ${styles.grid}`}>
        {demoArticles.map((article) => (
          <ArticleCard key={article.id} article={article} />
        ))}
      </div>
    </>
  );
}
