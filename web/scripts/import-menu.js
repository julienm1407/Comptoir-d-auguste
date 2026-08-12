const fs = require("fs");
const path = require("path");
const XLSX = require("xlsx");

const excelPath = "H:/Téléchargement/Récap des produits.xlsx";
const outPath = path.join(__dirname, "../src/data/demoProducts.ts");

const wb = XLSX.readFile(excelPath);
const rows = XLSX.utils.sheet_to_json(wb.Sheets.ARTICLE, { defval: "" });

function slugify(s) {
  return s
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .toLowerCase()
    .replace(/œ/g, "oe")
    .replace(/æ/g, "ae")
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/^-|-$/g, "")
    .slice(0, 60);
}

function parsePrice(p) {
  return Number(String(p).replace(",", ".").replace(/[^\d.]/g, ""));
}

function splitNameDesc(article, fallbackDesc) {
  const idx = article.indexOf(" : ");
  if (idx > 0) {
    return {
      name: article.slice(0, idx).trim(),
      description: article.slice(idx + 3).trim().replace(/\.$/, "") + ".",
    };
  }
  return { name: article.trim(), description: fallbackDesc };
}

const familleToCat = {
  Entrées: "entrees",
  "Plats du moment": "plats-du-moment",
  "Salades repas": "salades",
  "Snaking gourmand (hors menu)": "snacking",
  Desserts: "desserts",
  "Nos Formules": "formules",
};

const descFallbacks = {
  "Œuf mimosa à la mayonaise maison":
    "Œuf mimosa et mayonnaise maison, une entrée classique et généreuse.",
  "Lasagnes aux legumes et pesto": "Lasagnes de légumes au pesto, cuisinées maison.",
  "Polpettes de bœuf, maccheroni et pecorino en sauce tomate":
    "Polpettes de bœuf, maccheroni et pecorino, nappés de sauce tomate.",
  "Hachis parmentier au canard confit à la creme de parmesan":
    "Hachis parmentier au canard confit, sublimé par une crème de parmesan.",
  "Sauté de veau aux carottes et champignons":
    "Sauté de veau mijoté avec carottes et champignons.",
  "Pavé de saumon sur son lit de confit de légumes":
    "Pavé de saumon posé sur un confit de légumes maison.",
  "Fondant au cholocat et sa crème anglaise": "Fondant au chocolat et sa crème anglaise.",
  "Tarte aux pommes": "Tarte aux pommes maison.",
  "Blanc manger aux abricots infusés au romarin":
    "Blanc-manger aux abricots infusés au romarin.",
  "Fromage blanc, marmelade de fuits rouges":
    "Fromage blanc et marmelade de fruits rouges.",
  "Cookie trois chocolats et noix": "Cookie aux trois chocolats et aux noix.",
  "Entrée + Plat + Dessert":
    "Formule complète : une entrée, un plat et un dessert au choix.",
  "Entrée + Plat": "Formule entrée et plat au choix.",
  "Plat + Dessert": "Formule plat et dessert au choix.",
};

function drinkDesc(name, famille) {
  const f = famille.toLowerCase();
  const n = name.toLowerCase();
  if (f.includes("eau plate")) return "Eau plate, servie bien fraîche.";
  if (f.includes("pétillante")) return "Eau pétillante, servie bien fraîche.";
  if (f.includes("soda")) return "Boisson fraîche, à déguster sur place ou à emporter.";
  if (f.includes("jus")) return "Jus de fruits premium, format individuel.";
  if (f.includes("biere") || f.includes("bière")) return "Bière artisanale bio Fanny, 33 cl.";
  if (f.includes("vin")) return "Vin AOC Côtes de Provence, cuvée 1992, 75 cl.";
  if (n.includes("thé")) return "Thé chaud, infusion au choix.";
  if (n.includes("chocolat")) return "Chocolat chaud onctueux.";
  if (n.includes("capuccino") || n.includes("cappuccino")) return "Cappuccino crémeux.";
  if (n.includes("noisette")) return "Café noisette.";
  if (n.includes("allongé")) return "Café allongé.";
  if (n.includes("expresso") || n.includes("espresso")) return "Espresso serré.";
  return "Boisson du comptoir.";
}

const images = {
  formules:
    "https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=900&q=80",
  entrees:
    "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=900&q=80",
  "plats-du-moment":
    "https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=900&q=80",
  salades:
    "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=900&q=80",
  snacking:
    "https://images.unsplash.com/photo-1528735602780-2552fd46c7af?auto=format&fit=crop&w=900&q=80",
  desserts:
    "https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=900&q=80",
  boissons:
    "https://images.unsplash.com/photo-1544145945-f90425340c7e?auto=format&fit=crop&w=900&q=80",
  "boissons-chaudes":
    "https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=900&q=80",
  oeuf: "https://images.unsplash.com/photo-1482049016688-2d3e1b311543?auto=format&fit=crop&w=900&q=80",
  lentilles:
    "https://images.unsplash.com/photo-1512058564366-18510be2db19?auto=format&fit=crop&w=900&q=80",
  aubergine:
    "https://images.unsplash.com/photo-1518779578993-ce4289cbd4d4?auto=format&fit=crop&w=900&q=80",
  lasagnes:
    "https://images.unsplash.com/photo-1574894709920-11b28e7367e3?auto=format&fit=crop&w=900&q=80",
  boeuf: "https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=900&q=80",
  canard:
    "https://images.unsplash.com/photo-1432139509613-5c4255815697?auto=format&fit=crop&w=900&q=80",
  veau: "https://images.unsplash.com/photo-1534939561126-855b8675edd7?auto=format&fit=crop&w=900&q=80",
  saumon:
    "https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=900&q=80",
  salade1:
    "https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=900&q=80",
  thon: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=900&q=80",
  poulpe:
    "https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=900&q=80",
  sandwich:
    "https://images.unsplash.com/photo-1528735602780-2552fd46c7af?auto=format&fit=crop&w=900&q=80",
  club: "https://images.unsplash.com/photo-1567234669003-dce7a7a88821?auto=format&fit=crop&w=900&q=80",
  croque:
    "https://images.unsplash.com/photo-1528736235302-52922df5c122?auto=format&fit=crop&w=900&q=80",
  tarte: "https://images.unsplash.com/photo-1467003909585-2f8a72700288?auto=format&fit=crop&w=900&q=80",
  fondant:
    "https://images.unsplash.com/photo-1606313564200-e75d5e30476c?auto=format&fit=crop&w=900&q=80",
  pommes:
    "https://images.unsplash.com/photo-1568571780765-9276ac8b75f0?auto=format&fit=crop&w=900&q=80",
  blanc: "https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=900&q=80",
  fromage:
    "https://images.unsplash.com/photo-1488477304112-4944851de5d0?auto=format&fit=crop&w=900&q=80",
  cookie:
    "https://images.unsplash.com/photo-1499636136210-6f4ee915583e?auto=format&fit=crop&w=900&q=80",
};

function pickImage(name, cat) {
  const n = name.toLowerCase();
  if (n.includes("mimosa") || n.includes("œuf") || n.includes("oeuf")) return images.oeuf;
  if (n.includes("lentille")) return images.lentilles;
  if (n.includes("aubergine")) return images.aubergine;
  if (n.includes("lasagne")) return images.lasagnes;
  if (n.includes("polpette") || n.includes("bœuf") || n.includes("boeuf")) return images.boeuf;
  if (n.includes("canard") || n.includes("parmentier")) return images.canard;
  if (n.includes("veau")) return images.veau;
  if (n.includes("saumon")) return images.saumon;
  if (n.includes("paysanne")) return images.salade1;
  if (n.includes("mediterr")) return images.thon;
  if (n.includes("auguste") || n.includes("poulpe") || n.includes("lobster")) return images.poulpe;
  if (n.includes("club")) return images.club;
  if (n.includes("truffe") || n.includes("madame")) return images.croque;
  if (n.includes("tarte sal")) return images.tarte;
  if (n.includes("fondant") || n.includes("cholocat") || n.includes("chocolat"))
    return images.fondant;
  if (n.includes("pommes")) return images.pommes;
  if (n.includes("blanc manger") || n.includes("blanc-manger")) return images.blanc;
  if (n.includes("fromage blanc")) return images.fromage;
  if (n.includes("cookie")) return images.cookie;
  return images[cat] || images["plats-du-moment"];
}

function tidy(s) {
  return s
    .replace(/mayonaise/gi, "mayonnaise")
    .replace(/mediterraneenne/gi, "méditerranéenne")
    .replace(/Mediterranéenne/g, "Méditerranéenne")
    .replace(/legumes/gi, "légumes")
    .replace(/cholocat/gi, "chocolat")
    .replace(/fuits/gi, "fruits")
    .replace(/creme/gi, "crème")
    .replace(/provencale/gi, "provençale")
    .replace(/Capuccino/g, "Cappuccino")
    .replace(/Expresso/g, "Espresso")
    .replace(/Fuit rouge/g, "Fruits rouges")
    .replace(/Multifuits/g, "Multifruits")
    .replace(/échélotte/gi, "échalote")
    .replace(/Blanc manger/g, "Blanc-manger");
}

function familyLabel(famille) {
  return famille
    .replace("Snaking gourmand (hors menu)", "Snacking gourmand")
    .replace("Nos Formules", "Formules")
    .replace("Biere", "Bières")
    .replace("Vin", "Vins")
    .replace("eau plate", "Eaux plates")
    .replace("eau pétillante", "Eaux pétillantes")
    .replace("soda", "Sodas & softs")
    .replace("jus de fruits", "Jus de fruits")
    .replace("Café", "Cafés & infusions");
}

let groupe = "";
let famille = "";
const products = [];
let i = 1;

for (const r of rows) {
  if (String(r.GROUPE || "").trim()) groupe = String(r.GROUPE).trim();
  if (String(r.FAMILLE || "").trim()) famille = String(r.FAMILLE).trim();
  const article = String(r.ARTICLE || "").trim();
  const prixRaw = String(r["PRIX 1"] || "").trim();
  if (!article || !prixRaw) continue;

  let categorySlug;
  if (groupe === "Boissons") categorySlug = "boissons";
  else if (groupe === "Boissons chaudes") categorySlug = "boissons-chaudes";
  else categorySlug = familleToCat[famille];
  if (!categorySlug) continue;

  const fallback = descFallbacks[article] || drinkDesc(article, famille);
  const split = splitNameDesc(article, fallback);
  const name = tidy(split.name);
  const description = tidy(split.description);
  const featured =
    name === "L'Auguste" ||
    name.startsWith("Pavé de saumon") ||
    name.startsWith("Polpettes") ||
    name.startsWith("Lasagnes") ||
    name === "La Méditerranéenne" ||
    name === "Entrée + Plat + Dessert";

  let badge;
  if (name === "Entrée + Plat + Dessert" || name === "L'Auguste") badge = "signature";
  else if (name.startsWith("Pavé de saumon")) badge = "de-saison";
  else if (name.startsWith("Lasagnes") || name.startsWith("Hachis")) badge = "du-jour";

  const product = {
    id: `prod-${i}`,
    slug: slugify(name),
    name,
    description,
    price: parsePrice(prixRaw),
    categorySlug,
    family: familyLabel(famille),
    image: pickImage(`${name} ${article}`, categorySlug),
    featured,
  };
  if (badge) product.badge = badge;
  products.push(product);
  i += 1;
}

const seen = new Map();
for (const p of products) {
  const base = p.slug;
  const n = (seen.get(base) || 0) + 1;
  seen.set(base, n);
  if (n > 1) p.slug = `${base}-${n}`;
}

const ts = `import type { Category, Product } from "@/types";

/**
 * Carte officielle Comptoir d'Auguste — basée sur le récap produits.
 * Images : photos libres temporaires (à remplacer par les visuels du restaurant).
 */

export const demoCategories: Category[] = [
  {
    id: "cat-formules",
    slug: "formules",
    name: "Formules",
    description: "Composez votre repas : entrée, plat et dessert au meilleur prix.",
    mosaic: "/brand/rameaux-olivier.png",
    showOnHome: true,
  },
  {
    id: "cat-entrees",
    slug: "entrees",
    name: "Entrées",
    description: "Pour commencer en douceur, tout fait maison.",
    mosaic: "/brand/huole-dolive.png",
    showOnHome: true,
  },
  {
    id: "cat-plats",
    slug: "plats-du-moment",
    name: "Plats du moment",
    description: "Les plats chauds du jour, généreux et cuisinés sur place.",
    mosaic: "/brand/viande-fleur.png",
    showOnHome: true,
  },
  {
    id: "cat-salades",
    slug: "salades",
    name: "Salades repas",
    description: "Des salades complètes, fraîches et méditerranéennes.",
    mosaic: "/brand/vegetarien-fleur.png",
    showOnHome: true,
  },
  {
    id: "cat-snacking",
    slug: "snacking",
    name: "Snacking gourmand",
    description: "Hors menu — sandwiches et gourmandises à emporter.",
    mosaic: "/brand/epicee-fleur.png",
    showOnHome: true,
  },
  {
    id: "cat-desserts",
    slug: "desserts",
    name: "Desserts",
    description: "La touche sucrée, préparée avec soin.",
    mosaic: "/brand/poisson-fleur.png",
    showOnHome: true,
  },
  {
    id: "cat-boissons",
    slug: "boissons",
    name: "Boissons",
    description: "Eaux, softs, jus, bières artisanales et vins de Provence.",
    mosaic: "/brand/cigalle.png",
    showOnHome: false,
  },
  {
    id: "cat-boissons-chaudes",
    slug: "boissons-chaudes",
    name: "Boissons chaudes",
    description: "Cafés, chocolat chaud et thé.",
    mosaic: "/brand/logo-a.png",
    showOnHome: false,
  },
];

export const demoProducts: Product[] = ${JSON.stringify(products, null, 2)};

export const homeCategories = demoCategories.filter((c) => c.showOnHome);

export const featuredProducts = demoProducts.filter((p) => p.featured);

export const dailySpecials = demoProducts.filter(
  (p) => p.badge === "du-jour" || p.badge === "de-saison" || p.featured,
);
`;

fs.writeFileSync(outPath, ts, "utf8");
console.log(`Wrote ${products.length} products to ${outPath}`);
console.log(
  [...new Set(products.map((p) => p.categorySlug))]
    .map((c) => `${c}: ${products.filter((p) => p.categorySlug === c).length}`)
    .join("\n"),
);
