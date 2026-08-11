import styles from "./SectionTitle.module.css";

interface SectionTitleProps {
  eyebrow?: string;
  title: string;
  text?: string;
  align?: "left" | "center";
  tone?: "dark" | "light";
  as?: "h1" | "h2" | "h3";
  className?: string;
}

export function SectionTitle({
  eyebrow,
  title,
  text,
  align = "left",
  tone = "dark",
  as: Tag = "h2",
  className,
}: SectionTitleProps) {
  return (
    <div
      className={[
        styles.root,
        styles[align],
        styles[tone],
        className,
      ]
        .filter(Boolean)
        .join(" ")}
    >
      {eyebrow ? <p className={styles.eyebrow}>{eyebrow}</p> : null}
      <Tag className={styles.title}>{title}</Tag>
      {text ? <p className={styles.text}>{text}</p> : null}
    </div>
  );
}
