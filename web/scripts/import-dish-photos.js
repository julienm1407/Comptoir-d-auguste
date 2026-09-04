const sharp = require("sharp");
const path = require("path");
const fs = require("fs");

const assets =
  "C:/Users/User/.cursor/projects/c-Users-User-Projects-Comptoir-d-auguste/assets";
const web =
  "C:/Users/User/Projects/Comptoir-d-auguste/web/public/brand/dishes";
const wp =
  "C:/Users/User/Projects/Comptoir-d-auguste/comptoir-auguste/assets/images/brand/dishes";

fs.mkdirSync(web, { recursive: true });
fs.mkdirSync(wp, { recursive: true });

const jobs = [
  ["IMG_4088-2f22467b-0844-4a62-b231-c164d01e514e.jpg", "polpettes.jpg", 1200],
  ["IMG_4075-b76e96e2-9a48-467e-868b-4987eb87df9d.jpg", "lasagne.jpg", 1200],
  ["IMG_4055-0357227f-1770-4e2d-a958-50f0bcb51fc9.jpg", "saumon.jpg", 1200],
  ["IMG_4060-f1bc3e2f-71dd-4c9d-ba6b-e30fbe9766c2.jpg", "saute-veau.jpg", 1200],
  ["IMG_4034-7f4fce3d-103c-4788-98c3-7af1fffc7e36.jpg", "lobster-roll.jpg", 1200],
  ["IMG_4049-1fe26c98-ce52-4b02-b2eb-bc9d1b0343a2.jpg", "salade-auguste.jpg", 1200],
  ["IMG_4097-c5a5e120-4dc8-4a86-837c-7cefef572e24.jpg", "caviar-aubergine.jpg", 1200],
  ["IMG_4082-1ef7e4ed-b84b-4d25-8e14-191da82bff20.jpg", "auguste-polpettes.jpg", 1800, 1200],
  ["IMG_4074-ec4296e3-3e78-4b9c-bed0-3e126accd474.jpg", "auguste-lasagne.jpg", 1800, 1200],
];

function resolveSrc(shortName) {
  const prefix =
    "c__Users_User_AppData_Roaming_Cursor_User_workspaceStorage_da7c980b0d9a7594691440a03e738a02_images_";
  const full = path.join(assets, prefix + shortName);
  if (fs.existsSync(full)) return full;
  const hit = fs.readdirSync(assets).find((f) => f.includes(shortName.split("-")[0]));
  return hit ? path.join(assets, hit) : null;
}

(async () => {
  for (const job of jobs) {
    const [srcName, outName, width, height = width] = job;
    const src = resolveSrc(srcName);
    if (!src) {
      console.error("MISSING", srcName);
      continue;
    }
    const outWeb = path.join(web, outName);
    await sharp(src)
      .rotate()
      .resize({ width, height, fit: "cover", position: "centre" })
      .jpeg({ quality: 82, mozjpeg: true })
      .toFile(outWeb);
    fs.copyFileSync(outWeb, path.join(wp, outName));
    console.log("ok", outName, fs.statSync(outWeb).size);
  }
})().catch((e) => {
  console.error(e);
  process.exit(1);
});
