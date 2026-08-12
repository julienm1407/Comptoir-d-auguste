"use client";

import { useCallback, useEffect, useState } from "react";
import { ORDER_URL } from "@/config/site";
import { demoProducts } from "@/data/demoProducts";
import { Button } from "@/components/Button";
import { ProductCard } from "@/components/ProductCard";
import { Reveal } from "@/components/Reveal";
import { SectionTitle } from "@/components/SectionTitle";
import { SideMosaic } from "@/components/SideMosaic";
import styles from "./FeaturedDishes.module.css";

const dishes = demoProducts.filter((p) => p.categorySlug === "plats-du-moment");

function useVisibleCount() {
  const [count, setCount] = useState(3);

  useEffect(() => {
    const update = () => {
      if (window.matchMedia("(max-width: 767px)").matches) setCount(1);
      else if (window.matchMedia("(max-width: 1023px)").matches) setCount(2);
      else setCount(3);
    };
    update();
    window.addEventListener("resize", update);
    return () => window.removeEventListener("resize", update);
  }, []);

  return count;
}

export function FeaturedDishes() {
  const visibleCount = useVisibleCount();
  const [index, setIndex] = useState(0);
  const maxIndex = Math.max(0, dishes.length - visibleCount);

  useEffect(() => {
    setIndex((current) => Math.min(current, maxIndex));
  }, [maxIndex]);

  const goTo = useCallback(
    (next: number) => {
      const total = maxIndex + 1;
      setIndex((((next % total) + total) % total));
    },
    [maxIndex],
  );

  useEffect(() => {
    if (dishes.length <= visibleCount) return;
    const id = window.setInterval(() => {
      setIndex((current) => (current >= maxIndex ? 0 : current + 1));
    }, 5200);
    return () => window.clearInterval(id);
  }, [maxIndex, visibleCount]);

  const slides = Array.from({ length: visibleCount }, (_, offset) => {
    const i = (index + offset) % dishes.length;
    return dishes[i];
  });

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
              text="Les suggestions du jour — texte court, carte complète juste à côté."
            />
          </Reveal>

          <div className={styles.carousel}>
            <div
              className={styles.track}
              data-count={visibleCount}
              aria-live="polite"
            >
              {slides.map((product, offset) => (
                <div key={`${product.id}-${index}-${offset}`} className={styles.slide}>
                  <ProductCard product={product} compact />
                </div>
              ))}
            </div>

            {dishes.length > visibleCount ? (
              <div className={styles.controls}>
                <button
                  type="button"
                  className={styles.arrow}
                  aria-label="Plats précédents"
                  onClick={() => goTo(index - 1)}
                >
                  ←
                </button>
                <div className={styles.dots} role="tablist" aria-label="Pages du carrousel">
                  {Array.from({ length: maxIndex + 1 }, (_, i) => (
                    <button
                      key={i}
                      type="button"
                      role="tab"
                      aria-selected={i === index}
                      aria-label={`Page ${i + 1}`}
                      className={[styles.dot, i === index ? styles.dotActive : ""].join(" ")}
                      onClick={() => goTo(i)}
                    />
                  ))}
                </div>
                <button
                  type="button"
                  className={styles.arrow}
                  aria-label="Plats suivants"
                  onClick={() => goTo(index + 1)}
                >
                  →
                </button>
              </div>
            ) : null}
          </div>

          <Reveal className={styles.actions}>
            <Button href="/carte#plats-du-moment" variant="ghost">
              Voir la carte
            </Button>
            <Button href={ORDER_URL}>Commander</Button>
          </Reveal>
        </div>
      </SideMosaic>
    </section>
  );
}
