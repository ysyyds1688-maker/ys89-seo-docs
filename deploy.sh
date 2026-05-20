#!/bin/bash
# YS89 SEO Docs - One-click deploy to Cloudflare Pages
# Usage: bash deploy.sh

set -e

cd "$(dirname "$0")"

echo "🚀 YS89 SEO Docs 部署腳本"
echo "========================"

# 1. Git status check
if [[ -n $(git status --porcelain) ]]; then
  echo ""
  echo "⚠️  發現未提交的變更："
  git status --short
  echo ""
  read -p "要先 commit 這些變更嗎？(y/N): " COMMIT_FIRST
  if [[ "$COMMIT_FIRST" =~ ^[Yy]$ ]]; then
    git add -A
    read -p "Commit message: " COMMIT_MSG
    git commit -m "$COMMIT_MSG"
    git push origin main
    echo "✅ Git commit + push 完成"
  else
    echo "⏭️  跳過 git，直接部署當前檔案"
  fi
fi

# 2. Deploy to CF Pages
echo ""
echo "📤 部署到 Cloudflare Pages..."
wrangler pages deploy . \
  --project-name ys89-seo-docs \
  --branch main \
  --commit-dirty=true

# 3. Verify
echo ""
echo "🔍 驗證部署..."
sleep 3

INDEX_CHECK=$(curl -s https://ys89-seo-docs.pages.dev/ | grep -c "YS89")
if [[ $INDEX_CHECK -gt 0 ]]; then
  echo "✅ 主頁可訪問 → https://ys89-seo-docs.pages.dev/"
else
  echo "⚠️  主頁回應異常，請手動檢查"
fi

# 4. Show latest deployments
echo ""
echo "📋 最近 3 次部署："
wrangler pages deployment list --project-name ys89-seo-docs 2>&1 | grep -E "^│" | head -4

echo ""
echo "✨ 完成！記得 hard refresh 瀏覽器看新版本（Cmd+Shift+R）"
