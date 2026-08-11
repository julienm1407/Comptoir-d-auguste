import styles from "./MosaicPattern.module.css";

interface MosaicPatternProps {
  variant?: "band" | "corner" | "hero" | "dense";
  className?: string;
  "aria-hidden"?: boolean;
}

export function MosaicPattern({
  variant = "band",
  className,
  "aria-hidden": ariaHidden = true,
}: MosaicPatternProps) {
  return (
    <div
      className={[styles.root, styles[variant], className].filter(Boolean).join(" ")}
      aria-hidden={ariaHidden}
    >
      <svg viewBox="0 0 400 120" className={styles.svg} preserveAspectRatio="none">
        <rect x="0" y="0" width="48" height="48" fill="var(--color-bronze)" opacity="0.9" />
        <rect x="52" y="0" width="28" height="28" fill="var(--color-blue)" opacity="0.85" />
        <rect x="84" y="0" width="36" height="48" fill="var(--color-dark)" opacity="0.35" />
        <rect x="124" y="8" width="40" height="40" fill="var(--color-bronze)" opacity="0.55" />
        <rect x="168" y="0" width="24" height="24" fill="var(--color-blue)" />
        <rect x="196" y="0" width="52" height="36" fill="var(--color-bronze)" opacity="0.75" />
        <rect x="252" y="12" width="32" height="32" fill="var(--color-dark)" opacity="0.28" />
        <rect x="288" y="0" width="44" height="44" fill="var(--color-blue)" opacity="0.7" />
        <rect x="336" y="4" width="28" height="28" fill="var(--color-bronze)" />
        <rect x="368" y="0" width="32" height="48" fill="var(--color-blue)" opacity="0.5" />

        <rect x="8" y="52" width="36" height="36" fill="var(--color-blue)" opacity="0.65" />
        <rect x="48" y="56" width="48" height="28" fill="var(--color-bronze)" opacity="0.4" />
        <rect x="100" y="52" width="24" height="48" fill="var(--color-dark)" opacity="0.22" />
        <rect x="128" y="60" width="40" height="40" fill="var(--color-blue)" opacity="0.8" />
        <rect x="172" y="52" width="56" height="32" fill="var(--color-bronze)" opacity="0.7" />
        <rect x="232" y="56" width="28" height="28" fill="var(--color-blue)" />
        <rect x="264" y="52" width="40" height="48" fill="var(--color-bronze)" opacity="0.35" />
        <rect x="308" y="60" width="36" height="36" fill="var(--color-dark)" opacity="0.25" />
        <rect x="348" y="52" width="44" height="28" fill="var(--color-blue)" opacity="0.55" />
      </svg>
    </div>
  );
}
