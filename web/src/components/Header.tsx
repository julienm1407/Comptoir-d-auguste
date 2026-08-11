"use client";

import Image from "next/image";
import Link from "next/link";
import { useEffect, useState } from "react";
import { NAV_LINKS, ORDER_URL } from "@/config/site";
import { Button } from "./Button";
import styles from "./Header.module.css";

export function Header() {
  const [scrolled, setScrolled] = useState(false);
  const [open, setOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 8);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  useEffect(() => {
    document.body.style.overflow = open ? "hidden" : "";
    return () => {
      document.body.style.overflow = "";
    };
  }, [open]);

  return (
    <header className={[styles.header, scrolled ? styles.scrolled : ""].join(" ")}>
      <div className={`container ${styles.inner}`}>
        <Link href="/" className={styles.logo} aria-label="Comptoir d’Auguste — Accueil">
          <Image
            src="/brand/logo-titre-horizontal.png"
            alt="Comptoir d’Auguste"
            width={320}
            height={72}
            className={styles.logoImage}
            priority
          />
        </Link>

        <nav className={styles.nav} aria-label="Navigation principale">
          {NAV_LINKS.map((link) => (
            <Link key={link.href} href={link.href} className={styles.link}>
              {link.label}
            </Link>
          ))}
        </nav>

        <div className={styles.actions}>
          <Button href={ORDER_URL} size="sm" className={styles.desktopCta}>
            Commander
          </Button>
          <Button href={ORDER_URL} size="sm" className={styles.mobileCta}>
            Commander
          </Button>
          <button
            type="button"
            className={[styles.menuButton, open ? styles.menuOpen : ""].join(" ")}
            aria-expanded={open}
            aria-controls="mobile-menu"
            aria-label={open ? "Fermer le menu" : "Ouvrir le menu"}
            onClick={() => setOpen((v) => !v)}
          >
            <span />
            <span />
            <span />
          </button>
        </div>
      </div>

      <div
        id="mobile-menu"
        className={[styles.mobilePanel, open ? styles.mobileOpen : ""].join(" ")}
        hidden={!open}
      >
        <nav className={styles.mobileNav} aria-label="Navigation mobile">
          {NAV_LINKS.map((link) => (
            <Link
              key={link.href}
              href={link.href}
              className={styles.mobileLink}
              onClick={() => setOpen(false)}
            >
              {link.label}
            </Link>
          ))}
          <div className={styles.mobileOrder}>
            <Button href={ORDER_URL} fullWidth>
              Commander
            </Button>
          </div>
        </nav>
      </div>
    </header>
  );
}
