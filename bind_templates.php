<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

$theme_dir = '/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-content/themes/ys-entertainment-theme';

// 映射：[slug_path, template_file, page_title]
$bindings = [
    // /games/ 子分類
    ['games/baccarat',                        'page-games-baccarat.php',                       '真人百家樂頁'],
    ['games/electronic',                      'page-games-electronic.php',                     '電子遊戲頁'],
    ['games/sports',                          'page-games-sports.php',                         '體育投注頁'],
    ['games/poker',                           'page-games-poker.php',                          '棋牌遊戲頁'],
    ['games/fishing',                         'page-games-fishing.php',                        '捕魚機頁'],
    ['games/lottery',                         'page-games-lottery.php',                        '彩票頁'],
    // /guides/ 子頁
    ['guides/casino',                         'page-guides-casino.php',                        '娛樂城教學中心'],
    ['guides/register',                       'page-guides-register.php',                      '註冊教學'],
    ['guides/usdt-deposit',                   'page-guides-usdt-deposit.php',                  'USDT 入金教學'],
    // /guides/games/ 父頁與子分類
    ['guides/games',                          'page-guides-games.php',                         '遊戲攻略中心'],
    ['guides/games/baccarat',                 'page-guides-games-baccarat.php',                '百家樂攻略'],
    ['guides/games/slots',                    'page-guides-games-slots.php',                   '老虎機攻略'],
    ['guides/games/sports',                   'page-guides-games-sports.php',                  '體育投注攻略'],
    ['guides/games/poker',                    'page-guides-games-poker.php',                   '德州撲克攻略'],
    // /guides/games/X/Y/ 最內層
    ['guides/games/baccarat/basics',          'page-guides-games-baccarat-basics.php',         '百家樂基礎'],
    ['guides/games/slots/rtp-guide',          'page-guides-games-slots-rtp-guide.php',         '老虎機 RTP'],
    ['guides/games/poker/starting-hands',     'page-guides-games-poker-starting-hands.php',    '撲克起手牌'],
    // /recommendations/best-casinos/top-2026/ → 2025 template（內容相同，沿用）
    ['recommendations/best-casinos/top-2026', 'page-recommendations-best-casinos-2025.php',    '2026 最佳推薦'],
];

$results = ['template_updated' => 0, 'page_bound' => 0, 'errors' => []];

foreach ($bindings as $b) {
    [$slug_path, $template_file, $title] = $b;
    $full_path = "$theme_dir/$template_file";

    // Step 1: 確認 template 存在 + 加 Template Name header (if 沒有)
    if (!file_exists($full_path)) {
        $results['errors'][] = "MISSING template: $template_file";
        continue;
    }

    $content = file_get_contents($full_path);
    if (strpos($content, 'Template Name:') === false) {
        // 找到第一個 /** ... */ 區塊，把 Template Name 加進去
        if (preg_match('|^<\?php\s*/\*\*(.*?)\*/|s', $content, $m)) {
            $new_header = "<?php\n/**\n * Template Name: $title\n *" . $m[1] . "*/";
            $content = preg_replace('|^<\?php\s*/\*\*(.*?)\*/|s', $new_header, $content, 1);
        } else {
            // 沒 doc comment，直接加在 <?php 後
            $content = preg_replace('|^<\?php|', "<?php\n/**\n * Template Name: $title\n */", $content, 1);
        }
        file_put_contents($full_path, $content);
        $results['template_updated']++;
        echo "✓ Added Template Name to $template_file\n";
    }

    // Step 2: 找對應 WP page + 綁定 template
    $page = get_page_by_path($slug_path);
    if (!$page) {
        $results['errors'][] = "NOT FOUND page: /$slug_path/";
        continue;
    }

    update_post_meta($page->ID, '_wp_page_template', $template_file);
    $results['page_bound']++;
    echo "  → Bound ID {$page->ID} (/$slug_path/) → $template_file\n";
}

flush_rewrite_rules(true);
delete_transient('rank_math_sitemap_cache');

echo "\n===== SUMMARY =====\n";
echo "Templates updated: {$results['template_updated']}\n";
echo "Pages bound:       {$results['page_bound']}\n";
if (!empty($results['errors'])) {
    echo "Errors:\n";
    foreach ($results['errors'] as $e) echo "  - $e\n";
}
