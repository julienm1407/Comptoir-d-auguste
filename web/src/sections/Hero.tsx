"use client";

import Image from "next/image";
import Link from "next/link";
import { useCallback, useEffect, useState } from "react";
import { ORDER_URL } from "@/config/site";
import { demoProducts, featuredProducts } from "@/data/demoProducts";
import { Button } from "@/components/Button";
import styles from "./Hero.module.css";

const slides = [
  {
    src: "/brand/devanture.jpg",
    alt: "Devanture du Comptoir d’Auguste à La Seyne-sur-Mer",
  },
  {
    src: "/brand/dishes/polpettes.jpg",
    alt: "Polpettes de bœuf et maccheroni",
  },
  {
    src: "/brand/dishes/salade-mediterraneenne.jpg",
    alt: "Salade Méditerranéenne — thon, œuf et légumes",
  },
  {
    src: "/brand/dishes/salade-paysanne.jpg",
    alt: "Salade Paysanne — lard grillé et pommes grenaille",
  },
];

const spotlight =
  demoProducts.find(
    (p) => p.slug === "saute-de-veau-aux-carottes-et-champignons",
  ) ?? featuredProducts[0];

export function Hero() {
  const [index, setIndex] = useState(0);
  const [paused, setPaused] = useState(false);

  const goTo = useCallback((next: number) => {
    setIndex((next + slides.length) % slides.length);
  }, []);

  useEffect(() => {
    if (paused) return;
    const id = window.setInterval(() => {
      setIndex((current) => (current + 1) % slides.length);
    }, 5200);
    return () => window.clearInterval(id);
  }, [paused]);

  return (
    <section
      className={styles.hero}
      aria-labelledby="hero-title"
      onMouseEnter={() => setPaused(true)}
      onMouseLeave={() => setPaused(false)}
    >
      <div className={styles.carousel} aria-hidden>
        {slides.map((slide, i) => (
          <div
            key={slide.src}
            className={[styles.slide, i === index ? styles.slideActive : ""].join(" ")}
          >
            <Image
              src={slide.src}
              alt=""
              fill
              priority={i === 0}
              sizes="100vw"
              className={styles.slideImage}
            />
          </div>
        ))}
        <div className={styles.shade} />
      </div>

      <div className={styles.stage}>
        <div className={styles.content}>
          <div className={styles.brandRow}>
            <div className={styles.brandLogoWrap}>
              {/* img natif pour conserver l’animation du GIF */}
              {/* eslint-disable-next-line @next/next/no-img-element */}
              <img
                src="/brand/logo-carousel.gif"
                alt=""
                width={180}
                height={180}
                className={styles.brandLogo}
              />
            </div>
            <p className={styles.brandName}>Comptoir d’Auguste</p>
          </div>
          <h1 id="hero-title" className={styles.title}>
            L’art de la cuisine maison.
          </h1>
          <p className={styles.text}>
            Inspiré des saveurs de la Provence et de la Méditerranée — une cuisine
            généreuse, entièrement faite maison.
          </p>
          <Button href={ORDER_URL} size="lg" className={styles.cta}>
            Commander
          </Button>
        </div>

        {spotlight ? (
          <aside className={styles.spotlight} aria-labelledby="spotlight-title">
            <Link href="/carte" className={styles.spotlightCard}>
              <p id="spotlight-title" className={styles.spotlightLabel}>
                À l’affiche
              </p>
              <div className={styles.spotlightMedia}>
                <Image
                  src={spotlight.image}
                  alt={spotlight.name}
                  fill
                  sizes="(max-width: 768px) 100vw, 22rem"
                  className={styles.spotlightImage}
                />
              </div>
              <div className={styles.spotlightBody}>
                <h2 className={styles.spotlightName}>{spotlight.name}</h2>
              </div>
            </Link>
          </aside>
        ) : null}
      </div>

      <div className={styles.controls}>
        <div className={styles.dots} role="tablist" aria-label="Diapositives">
          {slides.map((slide, i) => (
            <button
              key={slide.src}
              type="button"
              role="tab"
              aria-selected={i === index}
              aria-label={`Image ${i + 1}`}
              className={[styles.dot, i === index ? styles.dotActive : ""].join(" ")}
              onClick={() => goTo(i)}
            />
          ))}
        </div>
        <div className={styles.arrows}>
          <button
            type="button"
            className={styles.arrow}
            aria-label="Image précédente"
            onClick={() => goTo(index - 1)}
          >
            ←
          </button>
          <button
            type="button"
            className={styles.arrow}
            aria-label="Image suivante"
            onClick={() => goTo(index + 1)}
          >
            →
          </button>
        </div>
      </div>
    </section>
  );
}
