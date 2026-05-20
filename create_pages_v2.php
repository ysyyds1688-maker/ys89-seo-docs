<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

// WordPress 自動匹配 page-{slug}.php，不用明確設 page_template

$pages = [
    ['slug'=>'games',           'title'=>'娛樂城遊戲大廳｜老虎機、百家樂、體育投注全覽', 'parent'=>0, 'fk'=>'娛樂城遊戲',  'desc'=>'娛樂城遊戲大廳收錄老虎機、真人百家樂、體育投注、捕魚機、棋牌遊戲。多家頂級廠商任選，立即查看詳情。'],
    ['slug'=>'promotions',      'title'=>'夜色娛樂城優惠活動｜體驗金、首儲、返水完整懶人包', 'parent'=>0, 'fk'=>'娛樂城優惠', 'desc'=>'夜色娛樂城所有優惠活動：NT$368 體驗金、首儲 100% 加碼、返水獎勵。最完整優惠清單。'],
    ['slug'=>'recommendations', 'title'=>'2026 娛樂城推薦｜出金穩、優惠多、評價佳 5 個平台', 'parent'=>0, 'fk'=>'娛樂城推薦', 'desc'=>'2026 年最新娛樂城推薦：出金穩定、優惠最多、PTT 評價佳的 5 個合法平台完整比較。'],
    ['slug'=>'guides',          'title'=>'娛樂城新手教學中心｜註冊、入金、出金、遊戲完整指南', 'parent'=>0, 'fk'=>'娛樂城教學', 'desc'=>'從註冊到出金的完整娛樂城教學。新手必看：開戶流程、入金方式、提款步驟、遊戲規則。'],
];

foreach ($pages as $cfg) {
    $existing = get_page_by_path($cfg['slug']);
    if ($existing) {
        echo "/{$cfg['slug']}/ already exists (ID {$existing->ID})\n";
        $post_id = $existing->ID;
    } else {
        $post_id = wp_insert_post([
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_title'   => $cfg['title'],
            'post_name'    => $cfg['slug'],
            'post_parent'  => $cfg['parent'],
            'post_content' => '',
            'post_author'  => 1,
        ], true);
        if (is_wp_error($post_id)) {
            echo "ERROR /{$cfg['slug']}/: " . $post_id->get_error_message() . "\n";
            continue;
        }
        echo "Created /{$cfg['slug']}/ (ID $post_id) → auto-uses page-{$cfg['slug']}.php\n";
    }
    update_post_meta($post_id, 'rank_math_focus_keyword', $cfg['fk']);
    update_post_meta($post_id, 'rank_math_description', $cfg['desc']);
}

// /games/ 子頁面
$games_parent = get_page_by_path('games');
if ($games_parent) {
    $sub_games = [
        ['slug'=>'baccarat',   'title'=>'真人百家樂｜2026 線上百家樂完整指南'],
        ['slug'=>'electronic', 'title'=>'電子遊戲（老虎機）｜高 RTP 機台推薦'],
        ['slug'=>'sports',     'title'=>'體育投注｜NBA、世足、棒球完整賠率指南'],
        ['slug'=>'poker',      'title'=>'棋牌遊戲｜德州撲克、21 點、鬥地主完整教學'],
        ['slug'=>'fishing',    'title'=>'捕魚機遊戲｜獎金豐厚機台推薦與技巧'],
        ['slug'=>'lottery',    'title'=>'線上彩票｜時時彩、快三、六合彩完整指南'],
    ];
    foreach ($sub_games as $sg) {
        $existing = get_page_by_path("games/{$sg['slug']}");
        if ($existing) {
            echo "/games/{$sg['slug']}/ already exists (ID {$existing->ID})\n";
            continue;
        }
        $post_id = wp_insert_post([
            'post_type'   => 'page',
            'post_status' => 'publish',
            'post_title'  => $sg['title'],
            'post_name'   => $sg['slug'],
            'post_parent' => $games_parent->ID,
            'post_author' => 1,
        ], true);
        if (is_wp_error($post_id)) {
            echo "ERROR /games/{$sg['slug']}/: " . $post_id->get_error_message() . "\n";
        } else {
            // page-games-{slug}.php 會被 WP 自動匹配
            echo "Created /games/{$sg['slug']}/ (ID $post_id)\n";
        }
    }
}

// 刷新
flush_rewrite_rules(true);
delete_transient('rank_math_sitemap_cache');
echo "\n===== DONE =====\n";
