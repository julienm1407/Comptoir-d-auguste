import { demoReviews } from "@/data/demoContent";
import { Reveal } from "@/components/Reveal";
import { ReviewCard } from "@/components/ReviewCard";
import { SectionTitle } from "@/components/SectionTitle";
import { SideMosaic } from "@/components/SideMosaic";
import styles from "./Reviews.module.css";

export function Reviews() {
  return (
    <section className={`section ${styles.section}`} aria-labelledby="reviews-title">
      <SideMosaic
        leftSrc="/brand/cutouts/mosaique-2-cutout.webp"
        rightSrc="/brand/cutouts/mosaique-3-cutout.webp"
        accentSrc="/brand/cutouts/mosaique-1-cutout.webp"
        variant="corners"
      >
        <div className="container">
          <Reveal>
            <SectionTitle
              title="Ils en parlent mieux que nous."
              text="Les avis ci-dessous sont des placeholders. Les vrais retours clients seront intégrés prochainement (Google Reviews)."
            />
          </Reveal>

          <div className={styles.grid}>
            {demoReviews.map((review) => (
              <Reveal key={review.id}>
                <ReviewCard review={review} />
              </Reveal>
            ))}
          </div>
        </div>
      </SideMosaic>
    </section>
  );
}
