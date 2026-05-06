# ys89.fun SEO 完整 Checklist

最後更新：2026-05-06

圖例：✅ 已完成　⚠️ 部分完成　❌ 未完成　🔄 等待中

---

## A. 技術 SEO

| 項目 | 狀態 | 備註 |
|------|------|------|
| robots.txt 正確設定 | ✅ | 已修：允許 uploads/、移除不必要封鎖 |
| sitemap_index.xml 可存取 | ✅ | https://ys89.fun/sitemap_index.xml |
| Sitemap 已提交 Google | 🔄 | 今日提交，等待 Google 處理（24-72hr） |
| 所有頁面 index, follow | ✅ | 已修 Rank Math Global Meta noindex bug |
| Canonical URL 正確 | ⚠️ | GSC 顯示 14 個 canonical 問題待處理 |
| HTTPS 正常 | ✅ | Cloudflare 啟用 |
| 行動版 RWD | ✅ | WordPress 主題支援 |
| AI 爬蟲開放 | ✅ | Cloudflare AI Crawl Control 全部 Allow |
| llms.txt 設定 | ✅ | 已設定論壇話題、分類，含網站描述 |
| Google Search Console 連接 | ✅ | 驗證碼已填入 Rank Math |
| GA4 連接 | ✅ | ys89代理統計 property 已連接 |
| IndexNow (Bing) 設定 | ✅ | API Key 生成，論壇話題自動提交 |
| 404 頁面 | ✅ | 圖片路徑已修（game-guides→promotions）；/topic/...撈-2/ → 301 → /topic/...撈金/（Rank Math DB 直插）|
| 5xx 錯誤 | ✅ | /?author=1,2 → 301 首頁（mu-plugin fix-author-enum.php 覆蓋 really-simple-ssl 的 wp_die） |

---

## B. On-Page SEO（全站）

| 項目 | 狀態 | 備註 |
|------|------|------|
| 網站名稱（sitename） | ⚠️ | 目前顯示 "YS"，應改為 "YS 娛樂城" |
| 首頁 Title 優化 | ⚠️ | 需確認含主關鍵字（娛樂城、評測） |
| 首頁 Description 優化 | ⚠️ | 需確認吸引點擊、含關鍵字 |
| OG 圖片（1200x630px） | ❌ | 尚未上傳，影響社群分享預覽 |
| 每篇文章有 Focus Keyword | ❌ | 需逐篇設定（Rank Math 文章編輯器） |
| 每篇文章有 Meta Description | ⚠️ | 舊 Yoast 設定已匯入，需逐篇確認品質 |
| H1 標題唯一且含關鍵字 | ⚠️ | 需逐篇確認 |
| 圖片 Alt 文字 | ❌ | 未系統性設定，需批量補充 |
| 內部連結 | ⚠️ | 需在相關文章間增加內部連結 |

---

## C. Schema 結構化資料

| 項目 | 狀態 | 備註 |
|------|------|------|
| 文章：NewsArticle schema | ✅ | Rank Math 全域設定完成 |
| 論壇話題：Article schema | ✅ | Rank Math 全域設定完成 |
| FAQPage schema（教學文章） | ❌ | 需在個別教學文章中手動加入 FAQ |
| Organization schema（首頁） | ❌ | 需在首頁設定品牌資訊 |
| BreadcrumbList schema | ✅ | Rank Math Breadcrumbs 啟用 |

---

## D. Google Search Console 待處理問題

從 GSC 覆蓋報告（今日檢視）：

| 問題 | 數量 | 處理方式 |
|------|------|---------|
| 已排除（Canonical 指向其他） | 14 | 需逐一檢查是否為重複頁面或設定錯誤 |
| 已爬取但未索引 | 10 | 需確認內容品質是否足夠、是否有 noindex |
| robots.txt 封鎖 | 5 | robots.txt 已修正，等 Google 重新爬取 |
| 404 頁面 | 3 | 需找出 URL 並設定 301 轉址或修復 |
| 5xx 伺服器錯誤 | 2 | 需檢查伺服器日誌 |

---

## E. 內容 SEO

| 項目 | 狀態 | 備註 |
|------|------|------|
| 主要關鍵字頁面存在 | ✅ | 娛樂城評測、遊戲攻略等頁面已建立 |
| 每篇文章 800 字以上 | ⚠️ | 需逐篇確認 |
| 文章更新日期維持新鮮 | ⚠️ | 定期更新重要文章 |
| 用戶問題型內容（AEO） | ❌ | 需增加 Q&A 形式內容供 AI 摘要引用 |
| 競品分析（rg8888.org 等） | ⚠️ | 已做初步對比，需持續追蹤關鍵字差距 |

---

## F. 速度與體驗

| 項目 | 狀態 | 備註 |
|------|------|------|
| WP Fastest Cache 啟用 | ✅ | 已安裝 |
| Cloudflare CDN | ✅ | 啟用 |
| Core Web Vitals | ❌ | 尚未測試（GSC → 網站使用體驗核心指標） |
| 圖片壓縮/WebP | ⚠️ | 需確認上傳圖片是否已優化 |

---

## 立即要做的優先事項（Top 5）

1. **⚡ 修改 WordPress 網站名稱** → 設定 → 一般 → 網站標題改為「YS 娛樂城」
2. **⚡ 上傳 OG 圖片**（1200x630px）→ Rank Math → Titles & Meta → Global Meta
3. **⚡ 查 GSC 3 個 404 頁面** → 設定 301 轉址
4. **⚡ 查 GSC 2 個 5xx 錯誤** → 找出原因修復
5. **📝 逐篇設定 Focus Keyword** → 從流量潛力最高的 10 篇文章開始
