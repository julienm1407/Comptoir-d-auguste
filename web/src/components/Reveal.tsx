"use client";

import { useEffect, useRef, type ElementType, type ReactNode } from "react";

interface RevealProps {
  children: ReactNode;
  className?: string;
  as?: ElementType;
}

export function Reveal({ children, className, as: Tag = "div" }: RevealProps) {
  const ref = useRef<HTMLElement | null>(null);

  useEffect(() => {
    const node = ref.current;
    if (!node) return;

    const show = () => {
      if (!node.classList.contains("is-visible")) {
        node.classList.add("is-visible");
      }
    };

    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      show();
      return;
    }

    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          show();
          observer.disconnect();
        }
      },
      { root: null, threshold: 0.01, rootMargin: "100px 0px" },
    );

    observer.observe(node);

    // Never leave content stuck invisible (hash jumps, HMR, IO edge cases)
    const fallback = window.setTimeout(show, 900);

    return () => {
      observer.disconnect();
      window.clearTimeout(fallback);
    };
  }, []);

  return (
    <Tag ref={ref} className={["reveal", className].filter(Boolean).join(" ")}>
      {children}
    </Tag>
  );
}
