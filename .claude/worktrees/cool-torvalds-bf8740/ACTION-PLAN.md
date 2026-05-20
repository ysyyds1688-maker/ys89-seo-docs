# SEO 行動計劃 — wc.ys89.fun

**審核日期：** 2026-05-12 | **總分：** 94/100 (A)

---

## 優先修復順序

---

### 🔴 第一優先：安全性（立即修復）

這些問題直接影響使用者安全與 Google 信任分數。

#### 1. 加入 HSTS 標頭
```
Strict-Transport-Security: max-age=31536000; includeSubDomains; preload
```
在 Nginx/Apache/Cloudflare 設定中加入此標頭。

#### 2. 加入 X-Frame-Options
```
X-Frame-Options: SAMEORIGIN
```

#### 3. 加入 Content-Security-Policy
```
Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; ...
```
依實際使用的第三方服務調整。

#### 4. 加入 Permissions-Policy
```
Permissions-Policy: camera=(), microphone=(), geolocation=()
```

#### 5. 修復外部連結安全性
```html
<!-- 所有 target="_blank" 連結必須加上 -->
<a href="..." target="_blank" rel="noopener noreferrer">...</a>
```

---

### 🔴 第二優先：Technical SEO（本週內）

#### 6. 修復 Soft 404 問題
- 確認伺服器對不存在頁面回傳 HTTP 404 狀態碼
- 建立有導航連結的自訂 404 頁面
- 測試：`curl -o /dev/null -s -w "%{http_code}" https://wc.ys89.fun/non-existent-page`

#### 7. 修復 robots.txt 語法錯誤
- 檢查：`https://wc.ys89.fun/robots.txt`
- 修復語法問題，並**開放 AI 爬蟲**：
```
User-agent: GPTBot
Allow: /

User-agent: Google-Extended
Allow: /

User-agent: ClaudeBot
Allow: /

User-agent: PerplexityBot
Allow: /

User-agent: Amazonbot
Allow: /
```

#### 8. 修復 onclick 導航連結
```html
<!-- 修改前 -->
<div onclick="window.location='...'">...</div>

<!-- 修改後 -->
<a href="...">...</a>
```

---

### 🔴 第三優先：Social & OG 標籤（本週內）

#### 9. 加入完整 Open Graph 標籤
每個頁面的 `<head>` 加入：
```html
<meta property="og:title" content="頁面標題 | YS89 夜色娛樂城" />
<meta property="og:description" content="120-160 字元的頁面描述" />
<meta property="og:image" content="https://wc.ys89.fun/og-image.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:url" content="https://wc.ys89.fun/當前頁面路徑" />
<meta property="og:type" content="website" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="頁面標題" />
<meta name="twitter:description" content="頁面描述" />
<meta name="twitter:image" content="https://wc.ys89.fun/og-image.jpg" />
```

---

### 🔴 第四優先：AI/GEO 可見度（本月內）

目前 GEO 分數僅 51/100，是最低分類別。

#### 10. 建立 llms.txt 文件
在根目錄建立 `https://wc.ys89.fun/llms.txt`：
```
# YS89 夜色娛樂城

> 提供線上娛樂城遊戲、百家樂、老虎機等服務

## 主要頁面
- [首頁](https://wc.ys89.fun/)
- [遊戲大廳](https://wc.ys89.fun/games/)
- [優惠活動](https://wc.ys89.fun/promotions/)
- [新聞資訊](https://wc.ys89.fun/news/)
```

#### 11. 改善語意 HTML 結構
```html
<!-- 每頁必須有的結構 -->
<header>...</header>
<nav>...</nav>
<main>
  <article>
    <h1>主標題</h1>
    <section>...</section>
  </article>
</main>
<footer>...</footer>
```

#### 12. 加入結構化資料 JSON-LD
```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "YS89 夜色娛樂城",
  "url": "https://wc.ys89.fun",
  "logo": "https://wc.ys89.fun/logo.png",
  "sameAs": [
    "https://www.facebook.com/ys89",
    "https://www.instagram.com/ys89"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "YS89 夜色娛樂城",
  "url": "https://wc.ys89.fun",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://wc.ys89.fun/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
```

---

### ⚠️ 第五優先：E-E-A-T 信任度（本月內）

#### 13. 建立缺失頁面
- **關於我們頁面：** `/about` — 說明品牌背景、資質
- **聯絡頁面：** `/contact` — 提供聯絡方式
- **隱私權政策：** `/privacy-policy` — 必須在頁腳連結

#### 14. 加入內容日期標記
```html
<time datetime="2026-05-12" itemprop="datePublished">2026年5月12日</time>
```
或在 Article Schema 中加入：
```json
"datePublished": "2026-05-12",
"dateModified": "2026-05-12"
```

---

### ⚠️ 第六優先：Core SEO（本月內）

#### 15. 優化 Meta Description
- 目前過短（79 字元），調整至 **120-160 字元**
- 每頁使用獨特描述，包含主要關鍵字

#### 16. 優化 Title Tag
- 目前過短（28 字元），調整至 **30-60 字元**
- 格式建議：`主要關鍵字 | 品牌名稱`

---

### ⚠️ 第七優先：Performance（下個月）

#### 17. 圖片優化
```html
<!-- 1. 首屏圖片移除 lazy loading -->
<img src="hero.jpg" fetchpriority="high" alt="..." />

<!-- 2. 加入 LCP 圖片預載 -->
<link rel="preload" as="image" href="hero.jpg" />

<!-- 3. 加入尺寸屬性防止 CLS -->
<img src="..." width="800" height="600" alt="..." />

<!-- 4. 使用 responsive 圖片 -->
<img src="..." srcset="small.webp 400w, large.webp 800w" sizes="(max-width: 600px) 400px, 800px" />
```

#### 18. 將 GIF 轉換為 MP4/WebM
```html
<video autoplay muted loop playsinline>
  <source src="animation.webm" type="video/webm">
  <source src="animation.mp4" type="video/mp4">
</video>
```

#### 19. 降低 DOM 節點數
- 目前 1,266 個（建議 < 800）
- 移除不必要的 wrapper div、合併重複元素

#### 20. 改善伺服器回應時間
- 目前 650ms（建議 < 500ms）
- 啟用 Cloudflare CDN 快取
- 優化資料庫查詢

---

### ⚠️ 第八優先：Accessibility（下個月）

#### 21. 加入 skip link
```html
<a href="#main-content" class="skip-link">跳到主要內容</a>
```

#### 22. 修復觸控目標
確保所有按鈕、連結的點擊區域 ≥ 44×44px

#### 23. 修復表格標頭
```html
<table>
  <thead>
    <tr>
      <th scope="col">欄位名稱</th>
    </tr>
  </thead>
</table>
```

---

### ⚠️ 第九優先：Content 內容品質（持續進行）

#### 24. 擴充薄頁面內容
- 字數少於 300 字的頁面需補充內容
- 建議每個主要頁面至少 800 字

#### 25. 修復連結密度
- 每 100 字最多 5 個連結
- 目前部分頁面達 40.77 個/100 字（過高）

#### 26. 建立 BreadcrumbList Schema
```json
{
  "@type": "BreadcrumbList",
  "itemListElement": [
    {"@type": "ListItem", "position": 1, "name": "首頁", "item": "https://wc.ys89.fun/"},
    {"@type": "ListItem", "position": 2, "name": "當前頁面", "item": "https://wc.ys89.fun/current/"}
  ]
}
```

---

## 修復優先矩陣

| 優先級 | 類別 | 工作量 | 預期效益 |
|--------|------|--------|----------|
| P0（立即）| 安全標頭（HSTS、XFO、CSP）| 低 | 安全+信任 |
| P0（立即）| Soft 404 修復 | 低 | 爬取效率 |
| P0（立即）| OG 社群標籤 | 低 | 社群流量 |
| P1（本週）| robots.txt + AI 爬蟲 | 低 | AI 搜尋可見度 |
| P1（本週）| llms.txt 建立 | 低 | GEO 分數 |
| P1（本月）| 語意 HTML 重構 | 中 | GEO + 可及性 |
| P1（本月）| JSON-LD 結構化資料 | 中 | Rich Results |
| P2（本月）| E-E-A-T 頁面建立 | 中 | 信任度 |
| P2（本月）| Meta desc / Title 優化 | 低 | CTR |
| P3（下月）| 圖片全面優化 | 高 | 效能+CWV |
| P3（下月）| 內容擴充（薄頁面）| 高 | 排名 |

---

## 預期改善效益

修復所有 P0/P1 項目後，預計：
- GEO 分數：51 → 80+
- Security 分數：91 → 98+
- Social 分數：90 → 98+
- 整體分數：94 → **97-98**
