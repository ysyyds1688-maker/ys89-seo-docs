# SEO 稽核報告 — ys89.fun

**稽核日期：** 2026-05-12  
**總分：** 93/100（A 級）  
**爬取頁數：** 20 頁  
**稽核工具：** SEOmator CLI（251 條規則，20 個類別）

---

## 各類別得分

| 類別 | 得分 | 通過 | 警告 | 失敗 |
|---|---|---|---|---|
| URL 結構 | 100 | 280 | 0 | 0 |
| 國際化 | 100 | 200 | 0 | 0 |
| 法規合規 | 100 | 20 | 0 | 0 |
| JavaScript 渲染 | 100 | 260 | 0 | 0 |
| 重新導向 | 100 | 160 | 0 | 0 |
| HTML 驗證 | 100 | 178 | 2 | 0 |
| 行動裝置 | 98 | 94 | 6 | 0 |
| 技術 SEO | 98 | 225 | 17 | 18 |
| 連結 | 97 | 336 | 44 | 0 |
| 圖片 | 95 | 231 | 47 | 2 |
| 可爬取性 | 95 | 284 | 58 | 18 |
| 核心 SEO | 94 | 267 | 76 | 37 |
| 內容 | 93 | 218 | 70 | 52 |
| 結構化資料 | 92 | 186 | 74 | 0 |
| 無障礙 | 90 | 162 | 77 | 1 |
| E-E-A-T | 89 | 179 | 101 | 0 |
| 安全性 | 86 | 139 | 101 | 80 |
| 效能 | 86 | 241 | 191 | 8 |
| 社群媒體 | 80 | 48 | 58 | 74 |
| AI/GEO 可讀性 | 64 | 8 | 36 | 56 |

---

## 嚴重問題（立即修復）

### 安全性（86/100）

全站 20 頁缺少 4 個關鍵 HTTP 安全標頭：

| 規則 | 問題 | 修復方法 |
|---|---|---|
| `security-hsts` | 缺少 Strict-Transport-Security | 加入 `Strict-Transport-Security: max-age=31536000; includeSubDomains` |
| `security-x-content-type-options` | 缺少 X-Content-Type-Options | 加入 `X-Content-Type-Options: nosniff` |
| `security-x-frame-options` | 網站易受 Clickjacking 攻擊 | 加入 `X-Frame-Options: SAMEORIGIN` |
| `security-ssl-protocol` | 無 HSTS，瀏覽器無法強制 HTTPS | 同上，設定 HSTS |

```nginx
# Nginx 設定範例
add_header Strict-Transport-Security "max-age=31536000; includeSubDomains" always;
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
```

---

### 核心 SEO（94/100）

| 規則 | 影響頁數 | 問題 | 修復方法 |
|---|---|---|---|
| `core-description-present` | 19/20 頁 | 缺少 `<meta name="description">` | 每頁加入 120–160 字的 meta description |
| `core-canonical-present` | 18/20 頁 | 缺少 `<link rel="canonical">` | 每頁加入指向標準 URL 的 canonical 標籤 |
| `core-robots-meta` | 18/20 頁 | 頁面含 `noindex` 但同時有 Schema 標記 | 解除衝突：要索引就移除 noindex，不索引就移除 Schema |
| `technical-www-redirect` | 18/20 頁 | www 與 non-www 版本同時可訪問 | 選定一個版本，設定 301 重新導向 |

---

### 社群媒體 Open Graph（80/100）

18～19 頁完全缺少 OG 標籤，分享至 Facebook / LINE 時不顯示預覽：

| 規則 | 影響頁數 | 修復方法 |
|---|---|---|
| `social-og-description` | 18/20 頁 | 加入 `<meta property="og:description">` |
| `social-og-image` | 19/20 頁 | 加入 `<meta property="og:image">` (1200×630px) |
| `social-og-url` | 18/20 頁 | 加入 `<meta property="og:url">` |

```html
<!-- 每頁 <head> 加入 -->
<meta property="og:title" content="頁面標題">
<meta property="og:description" content="頁面描述">
<meta property="og:image" content="https://ys89.fun/og-image.jpg">
<meta property="og:url" content="https://ys89.fun/目前頁面">
<meta property="og:type" content="website">
```

---

### 內容品質（93/100）

| 規則 | 影響頁數 | 問題 | 修復方法 |
|---|---|---|---|
| `content-word-count` | 20/20 頁 | 平均僅 65 字（建議 300 字以上） | 擴充每頁正文內容 |
| `content-duplicate-near` | 13/20 頁 | 與首頁相似度 81% 以上 | 差異化各頁內容，或設 canonical 指向主頁 |
| `content-keyword-stuffing` | 1/20 頁 | 10 個詞密度過高 | 自然書寫，避免重複堆疊關鍵字 |

---

### 效能（86/100）

| 規則 | 影響頁數 | 問題 | 修復方法 |
|---|---|---|---|
| `perf-page-weight` | 20/20 頁 | HTML 頁面平均 343KB（建議 <100KB） | 減少行內內容、壓縮 HTML |
| `perf-lazy-above-fold` | 8/20 頁 | 首屏圖片使用 `loading="lazy"` 拖慢 LCP | 移除首屏圖片的 lazy，加 `fetchpriority="high"` |
| `perf-lcp-hints` | 8/20 頁 | LCP 候選圖片缺少 preload | 加入 `<link rel="preload" as="image">` |
| `perf-dom-size` | 4/20 頁 | DOM 節點數達 1,637（建議 <800） | 移除多餘元素，長列表改用虛擬化 |

---

### AI / GEO 可讀性（64/100）— 最大弱點

| 規則 | 影響頁數 | 問題 | 修復方法 |
|---|---|---|---|
| `geo-semantic-html` | 20/20 頁 | 只有 2 個語意元素，幾乎全用 `<div>` | 改用 `<main>`、`<article>`、`<section>`、`<nav>` |
| `geo-content-structure` | 20/20 頁 | 缺少 `<main>` 或 `<article>` 主內容區 | 加入語意結構讓 AI 能解析內容 |
| `geo-schema-drift` | 19/20 頁 | JSON-LD 內容與頁面可見文字不符 | 確保 Schema 標記與實際顯示內容一致 |
| `geo-ai-bot-access` | 13/20 頁 | robots.txt 封鎖 GPTBot 等 5 個 AI 爬蟲 | 開放 GPTBot、Google-Extended、ClaudeBot |
| `geo-llms-txt` | 20/20 頁 | 無 `/llms.txt` 檔案 | 新增 `/llms.txt` 提供 AI 網站摘要 |

---

### 圖片（95/100）

| 規則 | 影響頁數 | 問題 | 修復方法 |
|---|---|---|---|
| `images-background-seo` | 20/20 頁 | 8 個重要內容圖片用 CSS background-image | 改用 `<img>` 標籤讓 Google 可索引 |
| `images-modern-format` | 8/20 頁 | 未使用 WebP / AVIF | 將圖片轉換為 WebP 格式 |
| `images-dimensions` | 8/20 頁 | 圖片缺少 width / height 屬性 | 加入寬高屬性防止版面偏移（CLS） |

---

## 警告項目摘要

| 類別 | 規則 | 影響頁數 | 說明 |
|---|---|---|---|
| 可爬取性 | `crawl-blocked-resources` | 20 | robots.txt 封鎖 CSS/JS，Googlebot 無法完整渲染 |
| 可爬取性 | `crawl-sitemap-orphan-urls` | 20 | Sitemap 的 5 個 URL 無任何內部連結指向 |
| 效能 | `perf-font-loading` | 20 | Google Fonts 缺少 `display=swap` |
| 效能 | `perf-minify-js` | 18 | 66KB 行內 JS 未壓縮 |
| 結構化資料 | `schema-breadcrumb` | 18 | BreadcrumbList 只有 1 個項目（需 ≥2） |
| 結構化資料 | `schema-website-search` | 18 | 缺少 SearchAction（站內搜尋框） |
| E-E-A-T | `eeat-about-page` | 19 | 無關於我們頁面連結 |
| E-E-A-T | `eeat-author-byline` | 20 | 無作者署名 |
| E-E-A-T | `eeat-content-dates` | 20 | 無內容發布日期 |
| 無障礙 | `a11y-landmark-regions` | 20 | 缺少 `<main>`、`<header>` 等地標元素 |
| 無障礙 | `a11y-skip-link` | 20 | 無跳過導航連結 |
| 安全性 | `security-csp` | 20 | 缺少 Content-Security-Policy |
| 安全性 | `security-permissions-policy` | 20 | 缺少 Permissions-Policy |
| 安全性 | `security-referrer-policy` | 20 | 缺少 Referrer-Policy |
| 社群媒體 | `social-profiles` | 20 | 無社群媒體連結 |
| 行動裝置 | `mobile-interstitials` | 6 | 彈出視窗可能影響行動體驗 |

---

## 表現良好 ✓

- **URL 結構（100）**：無停用詞、底線或追蹤參數
- **重新導向（100）**：無重新導向鏈或迴圈
- **JavaScript 渲染（100）**：SSR 正常，無純 JS 渲染問題
- **HTML 驗證（100）**：文件結構乾淨
- **行動裝置（98）**：視口設定正常
- **國際化（100）**：lang 屬性設定正確
- **法規合規（100）**：Cookie 同意通過
- **無失效內部連結**
- **HTTPS 已啟用**

---

## 建議修復優先順序

| 優先 | 項目 | 預估影響 |
|---|---|---|
| 1 | 加入安全性標頭（HSTS、X-Content-Type-Options、X-Frame-Options） | 安全性 ↑ |
| 2 | 每頁加入 `<meta description>` 和 `<link rel="canonical">` | 核心排名 ↑ |
| 3 | 解決 `noindex` 與 Schema 的衝突 | 結構化資料生效 |
| 4 | 移除首屏圖片的 `loading="lazy"`，加 `fetchpriority="high"` | LCP 改善 ↑ |
| 5 | 頁面範本加入語意 HTML（`<main>`、`<article>`、`<header>`、`<footer>`） | AI/GEO + 無障礙 ↑ |
| 6 | 補齊 OG / 社群 Meta 標籤 | 社群分享預覽 ↑ |
| 7 | 擴充各頁內容至 300 字以上 | 內容品質 ↑ |
| 8 | 開放 AI 爬蟲（GPTBot 等）並新增 `/llms.txt` | AI 搜尋可見度 ↑ |
| 9 | 設定 www / non-www 的 301 重新導向 | 避免重複內容 |
| 10 | 圖片轉換為 WebP，加上 `width` / `height` 屬性 | 效能 + CLS ↑ |
