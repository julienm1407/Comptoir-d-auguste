# Comptoir d’Auguste — Site web

Frontend Next.js du site officiel **Comptoir d’Auguste**.

Signature : *L’art de la cuisine maison*

## Démarrage

```bash
cd web
npm install
npm run dev
```

Ouvrir [http://localhost:3000](http://localhost:3000).

## Architecture

```
src/
  app/           # Routes (App Router)
  components/    # UI réutilisable
  sections/      # Blocs de page (Home…)
  data/          # Données démo isolées
  config/        # ORDER_URL, navigation…
  styles/        # Design system (tokens + globals)
  types/         # Types partagés
  utils/         # Helpers
public/brand/    # Assets identité
```

## Données démo → WordPress / WooCommerce

| Source actuelle        | Cible CMS                          |
|------------------------|------------------------------------|
| `demoProducts`         | WooCommerce Products               |
| `demoCategories`       | Product Categories                 |
| `featuredProducts`     | Featured products / CPT            |
| `demoArticles`         | WordPress Posts                    |
| `demoRestaurant`       | Options / ACF                      |
| `openingHours`         | Options / ACF                      |
| `demoReviews`          | Google Reviews (futur)             |

URLs commande : `ORDER_URL`, `CART_URL`, `CHECKOUT_URL` dans `src/config/site.ts` (via `.env`).

## Typographie

- **Roman SD** : police d’affichage (`src/fonts/RomanSD.ttf`) — titres, slogans, accroches
- **Inter** : navigation, textes, boutons (`next/font`)

## Scripts

- `npm run dev` — développement
- `npm run build` — build production
- `npm run start` — serveur production
