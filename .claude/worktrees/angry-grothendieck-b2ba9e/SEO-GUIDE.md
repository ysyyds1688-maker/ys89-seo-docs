# SEO 工具使用指南 — ys89 站群

> 三個工具分工：`/seo` 出報告 → `/seo-audit` 查問題 → `/seo-coach` 學習追蹤

---

## 📁 工作空間結構

```
~/Desktop/seo-workspace/
├── SEO-GUIDE.md          ← 本文件（使用說明）
├── seo-progress.md       ← /seo-coach 自動維護（進度追蹤）
├── seo-actions.md        ← /seo-coach 自動維護（待辦事項）
├── reports/              ← /seo 審核報告存放
│   ├── ys89.fun/
│   ├── wc.ys89.fun/
│   └── player-one-site/
├── audits/               ← /seo-audit 技術審核結果
└── progress/             ← 手動記錄的每週進度
```

---

## 🛠 三個工具怎麼用

---

### 工具 1：`/seo` — Agentic SEO（主力審核）

**最完整的工具，輸出兩個 MD 檔案。**

#### 基本指令
```
/seo audit https://ys89.fun
/seo audit https://wc.ys89.fun
/seo audit https://player-one-site.pages.dev
```

#### 自動輸出（在當前資料夾）
- `FULL-AUDIT-REPORT.md` — 完整發現報告（技術/內容/Schema/效能）
- `ACTION-PLAN.md` — 優先修復清單（Critical → High → Medium → Low）

#### 子指令清單
| 指令 | 用途 |
|---|---|
| `/seo audit <url>` | 全站審核（會輸出兩份 MD）|
| `/seo page <url>` | 單頁深度分析 |
| `/seo technical <url>` | 技術 SEO 檢查 |
| `/seo content <url>` | 內容品質 + E-E-A-T |
| `/seo schema <url>` | Schema/結構化資料 |
| `/seo aeo <url>` | AI 搜尋優化（Featured Snippet）|
| `/seo geo <url>` | GEO（AI 引擎可見度）|
| `/seo links <url>` | 外鏈分析 |
| `/seo plan <url>` | 策略規劃 |

#### 建議用法（cd 到指定資料夾再執行）
```bash
cd ~/Desktop/seo-workspace/reports/ys89.fun
# 然後在 Claude 輸入：
/seo audit https://ys89.fun
```
報告會存在 `~/Desktop/seo-workspace/reports/ys89.fun/` 裡面。

---

### 工具 2：`/seo-audit` — SEOmator（251條技術規則）

**技術 SEO 最詳細，輸出 A-F 健康分數。**

#### 指令
```
/seo-audit https://ys89.fun
```

#### 輸出內容
- 整體健康分數（A-F）
- 20個分類逐條結果：核心SEO、效能、連結、圖片、安全、E-E-A-T、AI/GEO 準備度等
- 每條問題附有：嚴重等級、受影響 URL、修復建議

#### 特別好用的場景
- 修復 GSC 的 404 / redirect error（它會找出具體 URL）
- 檢查 robots.txt / sitemap 問題
- AI/GEO 準備度（llms.txt 是否需要加）

---

### 工具 3：`/seo-coach` — SEO 陪跑教練

**跨對話記憶，適合長期追蹤進度。**

#### 啟動方式
```
/seo-coach
```
或直接給網址：
```
/seo-coach https://ys89.fun
```

#### 自動維護兩個 MD 檔（跨對話持續累積）
- `seo-progress.md` — 學習進度、已完成事項、重點發現
- `seo-actions.md` — 待辦清單、冷卻中項目、修復狀態

> ⚠️ 這兩個檔案需要放在 Claude 可以讀寫的資料夾。建議放在：
> `~/Desktop/seo-workspace/`

#### 使用流程
1. 第一次：`/seo-coach` → AK 教練引導你選方向
2. 之後每次：AK 自動讀 `seo-progress.md`，繼續上次進度
3. 問概念：`/seo-coach canonical 是什麼？`
4. 看 GSC 數據：`/seo-coach 我的網站曝光 0 怎麼辦`

---

## 📋 本站 SEO 現況快速參考

| 站台 | GSC點擊(90天) | 已索引 | 主要問題 |
|---|---|---|---|
| ys89.fun | 39（純品牌） | 53 | 41未索引、3個404、17個canonical問題 |
| wc.ys89.fun | 0 | 5 | 3個redirect error |
| player-one-site.pages.dev | 0 | 未知 | 剛驗證 |
| DA | 2 | Backlinks: 19 | 全是自家站互連 |

---

## 🗓 建議操作節奏

### 每週一（30分鐘）
```
cd ~/Desktop/seo-workspace/reports/ys89.fun
/seo technical https://ys89.fun      ← 技術問題追蹤
/seo technical https://wc.ys89.fun
```

### 每月第一天（1小時）
```
/seo audit https://ys89.fun          ← 完整報告（存 FULL-AUDIT-REPORT.md）
/seo audit https://wc.ys89.fun
/seo audit https://player-one-site.pages.dev
```

### 需要學習時
```
/seo-coach                           ← AK 陪跑教練
```

---

## ⚡ 立即要做的三件事

1. **修復 wc.ys89.fun redirect errors**
   ```
   /seo technical https://wc.ys89.fun
   ```

2. **找出 ys89.fun 的 3個404**
   ```
   /seo-audit https://ys89.fun
   ```

3. **世足賽關鍵字衝刺（6月開賽前）**
   ```
   /seo content https://wc.ys89.fun
   /seo aeo https://wc.ys89.fun
   ```
