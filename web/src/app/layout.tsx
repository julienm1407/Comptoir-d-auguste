import type { Metadata } from "next";
import localFont from "next/font/local";
import { Inter } from "next/font/google";
import { Footer } from "@/components/Footer";
import { Header } from "@/components/Header";
import { MobileOrderBar } from "@/components/MobileOrderBar";
import { SITE_URL } from "@/config/site";
import { officialBrandCopy } from "@/data/demoRestaurant";
import "@/styles/globals.css";

const inter = Inter({
  subsets: ["latin"],
  variable: "--font-inter",
  display: "swap",
});

/** Police principale d’affichage — Roman SD */
const romanSd = localFont({
  src: "../fonts/RomanSD.ttf",
  variable: "--font-romane",
  display: "swap",
  weight: "400",
  style: "normal",
});

export const metadata: Metadata = {
  metadataBase: new URL(SITE_URL),
  title: {
    default: `${officialBrandCopy.name} — ${officialBrandCopy.signature}`,
    template: `%s — ${officialBrandCopy.name}`,
  },
  description:
    "Cuisine généreuse inspirée de la Provence et de la Méditerranée, entièrement faite maison. Commandez en livraison, à emporter ou sur place.",
  openGraph: {
    type: "website",
    locale: "fr_FR",
    siteName: officialBrandCopy.name,
    title: `${officialBrandCopy.name} — ${officialBrandCopy.signature}`,
    description:
      "Une cuisine sincère, conviviale et préparée avec passion. Plats du jour, salades, gourmandises et desserts maison.",
    images: [{ url: "/brand/logo-principal.png" }],
  },
  alternates: {
    canonical: "/",
  },
  icons: {
    icon: "/brand/logo-a.png",
    apple: "/brand/logo-principal.png",
  },
};

const restaurantSchema = {
  "@context": "https://schema.org",
  "@type": ["Restaurant", "LocalBusiness"],
  name: officialBrandCopy.name,
  description: officialBrandCopy.intro,
  servesCuisine: ["Provençal", "Méditerranéenne", "Cuisine maison"],
  url: SITE_URL,
  image: `${SITE_URL}/brand/logo-principal.png`,
  acceptsReservations: false,
};

export default function RootLayout({ children }: LayoutProps<"/">) {
  return (
    <html lang="fr" className={`${inter.variable} ${romanSd.variable}`}>
      <body>
        <script
          type="application/ld+json"
          dangerouslySetInnerHTML={{ __html: JSON.stringify(restaurantSchema) }}
        />
        <a href="#contenu" className="skip-link">
          Aller au contenu
        </a>
        <Header />
        <main id="contenu" className="site-main">
          {children}
        </main>
        <Footer />
        <MobileOrderBar />
      </body>
    </html>
  );
}
