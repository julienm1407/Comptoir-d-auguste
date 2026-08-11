import { ORDER_URL } from "@/config/site";
import { featuredProducts } from "@/data/demoProducts";
import { Button } from "@/components/Button";
import { ProductCard } from "@/components/ProductCard";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import { SideMosaic } from "@/components/SideMosaic";
import styles from "./FeaturedDishes.module.css";

export function FeaturedDishes() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="featured-title">
      <SideMosaic
        leftSrc="/brand/cutouts/mosaique-1-cutout.webp"
        rightSrc="/brand/cutouts/cigalle-cutout.webp"
        variant="bleed"
      >
        <div className={`container ${styles.inner}`}>
          <Reveal>
            <SectionTitle
              eyebrow="À découvrir"
              title="Les plats du moment"
              text="Notre carte évolue au gré des saisons et de nos inspirations."
            />
          </Reveal>

          <div className={styles.grid}>
            {featuredProducts.slice(0, 4).map((product) => (
              <Reveal key={product.id}>
                <ProductCard product={product} />
              </Reveal>
            ))}
          </div>

          <Reveal className={styles.actions}>
            <Button href="/carte" variant="ghost">
              Voir la carte
            </Button>
            <Button href={ORDER_URL}>Commander</Button>
          </Reveal>
        </div>
      </SideMosaic>
    </section>
  );
}
