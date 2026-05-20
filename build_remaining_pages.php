<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

$theme_dir = '/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-content/themes/ys-entertainment-theme';

// 修補 12 個 sitemap 404 + 一些 orphan template
$pages = [
    // sitemap 404
    ['blacklist',                  'page-blacklist.php',                  '娛樂城黑名單｜不出金詐騙平台完整紀錄', '娛樂城黑名單', '2026 持續更新的娛樂城黑名單清單：玩家實證不出金、跑路、詐騙紀錄的平台彙整。'],
    ['games/baccarat/db',          'page-games-baccarat-db.php',          '百家樂 DB 系統｜真人遊戲完整介紹',          'DB 百家樂', 'DB 真人系列百家樂遊戲：荷官陣容、桌台規則、技巧解析與優惠領取。'],
    ['games/electronic/atg',       'page-games-electronic-atg.php',       'ATG 電子遊戲完整介紹｜熱門機台與 RTP',      'ATG 電子', 'ATG 電子遊戲廠商完整介紹：熱門老虎機、累積獎池、RTP 數據與選機建議。'],
    ['games/electronic/be',        'page-games-electronic-be.php',        'BE 電子遊戲完整介紹｜熱門機台與優惠',       'BE 電子', 'BE 電子遊戲廠商完整介紹：熱門老虎機、Free Spin 機制、優惠領取教學。'],
    ['games/electronic/cg',        'page-games-electronic-cg.php',        'CG 電子遊戲完整介紹｜經典機台與玩法',       'CG 電子', 'CG 電子遊戲廠商完整介紹：經典老虎機、機台特色、RTP 與優惠資訊。'],
    ['games/electronic/db',        'page-games-electronic-db.php',        'DB 電子遊戲完整介紹｜爆獎機台清單',         'DB 電子', 'DB 電子遊戲廠商：爆獎機台、Jackpot 累積獎池、玩家心得整理。'],
    ['games/electronic/gd',        'page-games-electronic-gd.php',        'GD 電子遊戲完整介紹｜創新主題機台',         'GD 電子', 'GD 電子遊戲廠商：創新主題機台、特色玩法、Free Game 觸發機制完整解析。'],
    ['games/electronic/kt',        'page-games-electronic-kt.php',        'KT 電子遊戲完整介紹｜亞洲熱門機台',         'KT 電子', 'KT 電子遊戲廠商：亞洲熱門機台、東方主題、優惠領取與玩家心得。'],
    ['games/electronic/rsg',       'page-games-electronic-rsg.php',       'RSG 電子遊戲完整介紹｜熱門經典機台',        'RSG 電子', 'RSG 電子遊戲廠商：經典熱門機台、爆獎紀錄、優惠活動完整資訊。'],
    ['games/electronic/we',        'page-games-electronic-we.php',        'WE 電子遊戲完整介紹｜高 RTP 機台精選',      'WE 電子', 'WE 電子遊戲廠商：高 RTP 老虎機精選、特色機制與選機建議。'],
    ['games/poker/db',             'page-games-poker-db.php',             'DB 棋牌遊戲｜德州撲克與 21 點完整介紹',     'DB 棋牌', 'DB 棋牌系列：德州撲克、21 點、鬥地主玩法、桌台選擇與技巧。'],
    // 對 /promotions/first-deposit/ 用 301 跳到既有 /firstdeposit-100/ 之類
    // 先建 page 給它套 template，內容由 PHP 控制
    ['promotions/first-deposit',   'page-first-deposit.php',              '首儲優惠 100% 加碼｜娛樂城新會員專屬',       '首儲優惠', '娛樂城首儲 100% 加碼優惠完整介紹：條件、流水、領取技巧與比較。'],

    // Orphan 但可能有用的
    ['games/slots',                'page-games-slots.php',                '老虎機遊戲大廳｜熱門機台、廠商完整列表',     '線上老虎機', '線上老虎機遊戲大廳：所有合作廠商機台、熱門推薦、RTP 排行與獎池統計。'],
    ['games/esports',              'page-games-esports.php',              '電競投注完整介紹｜英雄聯盟、CS、DOTA 賠率',  '電競投注', '電競投注完整介紹：英雄聯盟、CS:GO、DOTA 賽事賠率、玩法與策略。'],
    ['news',                       'page-news.php',                       'YS89 新聞中心｜娛樂城產業最新動態',           '娛樂城新聞', 'YS89 新聞中心：娛樂城產業最新動態、法律修正、平台動態、世足賽事報導。'],
    ['guides/forgot-password',     'page-guides-forgot-password.php',     '娛樂城密碼救援｜忘記密碼完整重置流程',         '密碼救援', '娛樂城帳號密碼救援完整教學：忘記密碼如何重置、KYC 驗證、安全須知。'],
    ['trust/influencer',           'page-trust-influencer.php',           'YS89 KOL 合作專欄｜業配透明聲明',              'KOL 合作', 'YS89 KOL 合作專欄與業配透明聲明：合作模式、揭露原則與名單公開。'],
    ['trust/security',             'page-trust-security.php',             'YS89 安全聲明｜資料保護、SSL、PCI 認證',       '網站安全聲明', 'YS89 安全聲明：用戶資料保護、SSL 加密、PCI 支付認證與隱私政策。'],
    ['bonus-168',                  'page-bonus-168.php',                  'NT$168 體驗金活動｜免儲值領取教學',             '168 體驗金', 'NT$168 體驗金活動完整教學：領取資格、流水條件、提領技巧。'],
];

$stats = ['template_updated'=>0, 'pages_created'=>0, 'pages_existed'=>0, 'pages_bound'=>0, 'errors'=>[]];

foreach ($pages as $cfg) {
    [$path, $template, $title, $fk, $desc] = $cfg;
    $template_path = "$theme_dir/$template";

    if (!file_exists($template_path)) { $stats['errors'][] = "Missing: $template"; echo "  ⚠ Missing: $template\n"; continue; }

    $content = file_get_contents($template_path);
    if (strpos($content, 'Template Name:') === false) {
        if (preg_match('|^<\?php\s*/\*\*(.*?)\*/|s', $content, $m)) {
            $new = "<?php\n/**\n * Template Name: $title\n *" . $m[1] . "*/";
            $content = preg_replace('|^<\?php\s*/\*\*(.*?)\*/|s', $new, $content, 1);
        } else {
            $content = preg_replace('|^<\?php|', "<?php\n/**\n * Template Name: $title\n */", $content, 1);
        }
        file_put_contents($template_path, $content);
        $stats['template_updated']++;
        echo "✓ Added Template Name to $template\n";
    }

    $segments = explode('/', $path);
    $slug = array_pop($segments);
    $parent_path = implode('/', $segments);
    $parent_id = 0;
    if ($parent_path) {
        $parent = get_page_by_path($parent_path);
        if (!$parent) { $stats['errors'][] = "Missing parent: $parent_path for $path"; echo "  ⚠ Missing parent: $parent_path\n"; continue; }
        $parent_id = $parent->ID;
    }

    $page = get_page_by_path($path);
    if ($page) {
        $pid = $page->ID;
        $stats['pages_existed']++;
        echo "  /$path/ exists (ID $pid)\n";
    } else {
        $pid = wp_insert_post([
            'post_type'=>'page','post_status'=>'publish',
            'post_title'=>$title,'post_name'=>$slug,'post_parent'=>$parent_id,
            'post_content'=>'','post_author'=>1,
        ], true);
        if (is_wp_error($pid)) { $stats['errors'][] = "/$path/: ".$pid->get_error_message(); continue; }
        $stats['pages_created']++;
        echo "  Created /$path/ (ID $pid)\n";
    }

    update_post_meta($pid, '_wp_page_template', $template);
    update_post_meta($pid, 'rank_math_focus_keyword', $fk);
    update_post_meta($pid, 'rank_math_description', $desc);
    $stats['pages_bound']++;
}

flush_rewrite_rules(true);
delete_transient('rank_math_sitemap_cache');

echo "\n===== SUMMARY =====\n";
foreach ($stats as $k=>$v) {
    if (is_array($v)) { if(!empty($v)) { echo "$k:\n"; foreach($v as $e) echo "  - $e\n"; } }
    else echo "$k: $v\n";
}
