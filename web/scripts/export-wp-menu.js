/**
 * Export demoProducts.ts → PHP snippets + sync helper for WP theme.
 */
const fs = require("fs");
const path = require("path");

const root = path.resolve(__dirname, "../..");
const tsPath = path.join(root, "web/src/data/demoProducts.ts");
const src = fs.readFileSync(tsPath, "utf8");

function extractArray(name) {
  const re = new RegExp(`export const ${name}[^=]*=\\s*`);
  const m = src.match(re);
  if (!m) throw new Error("no " + name);
  let i = m.index + m[0].length;
  while (src[i] && src[i] !== "[") i++;
  let depth = 0;
  const start = i;
  for (; i < src.length; i++) {
    if (src[i] === "[") depth++;
    else if (src[i] === "]") {
      depth--;
      if (depth === 0) return src.slice(start, i + 1);
    }
  }
  throw new Error("unclosed " + name);
}

function toJson(arrSrc) {
  let s = arrSrc.replace(/\/\*[\s\S]*?\*\//g, "");
  // Quote unquoted keys
  s = s.replace(/([{\[,]\s*)([A-Za-z_][A-Za-z0-9_]*)\s*:/g, '$1"$2":');
  // trailing commas
  s = s.replace(/,(\s*[}\]])/g, "$1");
  return JSON.parse(s);
}

function phpString(v) {
  if (v === null || v === undefined) return "null";
  if (typeof v === "boolean") return v ? "true" : "false";
  if (typeof v === "number") return String(v);
  return "'" + String(v).replace(/\\/g, "\\\\").replace(/'/g, "\\'") + "'";
}

function mosaicFile(mosaic) {
  if (!mosaic) return "logo-a.png";
  return mosaic.replace(/^\/brand\//, "");
}

const categories = toJson(extractArray("demoCategories"));
const products = toJson(extractArray("demoProducts"));

const catPhp = categories
  .map((c) => {
    return `        [
            'slug'        => ${phpString(c.slug)},
            'name'        => ${phpString(c.name)},
            'description' => ${phpString(c.description)},
            'mosaic'      => ${phpString(mosaicFile(c.mosaic))},
            'showOnHome'  => ${c.showOnHome === false ? "false" : "true"},
        ]`;
  })
  .join(",\n");

const prodPhp = products
  .map((p) => {
    const badge = p.badge ? phpString(p.badge) : "null";
    const family = p.family ? phpString(p.family) : "null";
    return `        [
            'slug'         => ${phpString(p.slug)},
            'name'         => ${phpString(p.name)},
            'description'  => ${phpString(p.description)},
            'price'        => ${p.price},
            'categorySlug' => ${phpString(p.categorySlug)},
            'family'       => ${family},
            'image'        => ${phpString(p.image)},
            'badge'        => ${badge},
            'featured'     => ${p.featured ? "true" : "false"},
        ]`;
  })
  .join(",\n");

const out = `<?php
/**
 * Auto-generated menu data — do not edit by hand.
 * Source: web/src/data/demoProducts.ts
 *
 * @package Comptoir_Auguste
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function ca_categories(): array
{
    return [
${catPhp}
    ];
}

function ca_products(): array
{
    return [
${prodPhp}
    ];
}

function ca_featured_products(): array
{
    return array_values(array_filter(ca_products(), static fn(array $p): bool => !empty($p['featured'])));
}

function ca_moment_products(): array
{
    return array_values(array_filter(
        ca_products(),
        static fn(array $p): bool => ($p['categorySlug'] ?? '') === 'plats-du-moment'
    ));
}

function ca_home_categories(): array
{
    return array_values(array_filter(
        ca_categories(),
        static fn(array $c): bool => ($c['showOnHome'] ?? true) !== false
    ));
}
`;

const outPath = path.join(root, "comptoir-auguste/inc/menu-data.php");
fs.writeFileSync(outPath, out, "utf8");
console.log("Wrote", outPath);
console.log("categories", categories.length, "products", products.length);
