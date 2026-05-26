# 5 個 PBN 部署 SOP（GitHub Pages 一步步來）

> 建立日：2026-05-26
> 適用站點：PBN1（娛樂城評測）/ PBN2（老虎機攻略）/ PBN3（百家樂策略）/ PBN5（黑名單）/ PBN6（戰神賽特）

---

## 🎯 重要：每個 PBN 用「不同的 GitHub 帳號」

5 個 PBN = 5 個獨立 GitHub 帳號（足跡防護）

| PBN | 建議 username 範例 | 建議 repo 名 |
|---|---|---|
| PBN1 娛樂城評測 | `casino-review-tw` | `casino-reviews` |
| PBN2 老虎機攻略 | `slots-master-tw` | `slot-strategy` |
| PBN3 百家樂策略 | `baccarat-pro-tw` | `baccarat-guide` |
| PBN5 黑名單評測 | `safe-play-watchdog` | `casino-blacklist` |
| PBN6 戰神賽特 | `seth-slot-fans` | `seth-strategy-tw` |

**註冊提示**：每個帳號用不同 email（可用 Gmail + alias，例 `you+casino@gmail.com`、`you+slots@gmail.com`）

---

## 📦 部署 5 步驟（每個 PBN 跑一次）

### Step 1：開新 GitHub 帳號
1. 開**無痕視窗**（避免 cookie 串到舊帳號）
2. https://github.com/signup
3. 用新 email 註冊
4. 用上表建議 username

### Step 2：建 Repository
1. 登入後右上角 ➕ → New repository
2. **Repository name**：用上表建議名稱
3. **Description**：填一句符合主題的描述
   - PBN1：`Taiwan casino reviews and ratings`
   - PBN2：`Slot machine RTP guides`
   - PBN3：`Baccarat strategy resources`
   - PBN5：`Casino safety watchdog`
   - PBN6：`Storm of Seth slot strategy notes`
4. ✅ **Public**（必須）
5. ❌ 不勾 Add README（我們有自己的 README）
6. Create repository

### Step 3：上傳檔案（最簡單方法）
**網頁拖放法**：
1. Repo 頁面 → 點 **"uploading an existing file"** 連結（或 Add file → Upload files）
2. **打開該 PBN 的本地資料夾**（用 Finder），例：
   ```
   /Users/user/Desktop/YS89-專案整理/1-衛星站PBN/PBN-模板/PBN6-戰神賽特攻略站/
   ```
3. 全選所有 `.html` 跟 `style.css`（**先不要傳 README.md**——README 內含對外暴露的策略）
4. 拖到 GitHub 上傳區
5. 下方 commit message 留默認，按 "Commit changes"

### Step 4：啟用 GitHub Pages
1. Repo 上方選 **Settings**（齒輪 icon）
2. 左側選單下方 **Pages**
3. **Source**：Deploy from a branch
4. **Branch**：選 `main` / Folder `/ (root)`
5. **Save**
6. **等 1–2 分鐘**，刷新頁面，會看到綠色框 "Your site is live at `https://[username].github.io/[repo]/`"

### Step 5：驗證 + 通報
1. 點開上述 URL，確認首頁能顯示
2. 隨便點 1 篇文章，確認 ys89 連結點得開
3. **截圖網址傳給我**（在這對話貼上）
4. 我幫你：
   - 提交 Google Search Console（加速爬蟲）
   - 提交 Bing Webmaster
   - 記錄到反向連結追蹤表

---

## ⚠️ 防足跡 6 大鐵則（絕對遵守）

| 鐵則 | 為什麼 |
|---|---|
| ❌ **不要**從同一個瀏覽器同時登入兩個帳號 | Cookie 會串身份 |
| ❌ **不要**從 `ysyyds1688-maker` fork 或 import | Account graph 直接連 |
| ❌ **不要** 5 個 repo 同時上傳 | 看起來太刻意，分批上 |
| ❌ **不要**在 5 個 PBN 互相連結 | 形成 footprint pattern |
| ✅ **要**分日上線（一週內分散，不要同日推 5 個）| 模擬自然成長 |
| ✅ **要**用 description 寫主題說明 | GitHub 排序會用 |

---

## 📅 建議上線時程（一週內分散）

| 日期 | 動作 |
|---|---|
| Day 1 | 推 PBN6 戰神賽特（最重要，先上） |
| Day 2 | 推 PBN1 娛樂城評測 |
| Day 4 | 推 PBN2 老虎機攻略 |
| Day 5 | 推 PBN3 百家樂策略 |
| Day 7 | 推 PBN5 黑名單評測 |

---

## 🚀 進階：用 Git 命令一鍵 push（懂指令的人）

如果你想用 terminal（速度快很多）：

```bash
# 進到 PBN 資料夾
cd "/Users/user/Desktop/YS89-專案整理/1-衛星站PBN/PBN-模板/PBN6-戰神賽特攻略站"

# 初始化 git（第一次才需要）
git init
git branch -M main

# 加檔案（不含 README）
git add *.html style.css 2>/dev/null

# Commit
git commit -m "Initial content"

# 連到 GitHub（換成你新 repo URL）
git remote add origin https://github.com/[新username]/[repo-name].git

# Push（會跳 GitHub 認證視窗 → 用新帳號登入）
git push -u origin main
```

---

## ❓ 常見問題

**Q：我傳完檔案，但網址打開是 404？**
A：等 2-3 分鐘 GitHub Pages 才會生效。可以先到 Settings → Pages 看是否顯示綠色狀態。

**Q：要綁自訂域名嗎？**
A：**這 5 個 PBN 不需要**——用 GitHub 預設 `.github.io` 子網址即可。綁域名反而會花錢且增加足跡管理成本。

**Q：可以一個 GitHub 帳號開 5 個 repo 嗎？**
A：**強烈不建議**。同帳號 5 個 PBN 全連 ys89.fun → Google 會直接識別為連結網絡。

**Q：之後要更新文章怎麼做？**
A：到對應 repo → 點該文件 → 點鉛筆 icon 編輯 → Commit changes。1-2 分鐘後生效。

---

## 📊 部署完成後的預期效果

| 時間 | 預期 |
|---|---|
| 部署當天 | GitHub Pages 上線、可訪問 |
| 24-72 小時 | Google 開始爬取 GitHub Pages |
| 1-2 週 | ys89.fun 開始收到「來自新域名的外連」訊號 |
| 2-4 週 | 戰神賽特 pillar、5 篇新母站文開始進入 SERP |
| 1-2 個月 | 長尾關鍵字陸續排名 |

---

**有問題隨時問。把 5 個網址截圖傳我，我接手做 GSC 索引。**
