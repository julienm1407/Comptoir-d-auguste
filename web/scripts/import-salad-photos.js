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

const prefix =
  "c__Users_User_AppData_Roaming_Cursor_User_workspaceStorage_da7c980b0d9a7594691440a03e738a02_images_";

const jobs = [
  // méditerranéenne — thon, œuf
  ["1000092727-8b634837-861d-4fc1-ba8b-f7c8e93bad6b.jpg", "salade-mediterraneenne.jpg"],
  // l'Auguste — poulpe
  ["1000092731-1a908f19-594b-4f17-836a-4b229572fada.jpg", "salade-auguste.jpg"],
  // paysanne — lard, pommes grenaille
  ["1000092729-6310ec80-7051-4c42-b59f-9a6525a29ada.jpg", "salade-paysanne.jpg"],
];

(async () => {
  for (const [srcName, outName] of jobs) {
    const src = path.join(assets, prefix + srcName);
    if (!fs.existsSync(src)) {
      console.error("MISSING", srcName);
      continue;
    }
    const out = path.join(web, outName);
    await sharp(src)
      .rotate()
      .resize({ width: 1200, height: 1200, fit: "cover", position: "centre" })
      .jpeg({ quality: 82, mozjpeg: true })
      .toFile(out);
    fs.copyFileSync(out, path.join(wp, outName));
    console.log("ok", outName, fs.statSync(out).size);
  }
})().catch((e) => {
  console.error(e);
  process.exit(1);
});
