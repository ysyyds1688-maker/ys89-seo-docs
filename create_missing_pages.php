<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

// Step 1: 移除我之前設的 5 個 301 redirects (ID 14-18)
if (class_exists('RankMath\Redirections\DB')) {
    foreach ([14, 15, 16, 17, 18] as $rid) {
        $deleted = \RankMath\Redirections\DB::delete($rid);
        echo "Removed redirect ID $rid: " . ($deleted ? 'OK' : 'not found') . "\n";
    }
}

// Step 2: 建立 5 個 Page，套用對應 theme template
$pages = [
    [
        'slug'     => 'games',
        'title'    => '娛樂城遊戲大廳｜老虎機、百家樂、體育投注全覽',
        'template' => 'page-games.php',
        'fk'       => '娛樂城遊戲',
        'desc'     => '娛樂城遊戲大廳收錄老虎機、真人百家樂、體育投注、捕魚機、棋牌遊戲。多家頂級廠商任選，立即查看詳情。',
    ],
    [
        'slug'     => 'promotions',
        'title'    => '夜色娛樂城優惠活動｜體驗金、首儲、返水完整懶人包',
        'template' => 'page-promotions.php',
        'fk'       => '娛樂城優惠',
        'desc'     => '夜色娛樂城所有優惠活動一次看完：NT$368 體驗金、首儲 100% 加碼、返水獎勵。最完整的優惠清單。',
    ],
    [
        'slug'     => 'recommendations',
        'title'    => '2026 娛樂城推薦｜出金穩、優惠多、評價佳的 5 個平台',
        'template' => 'page-recommendations.php',
        'fk'       => '娛樂城推薦',
        'desc'     => '2026 年最新娛樂城推薦清單：出金穩定、優惠最多、PTT 評價佳的 5 個合法平台完整比較。',
    ],
    [
        'slug'     => 'guides',
        'title'    => '娛樂城新手教學中心｜註冊、入金、出金、遊戲完整指南',
        'template' => 'page-guides.php',
        'fk'       => '娛樂城教學',
        'desc'     => '從註冊到出金的完整娛樂城教學。新手必看：開戶流程、入金方式、提款步驟、遊戲規則一次學會。',
    ],
];

foreach ($pages as $cfg) {
    // 若已存在則更新，否則建立
    $existing = get_page_by_path($cfg['slug']);
    if ($existing) {
        $post_id = wp_update_post([
            'ID'           => $existing->ID,
            'post_status'  => 'publish',
            'post_title'   => $cfg['title'],
        ]);
        update_post_meta($post_id, '_wp_page_template', $cfg['template']);
        echo "Updated existing page: /{$cfg['slug']}/ (ID $post_id)\n";
    } else {
        $post_id = wp_insert_post([
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'post_title'     => $cfg['title'],
            'post_name'      => $cfg['slug'],
            'post_content'   => '',  // template 內容由 PHP 模板提供
            'post_author'    => 1,
            'page_template'  => $cfg['template'],
        ], true);
        if (is_wp_error($post_id)) {
            echo "ERROR creating /{$cfg['slug']}/: " . $post_id->get_error_message() . "\n";
            continue;
        }
        update_post_meta($post_id, '_wp_page_template', $cfg['template']);
        echo "Created /{$cfg['slug']}/ (ID $post_id) → template $cfg[template]\n";
    }
    // Rank Math meta
    update_post_meta($post_id, 'rank_math_focus_keyword', $cfg['fk']);
    update_post_meta($post_id, 'rank_math_description', $cfg['desc']);
}

// Step 3: 建立 /guides/register/ (nested under guides)
$parent = get_page_by_path('guides');
if ($parent) {
    $register = get_page_by_path('guides/register');
    if (!$register) {
        $post_id = wp_insert_post([
            'post_type'     => 'page',
            'post_status'   => 'publish',
            'post_title'    => '娛樂城註冊步驟完整教學｜實名認證 + 安全須知',
            'post_name'     => 'register',
            'post_parent'   => $parent->ID,
            'page_template' => 'page-guides-register.php',
            'post_author'   => 1,
        ], true);
        if (!is_wp_error($post_id)) {
            update_post_meta($post_id, '_wp_page_template', 'page-guides-register.php');
            update_post_meta($post_id, 'rank_math_focus_keyword', '娛樂城註冊');
            update_post_meta($post_id, 'rank_math_description', '娛樂城註冊步驟完整教學：開戶流程、實名認證、安全須知一次說明。新手 5 分鐘搞懂註冊流程。');
            echo "Created /guides/register/ (ID $post_id)\n";
        }
    } else {
        echo "/guides/register/ already exists (ID {$register->ID})\n";
    }
}

// Step 4: 建立 /games/ 子分類（讓首頁的 card 連結都有頁面）
$games_parent = get_page_by_path('games');
if ($games_parent) {
    $sub_games = [
        ['slug'=>'baccarat',  'title'=>'真人百家樂｜2026 線上百家樂完整指南',           'template'=>'page-games-baccarat.php'],
        ['slug'=>'electronic','title'=>'電子遊戲（老虎機）｜高 RTP 機台推薦',           'template'=>'page-games-electronic.php'],
        ['slug'=>'sports',    'title'=>'體育投注｜NBA、世足、棒球完整賠率指南',         'template'=>'page-games-sports.php'],
        ['slug'=>'poker',     'title'=>'棋牌遊戲｜德州撲克、21 點、鬥地主完整教學',     'template'=>'page-games-poker.php'],
        ['slug'=>'fishing',   'title'=>'捕魚機遊戲｜獎金豐厚機台推薦與技巧',           'template'=>'page-games-fishing.php'],
        ['slug'=>'lottery',   'title'=>'線上彩票｜時時彩、快三、六合彩完整指南',       'template'=>'page-games-lottery.php'],
    ];
    foreach ($sub_games as $sg) {
        $existing = get_page_by_path("games/$sg[slug]");
        if ($existing) {
            echo "/games/$sg[slug]/ already exists (ID {$existing->ID})\n";
            continue;
        }
        $post_id = wp_insert_post([
            'post_type'     => 'page',
            'post_status'   => 'publish',
            'post_title'    => $sg['title'],
            'post_name'     => $sg['slug'],
            'post_parent'   => $games_parent->ID,
            'page_template' => $sg['template'],
            'post_author'   => 1,
        ], true);
        if (!is_wp_error($post_id)) {
            update_post_meta($post_id, '_wp_page_template', $sg['template']);
            echo "Created /games/$sg[slug]/ (ID $post_id)\n";
        } else {
            echo "ERROR /games/$sg[slug]/: " . $post_id->get_error_message() . "\n";
        }
    }
}

// Step 5: 刷新 permalink 結構
flush_rewrite_rules(true);
echo "\nPermalink rules flushed\n";

// Step 6: 清快取
delete_transient('rank_math_sitemap_cache');
delete_option('rank_math_seo_analysis_results');
echo "Rank Math cache cleared\n";

echo "\n===== DONE =====\n";
