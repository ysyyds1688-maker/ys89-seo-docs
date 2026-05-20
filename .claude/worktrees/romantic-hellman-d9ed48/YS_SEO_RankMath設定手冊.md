# Rank Math SEO 設定手冊（娛樂城評測論壇）

適用網站：ys89.fun 及複製站
設定日期：2026-05-06

---

## 一、安裝與初始化

1. WordPress 後台 → 外掛 → 安裝 Rank Math SEO（免費版）
2. 啟用後進入 Setup Wizard → 選 **Easy** 模式
3. 若有舊 SEO 插件（Yoast），Rank Math 會自動匯入設定（125 篇文章 meta 一鍵移轉）

---

## 二、General Settings

### Links
| 項目 | 設定 |
|------|------|
| Strip Category Base | OFF（不改 URL 結構） |
| Redirect Attachments | ON |
| Redirect Orphan Attachments | 填入首頁網址 |
| Nofollow External Links | ON（不傳 link juice 給外站） |

### Breadcrumbs
| 項目 | 設定 |
|------|------|
| Enable breadcrumbs | ON |
| Separator Character | » |
| Show Homepage Link | ON |
| Homepage label | 首頁 |
| Homepage Link | https://你的網域.fun |
| Show Category(s) | **ON**（顯示分類在麵包屑中） |

### Webmaster Tools
- Google Search Console：填入驗證碼 ID（從 GSC → 設定 → HTML 標記取得）
- 其他（Bing、Baidu）：視需求填入

### Edit robots.txt
伺服器根目錄的 robots.txt 需手動設定（WordPress 無法覆蓋實體檔案）：

```
User-agent: *
Allow: /
Allow: /wp-content/uploads/
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /feed/
Disallow: /comments/
Disallow: /trackback/
Disallow: /author/
Disallow: /?s=
Disallow: /search/

Sitemap: https://你的網域/sitemap_index.xml
```

**注意：** 不要封鎖 /wp-content/uploads/（會擋圖片）、/wp-content/plugins/ 和 /themes/（會擋 CSS/JS）

### Edit llms.txt（GEO 設定，給 AI 搜尋引擎看）
| 項目 | 設定 |
|------|------|
| Post Types | 文章 ✓、頁面 ✓、論壇話題 ✓ |
| Taxonomies | 分類 ✓、論壇分類 ✓（標籤不選） |
| Posts/Terms Limit | 200 |
| Additional Content | 填入網站簡介（中文，描述內容類型） |

### Analytics
- 連接 Google 帳號 → 選 Search Console property（你的網域）
- 選 GA4 帳號 → 選對應 property
- Install analytics code：ON（若無其他 GA 插件）
- Exclude Logged-in users：ON

---

## 三、Titles & Meta

### Global Meta
| 項目 | 設定 |
|------|------|
| Robots Meta | index, follow（**務必確認，預設可能是 noindex**） |
| Advanced Robots | Snippet ✓、Video Preview ✓、Image Preview ✓（Large） |
| Separation Character | \| 或 – |

### Homepage
- Title：自訂（含主關鍵字）
- Description：自訂（含品牌特色、目標關鍵字）
- Schema Type：WebSite

### Post Types：文章
| 項目 | 設定 |
|------|------|
| Schema Type | Article |
| Article Type | **News Article**（有機會進 Google Top Stories / AI Overview） |
| Primary Taxonomy | 分類 |
| Robots Meta | 不勾（使用 Global 設定） |
| Advanced Robots | Snippet ✓、Video Preview ✓、Image Preview ✓ |

### Post Types：頁面
- Schema Type：保持預設（Article 或 None）
- 其他同文章設定

### Post Types：論壇話題
| 項目 | 設定 |
|------|------|
| Schema Type | Article |
| Article Type | Article |
| Primary Taxonomy | 論壇分類 |

---

## 四、Sitemap Settings

### General
| 項目 | 設定 |
|------|------|
| Links Per Sitemap | 200 |
| Images in Sitemaps | ON |
| Include Featured Images | **ON**（對圖片搜尋很重要） |

### Post Types
| 類型 | Include in Sitemap | Include in HTML |
|------|-------------------|----------------|
| 文章 | ON | ON |
| 頁面 | ON | ON |
| Attachments | **OFF** | **OFF** |
| 論壇話題 | ON | ON |

### Taxonomies
| 類型 | Include in Sitemap | Include in HTML |
|------|-------------------|----------------|
| 分類 | ON | ON |
| 標籤 | **OFF** | **OFF**（薄內容，浪費 crawl budget） |
| 論壇分類 | ON | ON |

---

## 五、Instant Indexing（IndexNow）

| 項目 | 設定 |
|------|------|
| Auto-Submit Post Types | 文章 ✓、頁面 ✓、論壇話題 ✓ |
| API Key | 自動生成，點 Check Key 驗證 |

---

## 六、Cloudflare 設定

1. **AI Crawl Control** → 所有 AI 爬蟲（ChatGPT、Claude、Perplexity 等）設為 **Allow**
2. **Managed robots.txt** → 確認是否開啟（會覆蓋伺服器 robots.txt 對 AI 爬蟲的設定）

---

## 七、完成後必做

1. 到 Google Search Console → Sitemap → 提交 `https://你的網域/sitemap_index.xml`
2. 點 **Instant Indexing → Submit URLs** → 提交首頁和幾篇重點文章
3. 等 24-48 小時讓 Google 重新爬取
