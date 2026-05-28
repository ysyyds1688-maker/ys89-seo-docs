# 🛡 Footprint 防護鐵則總表

> 集中所有 PBN / 衛星站 / 社群矩陣的「絕對不能做」清單
> 散在各文件的規則整合到這裡，每次新增站點前先檢查

---

## 📋 PBN CF 帳號分配現況（2026-05-28 更新）

| PBN | CF 帳號 | 機房 | 狀態 |
|---|---|---|---|
| hipgreenscene | plorunyuan@gmail.com | - | Tier4 既有 |
| deckmatt | marsgarage0812@gmail.com | - | Tier4 既有 |
| adviseist | (與 pansurihotel 共用) | US | Tier4 既有 |
| pansurihotel | (與 adviseist 共用) | US | ✅ 已上線 |
| bolalive77 | yuan5566520 | - | ✅ 已上線 |
| plainjanedesigners | yuan5566520 | - | ⏳ 待部署 |

> **⚠️ 半隔離注意**：adviseist + pansurihotel 共用同 CF + 同 US 機房 → 主題語言不同（英文商業 vs 繁中旅遊）勉強降低 pattern 風險，但出鏈回 ys89 必須**錯開 3-5 天**，避免「同帳號 + 同時段」雙重 footprint。
>
> bolalive77 + plainjanedesigners 共用 yuan5566520 帳號可接受 → 因為兩站都不直接連 ys89，是「反詐主題群」獨立網絡。

---

## 🔴 致命違規（一犯就連坐）

### 1. Google Analytics tracking ID 共用
- ❌ 多站共用同一個 GA `G-XXXXXXX`
- ✅ 每站獨立 GA tracking ID
- **後果**：Google 內部直接連到「同一個 owner」

### 2. WordPress 同一個 admin email
- ❌ 多站用同個 email 註冊 WP
- ✅ 每站獨立 email
- **後果**：Google 帳戶圖譜串接

### 3. 多站交叉互連
- ❌ PBN A 連到 PBN B 連到 PBN C
- ✅ 每站只連到母站，不互連
- **後果**：明顯的 link network pattern

### 4. 共用 favicon URL
- ❌ 用同個 CDN 上的 favicon
- ✅ 每站獨立 favicon 圖檔
- **後果**：Google reverse image search 抓到

---

## 🟡 高風險（會被識別為同源）

### 5. 同樣的 template / theme
- ❌ 5 個 PBN 用同一個 WordPress theme
- ✅ 每站完全不同的 layout、color、font
- **後果**：HTML structure footprint

### 6. 同樣的 anchor text 套用
- ❌ 10 篇文章都用「最值得參考的娛樂城評比」連 ys89.fun
- ✅ Anchor text 多樣化（描述性短語、變體輪流）
- **後果**：明顯的 link-building pattern

### 7. 同一個瀏覽器登入多帳號
- ❌ Chrome 登入 5 個 CF / GSC 帳號
- ✅ 不同 browser profile + 無痕視窗 + 不同 VPN/IP
- **後果**：Cookie / IP 串身份

### 8. 同樣的 GitHub 帳號開多個 PBN
- ❌ ysyyds1688-maker 一個帳號開 5 個 GitHub Pages
- ✅ 每站獨立 GitHub 帳號
- **後果**：account graph 連接

### 9. PBN 上放編輯部 5 編輯名字
- ❌ PBN 作者寫「電玩凱凱 / 阿奇 / mark」（這些已在 ys89.fun 上）
- ✅ PBN 用獨立筆名（例 Allen 林志雄 / Daniel 吳）
- **後果**：同人寫多站 = footprint

### 10. PBN 上放品牌 IG
- ❌ bolalive77 footer 放 @noloxd6467 / @uncle_wc
- ✅ PBN 上完全不提品牌 IG（即使不放連結也不 mention）
- **後果**：social graph 連接

---

## 🟢 安全可共用（不算 footprint）

| 項目 | 為什麼 OK |
|---|---|
| Cloudflare 帳號 | 一般用戶就會多 domain |
| Domain registrar（GoDaddy / CF）| 普通行為 |
| CF 預設 SSL 證書 | 共用 CF 共用 IP 範圍 |
| Google Fonts | 全網都用 |

---

## 📋 新增 PBN 前 Checklist

開新站前確認：

- [ ] 全新 Gmail（不同手機驗證）
- [ ] 全新 Cloudflare 帳號（用上面新 Gmail）
- [ ] 全新 GSC（同個新 Gmail）
- [ ] 全新 GA tracking ID
- [ ] 全新 GitHub 帳號（如果用 Pages）
- [ ] 完全不同的 theme / template / color scheme
- [ ] 獨立筆名（不重複既有編輯部）
- [ ] 不放任何品牌 IG mention
- [ ] 不連到其他 PBN
- [ ] 獨立 favicon

---

## 🚨 緊急應變

如果某 PBN 被 Google 識別 / 收到 manual action：

1. **立刻停止連結**：disavow 該 PBN 對母站的反連
2. **檢查連坐**：用 Ahrefs 看母站有沒有 ranking drop
3. **隔離損害**：把該 PBN domain 完全廢棄（不要修補後重用）
4. **教訓記錄**：在這份文件加 case study

---

## 📚 相關文件

- [PBN 全網絡架構戰略](00-pbn-network-strategy-2026-05-26.html)
- [5 PBN 部署 SOP](strategies-2026-05-26/deploy-sop-5-pbn.md)
- [bolalive77 footprint 警告](archive/persona-social-handoff-old.html)

---

**最後更新**：2026-05-26
**維護原則**：每次發現新 footprint 風險，立刻加進這份文件
