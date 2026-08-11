import type { Review } from "@/types";
import styles from "./ReviewCard.module.css";

interface ReviewCardProps {
  review: Review;
}

export function ReviewCard({ review }: ReviewCardProps) {
  return (
    <blockquote className={styles.card} data-placeholder={review.isPlaceholder || undefined}>
      <div className={styles.stars} aria-label={`${review.rating} sur 5`}>
        {"★".repeat(review.rating)}
        <span className={styles.starsEmpty}>{"★".repeat(5 - review.rating)}</span>
      </div>
      <p className={styles.text}>« {review.text} »</p>
      <footer className={styles.footer}>
        <cite className={styles.author}>{review.author}</cite>
        {review.isPlaceholder ? (
          <span className={styles.tag}>Placeholder</span>
        ) : null}
      </footer>
    </blockquote>
  );
}
