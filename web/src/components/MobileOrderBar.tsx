import { ORDER_URL } from "@/config/site";
import { Button } from "./Button";
import styles from "./MobileOrderBar.module.css";

export function MobileOrderBar() {
  return (
    <div className={styles.bar} role="region" aria-label="Commande rapide">
      <Button href={ORDER_URL} fullWidth size="lg">
        Commander
      </Button>
    </div>
  );
}
