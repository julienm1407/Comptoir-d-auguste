import type { OpeningHour } from "@/types";
import { demoRestaurant } from "@/data/demoRestaurant";
import { openingHours } from "@/data/demoContent";
import styles from "./RestaurantInfo.module.css";

export function RestaurantInfo() {
  const { address, phone, email, notes } = demoRestaurant;

  return (
    <div className={styles.root}>
      <div>
        <h3 className={styles.label}>Adresse</h3>
        <p>{address.full}</p>
      </div>
      <div>
        <h3 className={styles.label}>Téléphone</h3>
        <p>{phone}</p>
      </div>
      <div>
        <h3 className={styles.label}>E-mail</h3>
        <p>
          <a href={`mailto:${email}`}>{email}</a>
        </p>
      </div>
      {notes.length > 0 ? (
        <p className={styles.note}>{notes[0]}</p>
      ) : null}
    </div>
  );
}

export function OpeningHours({
  title = "Horaires",
  hours = openingHours,
}: {
  title?: string | null;
  hours?: OpeningHour[];
}) {
  return (
    <div className={styles.hours}>
      {title ? <h3 className={styles.label}>{title}</h3> : null}
      <ul className={styles.list}>
        {hours.map((item) => (
          <li key={item.day} className={styles.row}>
            <span>{item.day}</span>
            <span>{item.closed ? "Fermé" : item.hours}</span>
          </li>
        ))}
      </ul>
    </div>
  );
}
