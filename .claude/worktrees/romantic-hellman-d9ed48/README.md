# YS89 SEO 文件庫

夜色娛樂城（YS89）站群 SEO 策略、工具操作、內容規劃與 Autopilot 自動化系統的完整文件集。

🌐 **線上預覽**：[ys89-seo-docs.pages.dev](https://ys89-seo-docs.pages.dev)

---

## 站群架構

以 `ys89.fun` 為中心，8 個主題衛星站互相交叉內鏈，全部導流至夜色娛樂城聯盟連結。

```
wc.ys89.fun   player-one   bonus-ys89   usdt-ys89
slot-ys89     out-ys89     sport-ys89   bac-ys89
       ↕ 交叉內鏈 ↕
    ys89.fun（WordPress 論壇主站）
              ↓
    夜色娛樂城 YS89（lihi2.me/ho943）
```

| 站台 | 主題 | 目標關鍵字 | 狀態 |
|------|------|-----------|------|
| [ys89.fun](https://ys89.fun) | WordPress 論壇 | 夜色娛樂城、ys89 | ⚠ 有技術問題 |
| [wc.ys89.fun](https://wc.ys89.fun) | 世足賽投注 | 2026世界盃、世足賠率 | ⚠ Redirect Error |
| [player-one-site.pages.dev](https://player-one-site.pages.dev) | 娛樂城評測排行 | 娛樂城推薦排行榜 | ✅ 正常 |
| [bonus-ys89.pages.dev](https://bonus-ys89.pages.dev) | 優惠攻略 | 娛樂城體驗金 | 🆕 新上線 |
| [usdt-ys89.pages.dev](https://usdt-ys89.pages.dev) | USDT入金教學 | 娛樂城USDT | 🆕 新上線 |
| [slot-ys89.pages.dev](https://slot-ys89.pages.dev) | 老虎機攻略 | 老虎機推薦 | 🆕 新上線 |
| [out-ys89.pages.dev](https://out-ys89.pages.dev) | 出金速度評測 | 娛樂城出金最快 | 🆕 新上線 |
| [sport-ys89.pages.dev](https://sport-ys89.pages.dev) | 運彩博彩 | 運彩娛樂城推薦 | 🆕 新上線 |

---

## 文件清單

### 📊 看板（HTML）

| 文件 | 說明 |
|------|------|
| [index.html](index.html) | 文件庫入口，所有連結 + 各站即時狀態 |
| [PROJECT-OVERVIEW.html](PROJECT-OVERVIEW.html) | 站群架構全覽、各站問題清單、關鍵字目標、立即行動清單 |
| [SEO-GUIDE.html](SEO-GUIDE.html) | 三工具操作指南（/seo / /seo-audit / /seo-coach） |

### 📋 策略文件（Markdown）

| 文件 | 說明 |
|------|------|
| [台灣娛樂城品牌SEO攻略.md](台灣娛樂城品牌SEO攻略.md) | 台灣市場競爭格局、品牌策略方針 |
| [YS89_內容網路策略.md](YS89_內容網路策略.md) | Topic Cluster 架構、Pillar 頁規劃、內鏈設計 |
| [YS89_SEO_Checklist.md](YS89_SEO_Checklist.md) | 每站上線前的 SEO 標準配置清單 |
| [YS_SEO_RankMath設定手冊.md](YS_SEO_RankMath設定手冊.md) | WordPress RankMath 外掛完整設定 |
| [新站設定指南_娛樂城論壇.md](新站設定指南_娛樂城論壇.md) | 從零建站：域名 → Cloudflare Pages → GSC 驗證 |
| [自動發文腳本_規格書.md](自動發文腳本_規格書.md) | CCR Autopilot 規格、TG Bot 確認機制 |
| [session_寫手提示詞_ys評測優惠.md](session_寫手提示詞_ys評測優惠.md) | Claude Prompt 模板：評測文 & 優惠攻略文 |
| [seo-progress.md](seo-progress.md) | `/seo-coach` 跨對話進度追蹤（自動維護） |

---

## SEO 工具（Claude Code）

三個工具已安裝為 Claude Code Plugin：

```bash
# 全站完整審核（每月）→ 輸出 FULL-AUDIT-REPORT.md + ACTION-PLAN.md
/seo audit https://ys89.fun

# 251條技術規則審核（解決 404 / redirect / robots 問題）
/seo-audit https://ys89.fun

# SEO 陪跑教練（每週）→ 自動維護 seo-progress.md
/seo-coach
```

詳細指令與操作節奏見 [SEO-GUIDE.html](SEO-GUIDE.html)。

---

## Autopilot 自動化系統

```
每週一 09:03 CCR 自動觸發
  → 拉 Ubersuggest 數據（自站 + 6個競爭者）
  → Claude 分析：黃金機會頁、被超車頁、市場新詞
  → 低風險改動自動執行 + deploy
  → 中高風險改動發 TG 通知等待確認
  → 每週報告存 seo_reports/weekly_YYYY-MM-DD.md
```

TG Bot：`@Seoys1688_bot` ｜ PM2：`pm2 status seo-tg-bot`

---

## 技術規格

- **部署**：Cloudflare Pages Direct Upload（`npx wrangler pages deploy`）
- **主站**：WordPress on Cloudways VPS（`152.42.250.98`）
- **Git**：`ysyyds1688-maker` / commit message 英文（Cloudflare API 限制）
- **聯盟連結**：`https://lihi2.me/ho943`

---

## 待辦（本週優先）

- [ ] 修復 `wc.ys89.fun` 3個 redirect error → `/seo technical wc.ys89.fun`
- [ ] 找出 `ys89.fun` 3個 404 → `/seo-audit ys89.fun`
- [ ] bonus / usdt / slot / out / sport 五站提交 GSC sitemap
- [ ] `wc.ys89.fun` AEO 優化 → `/seo aeo wc.ys89.fun`（6/11 世足開賽前）

---

> 內部文件，noindex。更新時間：2026/05/12
