# wc.ys89.fun 網站完整藍圖

> 最後更新：2026-05-14
> 總頁面數：90 個 HTML 頁面
> 部署平台：Cloudflare Pages（專案名 wc2026）

---

## 一、網站架構總覽

### 域名與技術
- **主域名**：`wc.ys89.fun`
- **母站**：`ys89.fun`（夜色娛樂城）
- **部署**：Cloudflare Pages
- **語言**：zh-TW（繁體中文）
- **框架**：純靜態 HTML（無框架），單頁 CSS+JS 內嵌
- **字體**：系統字體 + Noto Sans TC / Noto Serif TC（Google Fonts）

---

## 二、全站頁面清單（90頁）

### 核心頁面（7頁）
| 路徑 | 用途 | 優先級 |
|------|------|--------|
| `/` (index.html) | 首頁・全站入口 | 1.0 |
| `/schedule` | 完整 104 場賽程表（台灣時間） | 0.9 |
| `/live` | 即時比分頁 | 0.9 |
| `/live-schedule` | 直播大廳（影片嵌入+頻道選擇+賽程+分組） | 0.9 |
| `/odds` | 冠軍賠率比較 | 0.9 |
| `/prediction` | 冠軍預測深度分析 | 0.8 |
| `/news` | 最新消息列表 | 0.9 |

### 資訊頁面（6頁）
| 路徑 | 用途 |
|------|------|
| `/tournament` | 賽事完整介紹 |
| `/format` | 48 隊新賽制說明 |
| `/venues` | 16 座主辦城市 |
| `/taiwan-time` | 台灣時間對照指南 |
| `/ticket` | 門票資訊 |
| `/world-cup-2026` | 世界盃 2026 總覽 |

### 分組頁面（12頁）
| 路徑 | 內容 |
|------|------|
| `/group-a` | A組：墨西哥、韓國、南非、捷克 |
| `/group-b` | B組：加拿大、波士尼亞、瑞士 |
| `/group-c` | C組：巴西、摩洛哥、蘇格蘭（死亡之組） |
| `/group-d` | D組：美國、土耳其、澳洲 |
| `/group-e` | E組：德國、象牙海岸、厄瓜多 |
| `/group-f` | F組：荷蘭、日本、瑞典、突尼西亞 |
| `/group-g` | G組：葡萄牙、烏拉圭、伊朗、埃及 |
| `/group-h` | H組：西班牙、烏拉圭、沙烏地 |
| `/group-i` | I組：法國、塞內加爾 |
| `/group-j` | J組：阿根廷、阿爾及利亞 |
| `/group-k` | K組：比利時、塞爾維亞 |
| `/group-l` | L組：英格蘭、克羅埃西亞、迦納、巴拿馬 |

### 國家隊頁面（50+頁）
`/argentina` `/australia` `/austria` `/algeria` `/belgium` `/bosnia` `/brazil` `/canada` `/cape-verde` `/colombia` `/congo` `/croatia` `/curacao` `/czech` `/ecuador` `/egypt` `/england` `/france` `/germany` `/ghana` `/haiti` `/iran` `/iraq` `/ivory-coast` `/japan` `/jordan` `/korea` `/mexico` `/morocco` `/netherlands` `/new-zealand` `/norway` `/panama` `/paraguay` `/portugal` `/qatar` `/saudi` `/scotland` `/senegal` `/south-africa` `/spain` `/sweden` `/switzerland` `/tunisia` `/turkey` `/uruguay` `/usa` `/uzbekistan`

### 部落格文章（12頁）
| 路徑 | 標題 |
|------|------|
| `/blog` | 文章列表頁 |
| `/blog-taiwan-time` | 2026世足賽台灣時間完整指南 |
| `/blog-48-teams-format` | 48隊新賽制對押注的影響 |
| `/blog-betting-guide` | 世足賽台灣投注完整攻略 |
| `/blog-messi-vs-mbappe` | 梅西 vs 姆巴佩・最後的對決 |
| `/blog-champion-prediction` | 2026冠軍預測：最全面分析 |
| `/blog-messi-last-world-cup` | 梅西最後一屆世界盃 |
| `/blog-ronaldo-last-wc` | C羅最後一屆世界盃 |
| `/blog-opening-match` | 開幕戰分析 |
| `/blog-group-of-death` | 死亡之組分析 |
| `/blog-broadcast-schedule` | 轉播時間表 |
| `/blog-format-explained` | 賽制解說 |
| `/blog-theme-song` | 主題曲 |
| `/blog-tickets` | 門票攻略 |
| `/blog-where-to-watch` | 哪裡看 |

### 其他
| 路徑 | 用途 |
|------|------|
| `/404` | 自訂 404 頁 |
| `/google5c8adf3d1e89c6b0.html` | Google Search Console 驗證 |

---

## 三、首頁完整內容結構

### 3.1 Head 區（SEO + Meta）

```html
<title>2026世界盃賽程・分組・賠率・冠軍預測｜台灣最完整世界盃資訊站</title>
<meta name="description" content="2026世界盃台灣最完整資訊站：賽程表、12組分組分析、冠軍賠率、各隊深度評析、台灣時間對照、直播管道與投注攻略全覆蓋。美加墨三國聯辦，48隊104場，6月11日開踢。西班牙、法國、阿根廷、英格蘭為冠軍熱門。">
<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1">
<link rel="canonical" href="https://wc.ys89.fun/">
<link rel="alternate" hreflang="zh-TW" href="https://wc.ys89.fun/">
<link rel="alternate" hreflang="x-default" href="https://wc.ys89.fun/">

<!-- Open Graph -->
<meta property="og:title" content="2026世界盃賽程・分組・賠率・冠軍預測｜台灣最完整世界盃資訊站">
<meta property="og:description" content="（同 meta description）">
<meta property="og:type" content="website">
<meta property="og:url" content="https://wc.ys89.fun/">
<meta property="og:image" content="https://wc.ys89.fun/banner.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="zh_TW">
<meta property="og:site_name" content="2026世界盃投注資訊站">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="（同 og:title）">
<meta name="twitter:description" content="（同 og:description）">
<meta name="twitter:image" content="https://wc.ys89.fun/banner.jpg">
```

### 3.2 Structured Data (JSON-LD)

```json
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "name": "2026世足賽・世界盃投注資訊站",
      "url": "https://wc.ys89.fun",
      "description": "2026 FIFA世足賽台灣版資訊站：賽程、賠率、分組分析、直播管道、台灣投注攻略",
      "inLanguage": "zh-TW",
      "publisher": {"@id": "https://wc.ys89.fun/#org"}
    },
    {
      "@type": "Organization",
      "@id": "https://wc.ys89.fun/#org",
      "name": "夜色娛樂城・世足賽資訊站",
      "url": "https://wc.ys89.fun",
      "logo": {"@type": "ImageObject", "url": "https://wc.ys89.fun/logo.png"},
      "sameAs": ["https://ys89.fun"]
    },
    {
      "@type": "SportsEvent",
      "name": "2026 FIFA 世界盃足球賽（世足賽）",
      "alternateName": ["2026 FIFA World Cup", "2026世足賽", "2026世界盃"],
      "startDate": "2026-06-11",
      "endDate": "2026-07-19",
      "location": {
        "@type": "Place",
        "name": "美國・加拿大・墨西哥"
      },
      "organizer": {"@type": "Organization", "name": "FIFA"}
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {"@type": "Question", "name": "2026世足賽幾月幾號開始？", "acceptedAnswer": {"@type": "Answer", "text": "2026年世足賽6月11日開幕，7月19日決賽，共104場比賽。"}},
        {"@type": "Question", "name": "2026世足賽台灣時間幾點開踢？", "acceptedAnswer": {"@type": "Answer", "text": "美東場次台灣時間約凌晨2-4點，美西場次約清晨5-8點。"}},
        {"@type": "Question", "name": "2026世足賽在哪裡舉辦？", "acceptedAnswer": {"@type": "Answer", "text": "首次三國聯辦：美國11城市、加拿大2城市、墨西哥3城市，共16座場館。"}},
        {"@type": "Question", "name": "2026世界盃有幾支隊伍？", "acceptedAnswer": {"@type": "Answer", "text": "48隊，分成12組，總計104場。"}},
        {"@type": "Question", "name": "台灣可以在哪裡看2026世足賽直播？", "acceptedAnswer": {"@type": "Answer", "text": "愛爾達體育為官方轉播，公視・華視轉播重要場次。"}},
        {"@type": "Question", "name": "2026世足賽冠軍熱門是誰？", "acceptedAnswer": {"@type": "Answer", "text": "西班牙、法國、英格蘭、阿根廷為前四大熱門。"}}
      ]
    }
  ]
}
```

### 3.3 導航列（Navigation）
```
WC 2026（Logo）| 首頁 | 賽程表 | 賠率 | 冠軍預測 | 即時比分 | 娛樂城評價(外連) | [立即投注](CTA按鈕)
```
- 手機版：漢堡選單，`@media(max-width:640px)` 切換

### 3.4 首頁 Section 順序

1. **Hero Banner** — 背景圖 `banner.jpg`，倒數計時器「距離 2026 世界盃開幕」+ 天/時/分/秒
2. **關鍵資訊** — 🏟️ 美國・加拿大・墨西哥 ─ 48隊 104場 + [前往直播大廳 →]
3. **最新消息** — 動態載入新聞卡片 + [查看全部文章 →]
4. **免責聲明** — 投注警語
5. **快速導航錨點** — 世界盃簡介 / 完整賽程 / 12組賽制 / 冠軍賠率 / 球隊分析 / 冠軍預測 / 投注攻略 / 深度文章 / FAQ
6. **世界盃簡介** — `#intro` 2026世界盃是什麼？+ 體育場圖片 + 關鍵資訊格（主辦國/賽期/規模/台灣時間）
7. **完整賽程** — `#schedule` 賽程階段表格 + 相關連結
8. **分組賽制** — `#groups` 12組熱門強隊表 + 連結
9. **冠軍賠率** — `#odds` 8隊賠率比較表 + 投注建議
10. **球隊深度分析** — `#teams` 8支熱門球隊卡片連結
11. **冠軍預測** — `#prediction` 分析文字 + 連結
12. **投票互動** — 你預測的冠軍是？投票 Widget
13. **投注攻略** — `#betting` 5種投注類型表格 + 外連攻略文
14. **資料來源** — FIFA / DraftKings / timeanddate.com
15. **CTA 橫幅** — 立即加入・搶先卡位 + 前往夜色娛樂城按鈕
16. **深度文章** — `#blog` 6篇精選文章卡片
17. **FAQ** — `#faq` 6個常見問題（手風琴展開）
18. **更多資訊連結** — 10篇外連攻略文（連到 ys89.fun）
19. **推廣橫幅** — slideshow.gif 動圖
20. **底部 CTA** — 2026 FIFA World Cup + 立即前往夜色娛樂城下注
21. **Footer** — 免責 + 版權 © 2026 + 相關攻略站連結

---

## 四、首頁關鍵內容（文案）

### 世界盃簡介
> 2026年FIFA世界盃（世足賽）是第23屆FIFA世界盃足球賽，首次由美國、加拿大、墨西哥三國聯合主辦，也是史上首次擴大為48支球隊參賽，共12個小組、104場比賽。開幕戰定於2026年6月11日在墨西哥城舉行，決賽於7月19日在美國紐約MetLife Stadium舉行。

### 賽程表格
| 賽事階段 | 日期 | 場數 | 台灣時間 |
|---------|------|------|---------|
| 小組賽 | 6/11 – 7/2 | 72場 | 凌晨2:00 – 上午11:00 |
| 32強淘汰賽 | 7/4 – 7/6 | 16場 | 凌晨3:00 – 上午9:00 |
| 16強 | 7/9 – 7/12 | 8場 | 凌晨2:00 – 上午8:00 |
| 8強・4強 | 7/14 – 7/19 | 6場 | 上午5:00 – 上午9:00 |
| 決賽 | 7/19（台灣7/20） | 1場 | 上午6:00 |

### 冠軍賠率表
| 球隊 | 賠率 | 分組 | 投注建議 |
|------|------|------|---------|
| 西班牙 | 4.5–5倍 | H組 | 世界第一，最推薦首選 |
| 法國 | 5倍 | I組 | 陣容深度最強 |
| 英格蘭 | 6–7倍 | L組 | 60年圓夢機率最高 |
| 阿根廷 | 7–9倍 | J組 | 衛冕冠軍，梅西加持 |
| 巴西 | 8–10倍 | C組 | 技術最強，黑馬搏彩 |
| 德國 | 12–14倍 | E組 | 重建完成，長賠黑馬 |
| 日本 | 50–80倍 | F組 | 亞洲最強，小注搏彩 |
| 韓國 | 60–100倍 | A組 | 孫興慜告別戰 |

### 投注類型表
| 投注類型 | 說明 | 推薦程度 |
|---------|------|---------|
| 冠軍賠率 | 賽前押哪隊奪冠 | ★★★★★ |
| 小組賽讓球盤 | 強弱差距明確場次 | ★★★★☆ |
| 大小球盤 | 總進球超過/不超過2.5球 | ★★★★★ |
| 即時盤 | 看直播邊下注 | ★★★★☆ |
| 晉級賭注 | 押哪隊晉級 | ★★★★☆ |

### FAQ 問答（6題）
1. **2026世界盃什麼時候開始？** → 6月11日開幕，7月19日決賽
2. **在哪裡舉辦？** → 美國・加拿大・墨西哥 16座城市
3. **台灣時間幾點看？** → 美東凌晨2點，美西凌晨5點，決賽7/20上午6點
4. **誰最有機會奪冠？** → 西班牙4.5-5倍最熱，法國5倍，英格蘭6-7倍
5. **台灣哪裡投注？** → 台灣運彩 + 夜色娛樂城
6. **有幾隊幾場？** → 48隊12組104場

---

## 五、設計系統

### 首頁配色（白底亮色系）
```css
body { background: #fff; color: #1e293b; }
.nav { background: #fff; border-bottom: 2px solid #e2e8f0; }
.nav .logo { color: #d97706; }           /* 琥珀金 */
.nav a { color: #475569; }               /* 灰藍 */
.nav a:hover { color: #d97706; }
```

### 直播大廳配色（深色系）
```css
:root {
  --bg: #080602;          /* 深黑底 */
  --bg2: #100d06;         /* 次深背景 */
  --bg3: #181208;         /* 卡片背景 */
  --gold: #c9972a;        /* 主金色 */
  --gold2: #e8b84b;       /* 亮金色 */
  --cream: #f0e6cc;       /* 奶油色文字 */
  --muted: #a89c80;       /* 灰金色次要文字 */
  --border: rgba(201,151,42,0.15);
  --glow: 0 2px 24px rgba(201,151,42,0.08);
}
```

### 字體
```css
/* 系統字體堆疊 */
font-family: -apple-system, BlinkMacSystemFont, 'Noto Sans TC', 'Segoe UI', sans-serif;

/* 標題用襯線體 */
font-family: 'Noto Serif TC', serif;

/* Google Fonts 引入 */
https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@700;900&display=swap
```

### 響應式斷點
- `640px` — 手機版（導航漢堡、單欄佈局）
- `860px` — 平板（直播頻道面板改單欄）
- `1200px` — 桌面寬版

---

## 六、圖片資源清單

| 檔案 | 用途 | 尺寸建議 |
|------|------|---------|
| `/banner.jpg` | Hero 背景 + OG Image | 1200×630 |
| `/logo.png` | 網站 Logo | ~200px 寬 |
| `/logo-trophy.png` | 獎盃圖示 | ~64px |
| `/favicon.png` | Favicon 64×64 | 64×64 |
| `/favicon-32.png` | Favicon 32×32 | 32×32 |
| `/apple-touch-icon.png` | iOS 書籤圖示 | 180×180 |
| `/hero-title.png` | 直播大廳 3D 金色標題 | ~1400px 寬 RGBA |
| `/slideshow.gif` | 推廣動圖橫幅 | 全寬 |
| `/stadium.png` | 體育場圖片 | 800px 寬 |

---

## 七、外部連結與 CTA

### 主要 CTA 連結
- **夜色娛樂城註冊**：`https://lihi2.me/vrDxN`
- **母站**：`https://ys89.fun`

### 外連攻略文（ys89.fun）
- 投注新手指南：`/world-cup-2026-betting-guide-beginners/`
- 冠軍賠率分析：`/world-cup-2026-champion-odds-analysis/`
- 讓球盤口攻略：`/world-cup-2026-handicap-betting-guide/`
- 黑馬投注：`/world-cup-2026-dark-horses-betting/`
- 即時投注攻略：`/world-cup-2026-live-betting-guide/`
- 歐洲強隊分析：`/world-cup-2026-europe-teams-odds/`
- 南美強隊分析：`/world-cup-2026-south-america-teams-analysis/`
- 亞洲隊分析：`/world-cup-2026-asia-teams-analysis/`
- 射手王賠率：`/world-cup-2026-top-scorer-golden-boot-odds/`
- 小組賽攻略：`/world-cup-2026-group-stage-betting/`

### 相關攻略站（Footer）
- 老虎機攻略：`https://slot-ys89.pages.dev`
- 百家樂攻略：`https://bac-ys89.pages.dev`
- 手機APP版：`https://app-ys89.pages.dev`
- 出金教學：`https://out-ys89.pages.dev`
- 體育投注：`https://sport-ys89.pages.dev`
- 娛樂城評測：`https://player-one-site.pages.dev`

---

## 八、JavaScript 功能

### 首頁
1. **倒數計時器** — 計算距離 2026-06-11T18:00:00Z 的天/時/分/秒
2. **FAQ 手風琴** — 點擊展開/收合問答
3. **投票 Widget** — localStorage 儲存投票，純前端
4. **手機導航** — 漢堡選單 toggle
5. **最新消息載入** — 動態渲染新聞卡片

### 直播大廳（live-schedule.html）
1. **倒數計時器** — 同上
2. **頻道切換** — `pickChannel()` 切換 ScoreBat / YouTube iframe
3. **GSAP ScrollTrigger** — Hero 區動畫（eyebrow → h1 → countdown → stats）
4. **分組 Carousel** — 水平滑動 12 組卡片 + dots 指示器
5. **賽程篩選** — 全部/小組賽/16強/8強/4強/決賽 tab 切換
6. **我的關注** — 選擇球隊篩選相關賽事
7. **視差背景** — GSAP 控制 Hero 背景滾動視差

### 國家隊頁面
1. **投票 Widget** — 你認為XX能走多遠？
2. **賽程過濾** — 只顯示該隊比賽

---

## 九、SEO 設定

### 每頁必備
- `<title>` — 含目標關鍵字 + 品牌
- `<meta name="description">` — 150 字以內
- `<link rel="canonical">` — 正規化 URL
- `<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1">`
- OG tags（title / description / image / url / locale / site_name）
- Twitter Card（summary_large_image）
- hreflang（zh-TW + x-default）

### Structured Data 類型
- **首頁**：WebSite + Organization + SportsEvent + FAQPage
- **國家隊頁面**：SportsTeam
- **部落格文章**：Article / BlogPosting
- **分組頁面**：ItemList

### Sitemap
- 路徑：`/sitemap.xml`
- 97 個 URL，按優先級 0.7–1.0

### 其他 SEO 檔案
- `/robots.txt` — 允許所有爬蟲
- `/_headers` — Cloudflare 自訂 Headers
- `/_redirects` — Cloudflare 重定向規則
- Google Search Console 驗證檔

---

## 十、部署指令

```bash
# 部署到 Cloudflare Pages
cd /tmp/wc_site
npx wrangler pages deploy dist --project-name=wc2026 --commit-dirty=true

# 檔案結構
dist/
├── index.html          # 首頁
├── live-schedule.html  # 直播大廳
├── schedule.html       # 賽程表
├── odds.html           # 賠率
├── prediction.html     # 冠軍預測
├── *.html              # 各國家隊/分組/部落格頁面
├── banner.jpg          # OG Image
├── logo.png            # Logo
├── hero-title.png      # 直播大廳 3D 標題
├── sitemap.xml
├── robots.txt
├── _headers
└── _redirects
```

---

## 十一、複製建議

要複製這個站的架構，建議順序：

1. **先做首頁** — 最重要的 SEO 入口，包含所有主要內容
2. **做核心頁面** — schedule / odds / prediction / live-schedule
3. **做國家隊頁面** — 用模板批量生成 50+ 頁
4. **做分組頁面** — 12 個分組頁
5. **做部落格** — 長尾關鍵字文章
6. **做 SEO 檔案** — sitemap.xml / robots.txt / structured data
7. **部署 Cloudflare** — 設定自訂域名

每個頁面都是獨立 HTML 檔，CSS/JS 內嵌，不需要 build 步驟，直接 deploy 即可。
