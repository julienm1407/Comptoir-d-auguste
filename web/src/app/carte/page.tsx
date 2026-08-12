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
    "Formules, entrées, plats du moment, salades, snacking, desserts et boissons — la carte du Comptoir d’Auguste.",
};

export default function CartePage() {
  return (
    <>
      <PageHero
        title="La carte"
        text="Formules, plats du moment, salades, snacking, desserts et boissons — une cuisine maison, claire et généreuse."
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
              const families = [
                ...new Set(products.map((p) => p.family).filter(Boolean)),
              ] as string[];
              const useFamilies = families.length > 1;

              return (
                <section
                  key={category.id}
                  id={category.slug}
                  className={styles.category}
                  aria-labelledby={`${category.slug}-title`}
                >
                  <div className={styles.categoryHeader}>
                    <span className={styles.categoryMosaic}>
                      <Image src={category.mosaic} alt="" width={72} height={72} />
                    </span>
                    <div>
                      <h2 id={`${category.slug}-title`}>{category.name}</h2>
                      <p>{category.description}</p>
                    </div>
                  </div>

                  {products.length === 0 ? (
                    <p className={styles.empty}>
                      Les plats de cette catégorie seront ajoutés prochainement.
                    </p>
                  ) : useFamilies ? (
                    families.map((family) => {
                      const familyProducts = products.filter((p) => p.family === family);
                      return (
                        <div key={family} className={styles.family}>
                          <h3 className={styles.familyTitle}>{family}</h3>
                          <div className={styles.grid}>
                            {familyProducts.map((product) => (
                              <div key={product.id} id={product.slug}>
                                <ProductCard product={product} />
                              </div>
                            ))}
                          </div>
                        </div>
                      );
                    })
                  ) : (
                    <div className={styles.grid}>
                      {products.map((product) => (
                        <div key={product.id} id={product.slug}>
                          <ProductCard product={product} />
                        </div>
                      ))}
                    </div>
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
