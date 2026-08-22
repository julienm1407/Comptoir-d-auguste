/**
 * Convert Next CSS modules → WordPress ca-* CSS and patch theme.css
 */
const fs = require("fs");
const path = require("path");

const root = path.resolve(__dirname, "../..");
const themeCssPath = path.join(root, "comptoir-auguste/assets/css/theme.css");

const modules = [
  { file: "web/src/sections/Hero.module.css", prefix: "Hero" },
  { file: "web/src/sections/OrderModes.module.css", prefix: "OrderModes" },
  { file: "web/src/sections/MenuPreview.module.css", prefix: "MenuPreview" },
  { file: "web/src/sections/FeaturedDishes.module.css", prefix: "FeaturedDishes" },
  { file: "web/src/sections/DeliveryHome.module.css", prefix: "DeliveryHome" },
  { file: "web/src/sections/BrandDna.module.css", prefix: "BrandDna" },
  { file: "web/src/sections/Reviews.module.css", prefix: "Reviews" },
  { file: "web/src/sections/Location.module.css", prefix: "Location" },
  { file: "web/src/sections/MosaicInset.module.css", prefix: "MosaicInset" },
  { file: "web/src/sections/MosaicBand.module.css", prefix: "MosaicBand" },
  { file: "web/src/sections/FreshSeason.module.css", prefix: "FreshSeason" },
  { file: "web/src/components/SideMosaic.module.css", prefix: "SideMosaic" },
  { file: "web/src/components/Header.module.css", prefix: "Header" },
  { file: "web/src/components/ProductCard.module.css", prefix: "ProductCard" },
  { file: "web/src/components/CategoryCard.module.css", prefix: "CategoryCard" },
  { file: "web/src/components/OrderCTA.module.css", prefix: "OrderCTA" },
  { file: "web/src/components/UberEatsButton.module.css", prefix: "UberEatsButton" },
  { file: "web/src/components/PageHero.module.css", prefix: "PageHero" },
  { file: "web/src/app/livraison/page.module.css", prefix: "page-livraison" },
  { file: "web/src/app/notre-histoire/page.module.css", prefix: "page-notre-histoire" },
  { file: "web/src/app/carte/page.module.css", prefix: "page-carte" },
];

function convert(css, prefix) {
  // .foo → .ca-Prefix-foo ; .foo.bar → .ca-Prefix-foo.ca-Prefix-bar
  return css.replace(/\.([a-zA-Z_][\w-]*)/g, (m, name, offset, str) => {
    const before = str.slice(Math.max(0, offset - 20), offset);
    if (/url\s*\(\s*['"]?[^)'"]*$/.test(before)) return m;
    if (name.startsWith("ca-")) return m;
    return `.ca-${prefix}-${name}`;
  });
}

function stripExistingBlock(theme, prefix) {
  const escaped = prefix.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
  // AUTO markers
  const autoRe = new RegExp(
    `/\\* === AUTO:${escaped} === \\*/[\\s\\S]*?/\\* === \\/AUTO:${escaped} === \\*/\\s*`,
    "m",
  );
  theme = theme.replace(autoRe, "");

  // Legacy comment blocks: /* === ... ca-Prefix-* === */ … until next /* ===
  const legacyRe = new RegExp(
    `/\\* ===[^*]*ca-${escaped}-\\*[^*]*=== \\*/[\\s\\S]*?(?=/\\* ===|$)`,
    "m",
  );
  theme = theme.replace(legacyRe, "");

  return theme;
}

let theme = fs.readFileSync(themeCssPath, "utf8");

for (const mod of modules) {
  const srcPath = path.join(root, mod.file);
  if (!fs.existsSync(srcPath)) {
    console.warn("skip missing", mod.file);
    continue;
  }
  const raw = fs.readFileSync(srcPath, "utf8");
  const converted = convert(raw, mod.prefix);
  const markerStart = `/* === AUTO:${mod.prefix} === */`;
  const markerEnd = `/* === /AUTO:${mod.prefix} === */`;
  const block = `${markerStart}\n${converted}\n${markerEnd}\n`;

  theme = stripExistingBlock(theme, mod.prefix);
  theme = theme.replace(/\s+$/, "\n") + "\n" + block;
  console.log("patched", mod.prefix);
}

fs.writeFileSync(themeCssPath, theme, "utf8");
console.log("Wrote", themeCssPath);
