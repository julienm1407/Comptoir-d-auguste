import type { Metadata } from "next";
import Image from "next/image";
import { demoCategories, demoProducts } from "@/data/demoProducts";
import { PageHero } from "@/components/PageHero";
import { ProductCard } from "@/components/ProductCard";
import { OrderCTA } from "@/components/OrderCTA";
import { SideMosaic } from "@/components/SideMosaic";
import styles from "./page.module.css";

export const metadata: Metadata = {
  title: "La carte",
  description:
    "Viandes, poissons, végétarien, épicés et vegan — une cuisine maison qui suit les saisons.",
};

export default function CartePage() {
  return (
    <>
      <PageHero
        title="La carte"
        text="Une cuisine maison, classée simplement : viandes, poissons, végétarien, épicés et vegan."
      />

      <div className={styles.shell}>
        <SideMosaic
          leftSrc="/brand/cutouts/mosaique-2-cutout.webp"
          rightSrc="/brand/cutouts/mosaique-3-cutout.webp"
          variant="dense"
        >
          <div className={`container section ${styles.page}`}>
            <nav className={styles.anchors} aria-label="Catégories">
              {demoCategories.map((category) => (
                <a key={category.id} href={`#${category.slug}`} className={styles.anchor}>
                  <span className={styles.anchorIcon}>
                    <Image src={category.mosaic} alt="" width={28} height={28} />
                  </span>
                  <span>{category.name}</span>
                </a>
              ))}
            </nav>

            {demoCategories.map((category) => {
              const products = demoProducts.filter(
                (product) => product.categorySlug === category.slug,
              );

              return (
                <section
                  key={category.id}
                  id={category.slug}
                  className={styles.category}
                  aria-labelledby={`${category.slug}-title`}
                >
                  <div className={styles.categoryHeader}>
                    <span className={styles.categoryMosaic}>
                      <Image
                        src={category.mosaic}
                        alt=""
                        width={72}
                        height={72}
                      />
                    </span>
                    <div>
                      <h2 id={`${category.slug}-title`}>{category.name}</h2>
                      <p>{category.description}</p>
                    </div>
                  </div>

                  {products.length > 0 ? (
                    <div className={styles.grid}>
                      {products.map((product) => (
                        <div key={product.id} id={product.slug}>
                          <ProductCard product={product} />
                        </div>
                      ))}
                    </div>
                  ) : (
                    <p className={styles.empty}>
                      Les plats de cette catégorie seront ajoutés prochainement.
                    </p>
                  )}
                </section>
              );
            })}
          </div>
        </SideMosaic>
      </div>

      <div className="container section--tight">
        <OrderCTA title="On vous prépare quoi ?" tone="blue" />
      </div>
    </>
  );
}
