# 新站建站規格書

> 目標：快速建立 SEO/AEO 導流站，導流到主平台（夜色娛樂城 ys89.fun）
> 設計原則：**不求 UI/UX，只求內容量 + SEO 關鍵字到位 + AEO 搶答**
> 參考藍圖：`wc-ys89-site-blueprint.md`

---

## 一、核心定位

- **目的**：用世界盃長尾關鍵字搶自然流量，導流到主平台
- **不做**：華麗動畫、GSAP、視差、3D 標題、複雜 RWD
- **要做**：每頁 SEO meta 全套、JSON-LD schema、FAQ 搶 AEO、內連導流

---

## 二、每頁必備 SEO 要素（模板規格）

### Head 區（每頁都要）
```html
<title>{頁面標題}｜{品牌名}</title>
<meta name="description" content="{150字以內，含主關鍵字}">
<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1">
<link rel="canonical" href="{完整URL}">
<link rel="alternate" hreflang="zh-TW" href="{完整URL}">
<link rel="alternate" hreflang="x-default" href="{完整URL}">

<!-- OG -->
<meta property="og:title" content="{同title}">
<meta property="og:description" content="{同description}">
<meta property="og:type" content="website">
<meta property="og:url" content="{完整URL}">
<meta property="og:image" content="{OG圖片URL}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="zh_TW">
<meta property="og:site_name" content="{站名}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{同title}">
<meta name="twitter:description" content="{同description}">
<meta name="twitter:image" content="{OG圖片URL}">
```

### Structured Data（每頁至少一種）

| 頁面類型 | Schema 類型 |
|---------|------------|
| 首頁 | WebSite + Organization + SportsEvent + FAQPage |
| 國家隊頁 | SportsTeam + FAQPage |
| 分組頁 | ItemList + FAQPage |
| 部落格文章 | Article + FAQPage |
| 賽程頁 | SportsEvent + ItemList |
| 賠率頁 | FAQPage |

### AEO 搶答區（每頁必放）
每頁底部放 3-6 個 FAQ，用 `<details><summary>` 或手風琴格式：
- 問題用**自然語言搜尋句**（「2026世界盃XX隊能走多遠？」）
- 答案**第一句直接回答**，30 字內，後面再補充
- 同步寫進 JSON-LD FAQPage schema

### 內連導流（每頁必放）
- 頁面中段：至少 3 個內連到其他站內頁面
- 頁面底部：CTA 按鈕連到主平台
- 相關頁面推薦區：4-6 個連結卡片

---

## 三、頁面清單與優先順序

### P0 — 先做這些就能上線（7頁）
| 頁面 | 檔名 | 主關鍵字 |
|------|------|---------|
| 首頁 | index.html | 2026世界盃、世足賽、台灣投注 |
| 賽程表 | schedule.html | 2026世界盃賽程、台灣時間 |
| 冠軍賠率 | odds.html | 世界盃賠率、冠軍賠率比較 |
| 冠軍預測 | prediction.html | 世界盃冠軍預測、誰會奪冠 |
| 直播大廳 | live-schedule.html | 世足賽直播、哪裡看世界盃 |
| 即時比分 | live.html | 世界盃即時比分 |
| 部落格列表 | blog.html | 世界盃分析文章 |

### P1 — 量產頁面（62頁，用腳本生成）
| 類型 | 數量 | 檔名規則 |
|------|------|---------|
| 國家隊頁面 | 50 頁 | {country-slug}.html |
| 分組頁面 | 12 頁 | group-{a-l}.html |

### P2 — 長尾文章（12-15頁）
| 檔名 | 目標關鍵字 |
|------|----------|
| blog-taiwan-time.html | 世界盃台灣時間 |
| blog-betting-guide.html | 世足賽投注攻略 |
| blog-messi-vs-mbappe.html | 梅西 vs 姆巴佩 |
| blog-champion-prediction.html | 2026冠軍預測分析 |
| blog-48-teams-format.html | 48隊新賽制 |
| blog-group-of-death.html | 死亡之組 |
| blog-messi-last-world-cup.html | 梅西最後一屆 |
| blog-ronaldo-last-wc.html | C羅最後一屆 |
| blog-opening-match.html | 開幕戰分析 |
| blog-where-to-watch.html | 台灣哪裡看世界盃 |
| blog-tickets.html | 世界盃門票 |
| blog-broadcast-schedule.html | 轉播時間表 |

### P3 — 補充頁面（6頁）
| 頁面 | 檔名 |
|------|------|
| 賽制說明 | format.html |
| 主辦城市 | venues.html |
| 台灣時間指南 | taiwan-time.html |
| 門票資訊 | ticket.html |
| 賽事總覽 | tournament.html |
| 最新消息 | news.html |

---

## 四、首頁內容結構

按此順序排列 section：

1. **導航列** — Logo + 頁面連結 + CTA按鈕
2. **Hero** — 標題 + 副標題 + 倒數計時 + 基本資訊（48隊/104場/美加墨）
3. **快速導航** — 錨點連結到各 section
4. **世界盃簡介** — 300 字介紹 + 關鍵資訊表格（主辦國/賽期/規模/台灣時間）
5. **完整賽程** — 賽程階段表格 + [查看完整賽程 →]
6. **12組分組** — 各組熱門強隊表 + 各組連結
7. **冠軍賠率** — 8隊賠率比較表 + [完整賠率 →]
8. **熱門球隊** — 8支球隊連結卡片
9. **冠軍預測** — 簡短分析 + [完整預測 →]
10. **投注攻略** — 5種投注類型表格
11. **CTA 導流** — 前往主平台按鈕
12. **部落格文章** — 6篇精選文章連結
13. **FAQ** — 6個常見問題（同步 JSON-LD）
14. **Footer** — 免責 + 版權 + 相關站連結

---

## 五、國家隊頁面模板

每頁統一結構（用腳本批量替換變數）：

```
變數：{COUNTRY_ZH}、{COUNTRY_EN}、{SLUG}、{FLAG}、{FIFA_RANK}、
      {GROUP}、{COACH}、{KEY_PLAYERS}、{ODDS}、{HISTORY}、{STYLE}
```

### Section 順序
1. **H1** — {COUNTRY_ZH} 2026世界盃完整分析
2. **基本資訊卡** — FIFA排名/分組/教練/賠率
3. **球隊介紹** — 200字（風格、近期表現）
4. **關鍵球員** — 3-5人（姓名/位置/所屬俱樂部）
5. **歷屆世界盃成績** — 表格
6. **本屆分組賽程** — 該隊 3 場小組賽
7. **投注建議** — 100字分析 + CTA
8. **FAQ** — 3-4題（「XX隊能走多遠？」「XX隊關鍵球員是誰？」）
9. **相關頁面** — 同組對手連結 + 賠率頁 + 賽程頁

### JSON-LD
```json
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "SportsTeam",
      "name": "{COUNTRY_EN} National Football Team",
      "alternateName": "{COUNTRY_ZH}國家足球隊",
      "sport": "Football",
      "coach": {"@type": "Person", "name": "{COACH}"},
      "memberOf": {"@type": "SportsOrganization", "name": "FIFA"}
    },
    {
      "@type": "FAQPage",
      "mainEntity": [...]
    }
  ]
}
```

---

## 六、分組頁面模板

### Section 順序
1. **H1** — 2026世界盃{GROUP}組完整分析
2. **4隊一覽表** — 國旗/隊名/FIFA排名/賠率
3. **出線預測** — 預測前2名 + 黑馬
4. **3場小組賽賽程** — 日期/對戰/台灣時間
5. **各隊簡介** — 每隊 100 字
6. **投注建議** — 小組賽投注角度
7. **FAQ** — 3題
8. **相關連結** — 4隊各自頁面 + 賽程頁

---

## 七、部落格文章模板

### Section 順序
1. **H1** — 含長尾關鍵字的標題
2. **文章 meta** — 日期/作者/閱讀時間
3. **目錄（TOC）** — 錨點到各段
4. **正文** — 800-1500字，H2/H3 結構化
5. **CTA** — 中段插入一次導流連結
6. **FAQ** — 文末 3-4 題
7. **相關文章** — 4 篇推薦

### JSON-LD
```json
{
  "@type": "Article",
  "headline": "{標題}",
  "datePublished": "{日期}",
  "author": {"@type": "Organization", "name": "{站名}"},
  "publisher": {"@id": "{站URL}/#org"}
}
```

---

## 八、AEO 策略

### 目標：搶這些位置
- Google Featured Snippet（精選摘要）
- People Also Ask（其他人也問了）
- AI Overview / SGE 引用

### 做法
1. **每頁 FAQ 用自然語言問句** — 「2026世界盃什麼時候開始？」不是「開賽日期」
2. **答案第一句 30 字內直答** — 「2026世界盃於6月11日在墨西哥城開幕，7月19日決賽。」
3. **表格搶 Snippet** — 賽程表、賠率表用 `<table>` 不用 `<div>`
4. **H2 用問句格式** — 「2026世界盃是什麼？」「誰最有機會奪冠？」
5. **每頁都有 FAQPage schema** — 讓 Google 直接抓結構化資料
6. **段落開頭直接給結論** — 倒金字塔寫法，不要鋪陳

---

## 九、CSS 規格（極簡版）

```css
/* 只需要這些，不用花俏 */
body { font-family: -apple-system, 'Noto Sans TC', sans-serif; max-width: 900px; margin: 0 auto; padding: 16px; line-height: 1.8; color: #1e293b; }
h1 { font-size: 1.8rem; margin-bottom: 8px; }
h2 { font-size: 1.4rem; margin-top: 32px; border-bottom: 2px solid #d97706; padding-bottom: 4px; }
table { width: 100%; border-collapse: collapse; margin: 16px 0; }
th, td { border: 1px solid #e2e8f0; padding: 8px 12px; text-align: left; }
th { background: #f8fafc; }
a { color: #d97706; }
.cta { display: inline-block; background: #d97706; color: #fff; padding: 12px 24px; border-radius: 6px; margin: 16px 0; }
.faq summary { cursor: pointer; font-weight: 700; padding: 8px 0; }
.faq details { border-bottom: 1px solid #e2e8f0; padding: 8px 0; }
nav { display: flex; gap: 16px; padding: 12px 0; border-bottom: 1px solid #e2e8f0; flex-wrap: wrap; }
footer { margin-top: 48px; padding: 24px 0; border-top: 1px solid #e2e8f0; font-size: 0.85rem; color: #94a3b8; }
```

---

## 十、批量生成腳本需求

### 國家隊頁面生成器
- 輸入：JSON 資料檔（50隊的資料：隊名/排名/分組/教練/球員/歷史/賠率）
- 模板：HTML 模板檔，用 `{{變數}}` 佔位
- 輸出：50 個 HTML 檔案
- 自動生成每頁的 JSON-LD schema

### 分組頁面生成器
- 輸入：同一份 JSON + 賽程資料
- 輸出：12 個 HTML 檔案

### Sitemap 生成器
- 掃描 dist/ 所有 .html
- 自動產生 sitemap.xml（含 lastmod + priority）

---

## 十一、SEO 檔案清單

| 檔案 | 用途 |
|------|------|
| sitemap.xml | 全站頁面索引 |
| robots.txt | `Allow: /` + Sitemap 指向 |
| _headers | Cache-Control、X-Robots-Tag |
| _redirects | 301 重定向規則 |
| 404.html | 自訂 404 頁（含導流連結） |

---

## 十二、分工建議（多台電腦同步）

| 電腦 | 負責 | 預估時間 |
|------|------|---------|
| 電腦 A | 首頁 + 核心頁面（P0 的 7 頁） | 1-2 小時 |
| 電腦 B | 國家隊模板 + 批量腳本生成 50 頁 | 1 小時 |
| 電腦 A/B | 分組 12 頁 + 部落格 12 頁 | 1-2 小時 |
| 任一台 | SEO 檔案 + sitemap + 部署 | 30 分鐘 |

全部做完合併到同一個 repo → deploy Cloudflare Pages。

---

## 十三、上線 checklist

- [ ] 每頁有 title + description + canonical
- [ ] 每頁有 OG + Twitter Card
- [ ] 每頁有 JSON-LD schema
- [ ] 每頁有 FAQ 區（3-6題）+ FAQPage schema
- [ ] 每頁有 CTA 導流到主平台
- [ ] 每頁有 3+ 內連到站內其他頁
- [ ] sitemap.xml 包含所有頁面
- [ ] robots.txt 正確
- [ ] GSC 提交 sitemap
- [ ] 所有 `<table>` 用語意化 HTML（搶 Snippet）
- [ ] H1 每頁唯一，含主關鍵字
- [ ] H2 用問句格式（搶 PAA）
- [ ] 圖片有 alt text
- [ ] 404 頁面有導流連結
