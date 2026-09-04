import { DELIVEROO_URL } from "@/config/site";
import styles from "./DeliverooButton.module.css";

type DeliverooButtonProps = {
  size?: "md" | "lg";
  className?: string;
  fullWidth?: boolean;
};

function cx(...parts: Array<string | false | undefined>) {
  return parts.filter(Boolean).join(" ");
}

export function DeliverooButton({
  size = "lg",
  className,
  fullWidth,
}: DeliverooButtonProps) {
  const ready = Boolean(DELIVEROO_URL);
  const classNames = cx(
    styles.button,
    styles[size],
    fullWidth && styles.fullWidth,
    !ready && styles.disabled,
    className,
  );

  const content = (
    <>
      <span className={styles.mark} aria-hidden>
        <span className={styles.d}>D</span>
      </span>
      <span className={styles.label}>
        <span className={styles.kicker}>
          {ready ? "Aussi sur" : "Bientôt sur"}
        </span>
        <span className={styles.brand}>Deliveroo</span>
      </span>
    </>
  );

  if (!ready) {
    return (
      <span
        className={classNames}
        role="link"
        aria-disabled="true"
        aria-label="Deliveroo — lien à venir"
        title="Lien Deliveroo à venir"
      >
        {content}
      </span>
    );
  }

  return (
    <a
      href={DELIVEROO_URL}
      className={classNames}
      target="_blank"
      rel="noopener noreferrer"
      aria-label="Commander sur Deliveroo — ouvre un nouvel onglet"
    >
      {content}
    </a>
  );
}
