import { UBER_EATS_URL } from "@/config/site";
import styles from "./UberEatsButton.module.css";

type UberEatsButtonProps = {
  size?: "md" | "lg";
  className?: string;
  fullWidth?: boolean;
};

function cx(...parts: Array<string | false | undefined>) {
  return parts.filter(Boolean).join(" ");
}

export function UberEatsButton({
  size = "lg",
  className,
  fullWidth,
}: UberEatsButtonProps) {
  return (
    <a
      href={UBER_EATS_URL}
      className={cx(
        styles.button,
        styles[size],
        fullWidth && styles.fullWidth,
        className,
      )}
      target="_blank"
      rel="noopener noreferrer"
      aria-label="Commander sur Uber Eats — ouvre un nouvel onglet"
    >
      <span className={styles.mark} aria-hidden>
        <span className={styles.u}>U</span>
      </span>
      <span className={styles.label}>
        <span className={styles.kicker}>Aussi sur</span>
        <span className={styles.brand}>Uber Eats</span>
      </span>
    </a>
  );
}
