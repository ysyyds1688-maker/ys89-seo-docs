# 2 衛星站生圖清單（部署前必要）

> 只列「真的要重新生」的 4 張圖
> 生完照下方 SOP 替換到 HTML

---

## 🟢 推薦工具：Midjourney v6 或 ChatGPT (DALL-E 3)

每張圖生 4 個版本選最好的那個。生完用 [Squoosh.app](https://squoosh.app/) 壓成 WebP (quality 75)。

---

## 🏨 PANSURIHOTEL — 旅遊雜誌風（暖橘 + 自然色）

### 1. pansurihotel Hero 圖（封面用）
- **檔名**：`hero-world-cup-cities.webp`
- **比例**：16:10（800×500 或 1200×750）
- **用途**：取代首頁 featured 區塊的 🌎 emoji

**Midjourney v6 prompt**：
```
Editorial travel magazine cover photo style, aerial view of vibrant North American cities skyline (New York Manhattan + Mexico City + Toronto) blended together at golden hour, warm amber and orange tones, soccer stadium silhouette in distance, vintage National Geographic aesthetic, cinematic depth of field, no text, no logos --ar 16:10 --style raw --v 6
```

**ChatGPT DALL-E 3 prompt**：
```
A cinematic 16:10 editorial travel magazine cover photo. Aerial cityscape blending New York Manhattan skyline with Mexico City and Toronto silhouettes at golden hour. Warm amber, orange, and rust color palette. Soccer stadium silhouette barely visible in distance. Vintage National Geographic aesthetic with cinematic depth of field. Warm beige sky with golden sunset light. No text, no logos.
```

---

### 2. Allen 林志雄 作者頭像
- **檔名**：`avatar-allen.png`
- **比例**：1:1（500×500）
- **用途**：取代 sidebar 的 ✈️ emoji + 文章末 author bio

**Midjourney v6 prompt**：
```
Hand-drawn illustration portrait of a 32-year-old Asian male travel writer, casual khaki photographer jacket, light beard, friendly approachable expression, holding a small notebook, warm amber and orange watercolor background, vintage travel illustration style, sepia tones with golden hour light, anime-inspired but mature professional vibe, half-body, looking slightly off-camera --ar 1:1 --style raw --v 6
```

**ChatGPT DALL-E 3 prompt**：
```
A warm hand-drawn illustration portrait of a 32-year-old Asian male travel writer named Allen. He wears a casual khaki photographer jacket with a light beard and friendly approachable expression. Holding a small leather notebook. Warm watercolor background in amber, orange, and rust tones. Vintage travel illustration style with sepia accents and golden hour lighting. Square 1:1 format, half-body composition, looking slightly off-camera. Anime-inspired but mature professional aesthetic.
```

---

## 🌿 PLAINJANEDESIGNERS — Editorial 雜誌風（米白 + 深綠）

### 3. plainjanedesigners Lead Visual
- **檔名**：`hero-minimal-life.webp`
- **比例**：4:5（直式，800×1000）
- **用途**：取代 lead section 左側的 🍃 emoji

**Midjourney v6 prompt**：
```
Minimalist still life photography, single ceramic cup of green tea on bare wooden table, eucalyptus branch in white vase, open notebook with fountain pen, soft natural window light from left, Japanese wabi-sabi aesthetic, deep forest green and warm cream color palette, magazine editorial style, soft shadows, low contrast, contemplative slow living atmosphere, no text --ar 4:5 --style raw --v 6
```

**ChatGPT DALL-E 3 prompt**：
```
A minimalist still life photograph in editorial magazine style. Single white ceramic cup of green tea on a bare light wooden table. Eucalyptus branch in a small white vase. Open notebook with fountain pen beside the cup. Soft natural window light from the left. Japanese wabi-sabi aesthetic. Color palette: deep forest green, warm cream, soft beige, hints of sage. Soft shadows, low contrast. Contemplative slow living atmosphere. 4:5 vertical format. No text or logos.
```

---

### 4. Daniel 吳 作者頭像
- **檔名**：`avatar-daniel.png`
- **比例**：1:1（500×500）
- **用途**：取代 sidebar 作者區的 🌿 emoji

**Midjourney v6 prompt**：
```
Hand-drawn minimalist portrait illustration of a 30-year-old Asian male in plain white linen shirt, calm peaceful expression, short black hair, simple beige background with subtle eucalyptus leaves, soft watercolor minimalist art style, sage green and cream tones, looking forward calmly, editorial illustration aesthetic, no glasses, slight smile --ar 1:1 --style raw --v 6
```

**ChatGPT DALL-E 3 prompt**：
```
A hand-drawn minimalist portrait illustration of a 30-year-old Asian male named Daniel. He wears a plain white linen shirt with a calm peaceful expression. Short black hair, slight smile. Simple beige background with subtle eucalyptus leaves in pale sage green. Soft watercolor minimalist art style. Color palette: sage green, cream, warm beige. Looking forward calmly. Editorial illustration aesthetic. 1:1 square format. No glasses.
```

---

## 📦 部署 SOP（生完圖後照做）

### Step 1：壓縮圖片
1. 把生出來的圖打開 [Squoosh.app](https://squoosh.app/)
2. 右側選 WebP，quality 75
3. 下載，檔名照上面指定

### Step 2：放到對應資料夾
```bash
# pansurihotel
mv ~/Downloads/hero-world-cup-cities.webp "/Users/user/Desktop/YS89-專案整理/1-衛星站PBN/2026-世足PBN擴展/pansurihotel-com/"
mv ~/Downloads/avatar-allen.png "/Users/user/Desktop/YS89-專案整理/1-衛星站PBN/2026-世足PBN擴展/pansurihotel-com/"

# plainjanedesigners
mv ~/Downloads/hero-minimal-life.webp "/Users/user/Desktop/YS89-專案整理/1-衛星站PBN/2026-世足PBN擴展/plainjanedesigners-com/"
mv ~/Downloads/avatar-daniel.png "/Users/user/Desktop/YS89-專案整理/1-衛星站PBN/2026-世足PBN擴展/plainjanedesigners-com/"
```

### Step 3：跟我說「圖片已放好」
我會幫你修改 index.html 把 emoji 替換成真實圖片：

- pansurihotel `🌎` → `<img src="hero-world-cup-cities.webp">`
- pansurihotel `✈️` → `<img src="avatar-allen.png">`
- plainjanedesigners `🍃` → `<img src="hero-minimal-life.webp">`
- plainjanedesigners `🌿` → `<img src="avatar-daniel.png">`

### Step 4：部署到雲端
- 拿到 pansurihotel.com 域名 → push GitHub Pages or Cloudflare Pages
- 拿到 plainjanedesigners.com 域名 → 同上

---

## ⚠️ 不要做的事

1. ❌ 不要用 5 編輯的 IG 頭像當 Allen/Daniel（會 footprint）
2. ❌ 不要用免費 stock photo（Google reverse image 抓得到，掉信任）
3. ❌ 不要直接用 PNG（要轉 WebP，速度差 60%）

---

## 🎯 完成後預期效果

| 站 | 視覺成果 |
|---|---|
| pansurihotel | 大圖城市風景 + Allen 卡通頭像 → 「真有人在寫」的旅遊雜誌感 |
| plainjanedesigners | 極簡靜物攝影 + Daniel 水彩頭像 → editorial 質感 |

兩站視覺風格完全不同，Google 看不出是同源網站。

---

**生完 4 張圖告訴我，我幫你接著部署。**
