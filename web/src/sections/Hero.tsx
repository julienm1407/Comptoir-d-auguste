"use client";

import Image from "next/image";
import { useCallback, useEffect, useState } from "react";
import { ORDER_URL } from "@/config/site";
import { Button } from "@/components/Button";
import styles from "./Hero.module.css";

const slides = [
  {
    src: "https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=1800&q=80",
    alt: "Assiette fraîche de cuisine maison",
  },
  {
    src: "https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1800&q=80",
    alt: "Plat généreux méditerranéen",
  },
  {
    src: "https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=1800&q=80",
    alt: "Poisson grillé maison",
  },
  {
    src: "https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1800&q=80",
    alt: "Cuisine préparée avec passion",
  },
];

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
