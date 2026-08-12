/**
 * Convert Next CSS modules → WordPress ca-* CSS and patch theme.css
 */
const fs = require("fs");
const path = require("path");

const root = path.resolve(__dirname, "../..");
const themeCssPath = path.join(root, "comptoir-auguste/assets/css/theme.css");

const modules = [
  { file: "web/src/sections/DeliveryHome.module.css", prefix: "DeliveryHome" },
  { file: "web/src/sections/BrandDna.module.css", prefix: "BrandDna" },
  { file: "web/src/sections/Reviews.module.css", prefix: "Reviews" },
  { file: "web/src/sections/Location.module.css", prefix: "Location" },
  { file: "web/src/components/SideMosaic.module.css", prefix: "SideMosaic" },
  { file: "web/src/components/Header.module.css", prefix: "Header" },
  { file: "web/src/app/notre-histoire/page.module.css", prefix: "page-notre-histoire" },
  { file: "web/src/app/carte/page.module.css", prefix: "page-carte" },
];

function convert(css, prefix) {
  // .foo → .ca-Prefix-foo ; .foo.bar → .ca-Prefix-foo.ca-Prefix-bar
  // keep @media, :hover, :focus etc.
  return css.replace(/\.([a-zA-Z_][\w-]*)/g, (m, name, offset, str) => {
    // skip if inside a url() or already ca-
    const before = str.slice(Math.max(0, offset - 20), offset);
    if (/url\s*\(\s*['"]?[^)'"]*$/.test(before)) return m;
    if (name.startsWith("ca-")) return m;
    return `.ca-${prefix}-${name}`;
  });
}

let theme = fs.readFileSync(themeCssPath, "utf8");

for (const mod of modules) {
  const srcPath = path.join(root, mod.file);
  const raw = fs.readFileSync(srcPath, "utf8");
  const converted = convert(raw, mod.prefix);
  const markerStart = `/* === AUTO:${mod.prefix} === */`;
  const markerEnd = `/* === /AUTO:${mod.prefix} === */`;
  const block = `${markerStart}\n${converted}\n${markerEnd}`;

  const re = new RegExp(
    `/\\* === AUTO:${mod.prefix.replace(/[.*+?^${}()|[\]\\]/g, "\\$&")} === \\*/[\\s\\S]*?/\\* === /AUTO:${mod.prefix.replace(/[.*+?^${}()|[\]\\]/g, "\\$&")} === \\*/`,
    "m",
  );

  if (re.test(theme)) {
    theme = theme.replace(re, block);
  } else {
    theme += `\n\n${block}\n`;
  }
  console.log("patched", mod.prefix);
}

fs.writeFileSync(themeCssPath, theme, "utf8");
console.log("Wrote", themeCssPath);
