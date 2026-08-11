import styles from "./PageHero.module.css";

interface PageHeroProps {
  title: string;
  text?: string;
  eyebrow?: string;
}

export function PageHero({ title, text, eyebrow }: PageHeroProps) {
  return (
    <header className={styles.hero}>
      <div className={`container ${styles.inner}`}>
        {eyebrow ? <p className={styles.eyebrow}>{eyebrow}</p> : null}
        <h1 className={styles.title}>{title}</h1>
        {text ? <p className={styles.text}>{text}</p> : null}
      </div>
    </header>
  );
}
