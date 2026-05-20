<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

function create_page_if_missing($path, $title, $parent_id = 0, $fk = '', $desc = '') {
    $existing = get_page_by_path($path);
    if ($existing) {
        echo "/$path/ already exists (ID {$existing->ID})\n";
        return $existing->ID;
    }
    $segments = explode('/', $path);
    $slug = end($segments);
    $post_id = wp_insert_post([
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_parent'  => $parent_id,
        'post_content' => '',
        'post_author'  => 1,
    ], true);
    if (is_wp_error($post_id)) {
        echo "ERROR /$path/: " . $post_id->get_error_message() . "\n";
        return false;
    }
    if ($fk) update_post_meta($post_id, 'rank_math_focus_keyword', $fk);
    if ($desc) update_post_meta($post_id, 'rank_math_description', $desc);
    echo "Created /$path/ (ID $post_id)\n";
    return $post_id;
}

// Level 1: 缺的 guides 子頁
$guides = get_page_by_path('guides');
$guides_id = $guides ? $guides->ID : 0;

create_page_if_missing('guides/casino', '娛樂城教學中心｜註冊、入金、出金、優惠完整指南', $guides_id, '娛樂城教學', '從零開始的娛樂城完整教學：註冊、入金、出金、優惠領取所有步驟一篇看完。');
create_page_if_missing('guides/usdt-deposit', 'USDT 入金教學｜2026 加密貨幣存款完整指南', $guides_id, 'USDT 入金', '使用 USDT/Tether 入金娛樂城的完整教學：錢包準備、轉帳步驟、注意事項與常見問題。');

// Level 2: guides/games 父頁面
$guides_games_id = create_page_if_missing('guides/games', '遊戲攻略中心｜百家樂、老虎機、體育、撲克完整教學', $guides_id, '遊戲攻略', '所有娛樂城遊戲的攻略集合：百家樂、老虎機、體育投注、德州撲克完整玩法教學與技巧。');

if ($guides_games_id) {
    // Level 3: 4 大遊戲攻略分類
    $baccarat_id = create_page_if_missing('guides/games/baccarat', '百家樂攻略｜2026 完整玩法、看路、押注策略', $guides_games_id, '百家樂攻略', '百家樂從新手到進階的完整攻略：規則、看路法、押注策略、常見錯誤完整解析。');
    $slots_id    = create_page_if_missing('guides/games/slots', '老虎機攻略｜RTP、波動性、Jackpot 全教學', $guides_games_id, '老虎機攻略', '老虎機完整攻略：RTP 解讀、波動性差異、Jackpot 觸發機制、選機台技巧一次學會。');
    $sports_id   = create_page_if_missing('guides/games/sports', '體育投注攻略｜賠率分析、滾球、資金管理', $guides_games_id, '體育投注攻略', '體育投注完整教學：賠率分析、滾球策略、資金管理（bankroll）完整指南。');
    $poker_id    = create_page_if_missing('guides/games/poker', '德州撲克攻略｜起手牌、位置、錦標賽策略', $guides_games_id, '德州撲克攻略', '德州撲克完整教學：起手牌選擇、位置打法、錦標賽策略完整解析。');

    // Level 4: 具體被 404 的子頁
    if ($baccarat_id) {
        create_page_if_missing('guides/games/baccarat/basics', '百家樂基礎教學｜規則、玩法、點數計算', $baccarat_id, '百家樂基礎', '從零開始學百家樂：完整規則、玩法、點數計算與補牌邏輯一篇看懂。');
    }
    if ($slots_id) {
        create_page_if_missing('guides/games/slots/rtp-guide', '老虎機 RTP 完整教學｜回報率如何看懂', $slots_id, '老虎機 RTP', '老虎機 RTP（玩家回報率）完整解析：什麼是 RTP、怎麼看、實戰意義一次說明。');
    }
    if ($poker_id) {
        create_page_if_missing('guides/games/poker/starting-hands', '德州撲克起手牌完整指南｜哪些牌該玩', $poker_id, '德州撲克起手牌', '德州撲克起手牌完整圖表：169 種起手牌的玩法建議、位置調整、實戰應用。');
    }
}

flush_rewrite_rules(true);
delete_transient('rank_math_sitemap_cache');
echo "\nPermalink rules flushed & cache cleared\n";
echo "\n===== DONE =====\n";
