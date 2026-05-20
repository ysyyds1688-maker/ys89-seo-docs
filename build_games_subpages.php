<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

$theme_dir = '/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-content/themes/ys-entertainment-theme';

// [slug_path, template, title, fk, desc]
$pages = [
    // baccarat 子頁
    ['guides/games/baccarat/road-reading',       'page-guides-games-baccarat-road-reading.php',       '百家樂看路法完整教學｜大路、小路、眼鏡路解析',     '百家樂看路', '百家樂路單看法完整教學：大路、小路、眼鏡路、蟑螂路判讀技巧與實戰應用。'],
    ['guides/games/baccarat/betting-strategy',   'page-guides-games-baccarat-betting-strategy.php',   '百家樂下注策略｜平注、馬丁、費波那契比較',         '百家樂策略', '百家樂下注策略完整比較：平注、馬丁格爾、費波那契、纜法的優劣與適用情境。'],
    ['guides/games/baccarat/advanced-tips',      'page-guides-games-baccarat-advanced-tips.php',      '百家樂進階技巧｜止損、加倍、心態管理',             '百家樂技巧', '百家樂進階玩家技巧：止損點設定、加倍時機、心態管理與長期獲利策略。'],
    // slots 子頁
    ['guides/games/slots/volatility',            'page-guides-games-slots-volatility.php',            '老虎機波動性完整教學｜高低波動該選哪個',           '老虎機波動性', '老虎機波動性 (Volatility) 完整解析：高/中/低波動機台差異與選擇建議。'],
    ['guides/games/slots/jackpot-strategy',      'page-guides-games-slots-jackpot-strategy.php',      '老虎機 Jackpot 策略｜累積獎池玩法完整指南',         '老虎機 Jackpot', '老虎機累積獎池 (Jackpot) 完整玩法：機制解析、觸發機率、選機策略與資金管理。'],
    // poker 子頁
    ['guides/games/poker/position-play',         'page-guides-games-poker-position-play.php',         '德州撲克位置打法｜按鈕、盲注、中間位完整解析',     '撲克位置', '德州撲克位置打法完整教學：按鈕位、盲注位、中間位的策略差異與實戰應用。'],
    ['guides/games/poker/tournament-strategy',   'page-guides-games-poker-tournament-strategy.php',   '德州撲克錦標賽策略｜MTT 完整玩法指南',             '撲克錦標賽', '德州撲克錦標賽 (MTT) 策略完整指南：早期、中期、後期不同階段的打法調整。'],
    // sports 子頁
    ['guides/games/sports/odds-analysis',        'page-guides-games-sports-odds-analysis.php',        '體育投注賠率分析｜美式、歐式、香港式完整對照',     '體育賠率分析', '體育投注賠率完整解析：美式、歐式、香港式賠率的計算方法與選擇技巧。'],
    ['guides/games/sports/live-betting',         'page-guides-games-sports-live-betting.php',         '滾球投注教學｜即時下注策略與賠率閃跳對策',         '滾球投注', '體育滾球投注完整教學：即時下注策略、賠率閃跳對策、適合的賽事類型。'],
    ['guides/games/sports/bankroll-management',  'page-guides-games-sports-bankroll-management.php',  '體育投注資金管理｜Kelly 公式與止損策略',           '體育資金管理', '體育投注資金管理完整教學：Kelly 公式應用、止損策略、長期穩定獲利的關鍵。'],
];

$stats = ['template_updated'=>0, 'pages_created'=>0, 'pages_existed'=>0, 'pages_bound'=>0, 'errors'=>[]];

foreach ($pages as $cfg) {
    [$path, $template, $title, $fk, $desc] = $cfg;
    $template_path = "$theme_dir/$template";

    // 1. Template Name header
    if (!file_exists($template_path)) {
        $stats['errors'][] = "Missing template: $template";
        echo "  ⚠ Missing template: $template\n";
        continue;
    }
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

    // 2. Parent chain
    $segments = explode('/', $path);
    $slug = array_pop($segments);
    $parent_path = implode('/', $segments);
    $parent = get_page_by_path($parent_path);
    if (!$parent) {
        $stats['errors'][] = "Missing parent: $parent_path";
        echo "  ⚠ Missing parent: $parent_path\n";
        continue;
    }

    // 3. Create or find page
    $page = get_page_by_path($path);
    if ($page) {
        $pid = $page->ID;
        $stats['pages_existed']++;
        echo "  /$path/ exists (ID $pid)\n";
    } else {
        $pid = wp_insert_post([
            'post_type'=>'page','post_status'=>'publish',
            'post_title'=>$title,'post_name'=>$slug,'post_parent'=>$parent->ID,
            'post_content'=>'','post_author'=>1,
        ], true);
        if (is_wp_error($pid)) { $stats['errors'][] = "/$path/: ".$pid->get_error_message(); continue; }
        $stats['pages_created']++;
        echo "  Created /$path/ (ID $pid)\n";
    }

    // 4. Bind
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
