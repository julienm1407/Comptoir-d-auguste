"use client";

import { useState } from "react";
import { Button } from "./Button";
import styles from "./ContactForm.module.css";

export function ContactForm() {
  const [submitted, setSubmitted] = useState(false);

  return (
    <form
      className={styles.form}
      onSubmit={(event) => {
        event.preventDefault();
        setSubmitted(true);
      }}
    >
      <label className={styles.field}>
        <span>Nom</span>
        <input name="name" type="text" required autoComplete="name" />
      </label>
      <label className={styles.field}>
        <span>E-mail</span>
        <input name="email" type="email" required autoComplete="email" />
      </label>
      <label className={styles.field}>
        <span>Message</span>
        <textarea name="message" rows={5} required />
      </label>
      <Button type="submit">Envoyer</Button>
      {submitted ? (
        <p className={styles.success} role="status">
          Merci — le formulaire est en mode démonstration. L’envoi réel sera branché plus tard.
        </p>
      ) : null}
    </form>
  );
}
