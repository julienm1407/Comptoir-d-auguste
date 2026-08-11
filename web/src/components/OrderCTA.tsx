import { ORDER_URL } from "@/config/site";
import { Button } from "./Button";
import styles from "./OrderCTA.module.css";

interface OrderCTAProps {
  title?: string;
  text?: string;
  tone?: "dark" | "blue" | "ivory";
}

export function OrderCTA({
  title = "On vous prépare quoi ?",
  text = "Sur place, à emporter ou en livraison — une cuisine maison, prête pour vous.",
  tone = "dark",
}: OrderCTAProps) {
  return (
    <aside className={[styles.root, styles[tone]].join(" ")}>
      <div className={styles.copy}>
        <h2 className={styles.title}>{title}</h2>
        <p className={styles.text}>{text}</p>
      </div>
      <Button href={ORDER_URL} size="lg" variant={tone === "dark" ? "primary" : "primary"}>
        Commander
      </Button>
    </aside>
  );
}
