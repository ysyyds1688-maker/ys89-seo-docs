<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

$theme_dir = '/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-content/themes/ys-entertainment-theme';

// [slug_path, template_file, title, fk_keyword, desc]
$pages = [
    // Level 4: /guides/casino/ 4 個主分類
    ['guides/casino/registration', 'page-guides-casino-registration.php',  '娛樂城註冊完整教學｜流程、驗證、優惠領取', '娛樂城註冊', '娛樂城註冊步驟、身份驗證、新會員優惠領取完整教學。'],
    ['guides/casino/deposit',      'page-guides-casino-deposit.php',       '娛樂城儲值教學｜USDT、銀行轉帳、第三方支付', '娛樂城儲值', '娛樂城儲值方式完整比較：USDT、銀行轉帳、第三方支付教學與手續費。'],
    ['guides/casino/withdrawal',   'page-guides-casino-withdrawal.php',    '娛樂城出金教學｜流程、速度、問題排除', '娛樂城出金', '娛樂城出金流程教學：申請步驟、速度比較、卡關問題排除完整指南。'],
    ['guides/casino/bonuses',      'page-guides-casino-bonuses.php',       '娛樂城優惠完整指南｜類型、流水、使用技巧', '娛樂城優惠', '娛樂城優惠類型解析：體驗金、首儲、返水流水要求計算與最佳使用技巧。'],
    // Level 5: Registration 子頁
    ['guides/casino/registration/step-by-step',    'page-guides-casino-registration-step-by-step.php',    '註冊步驟詳解｜新手 5 分鐘完成開戶',     '註冊步驟', '娛樂城註冊 5 步驟完整教學：從填表到首次登入的詳細圖文流程。'],
    ['guides/casino/registration/verification',    'page-guides-casino-registration-verification.php',    '身份驗證教學｜KYC 認證 + 安全須知',     'KYC 驗證', '娛樂城身份驗證 KYC 完整流程：證件準備、上傳技巧、常見退件原因。'],
    ['guides/casino/registration/bonus-claim',     'page-guides-casino-registration-bonus-claim.php',     '新會員優惠領取｜註冊送金完整領取指南',   '新會員優惠', '娛樂城新會員優惠領取教學：體驗金、首儲加碼領取步驟與流水計算。'],
    // Level 5: Deposit 子頁
    ['guides/casino/deposit/methods',              'page-guides-casino-deposit-methods.php',              '儲值方式比較｜USDT、信用卡、超商完整對照', '儲值方式', '娛樂城所有儲值方式比較：USDT、銀行轉帳、信用卡、超商代碼手續費與到帳速度。'],
    ['guides/casino/deposit/bank-transfer',        'page-guides-casino-deposit-bank-transfer.php',        '銀行轉帳儲值教學｜ATM 與網銀完整步驟',    '銀行轉帳儲值', '娛樂城銀行轉帳儲值教學：ATM 與網銀操作步驟、注意事項與常見問題。'],
    // Level 5: Withdrawal 子頁
    ['guides/casino/withdrawal/speed-comparison',  'page-guides-casino-withdrawal-speed-comparison.php',  '出金速度比較｜各家娛樂城實測對照',         '出金速度', '台灣娛樂城出金速度實測比較：5 分鐘 vs 24 小時平台對照與選擇建議。'],
    ['guides/casino/withdrawal/troubleshooting',   'page-guides-casino-withdrawal-troubleshooting.php',   '出金問題排除｜帳戶凍結、審核卡關完整對策', '出金問題', '娛樂城出金卡關完整對策：帳戶凍結、審核卡關、客服話術、法律救濟全方位指南。'],
    // Level 5: Bonuses 子頁
    ['guides/casino/bonuses/types',                'page-guides-casino-bonuses-types.php',                '優惠類型完整解析｜體驗金、首儲、返水',     '優惠類型', '娛樂城優惠類型完整解析：體驗金、首儲加碼、返水、VIP 等級獎金條件比較。'],
    ['guides/casino/bonuses/wagering-requirements','page-guides-casino-bonuses-wagering-requirements.php','流水要求計算教學｜洗碼量公式與技巧',       '流水計算', '娛樂城優惠流水要求完整教學：洗碼量計算公式、達標技巧、常見陷阱避雷。'],
    ['guides/casino/bonuses/best-practices',       'page-guides-casino-bonuses-best-practices.php',       '優惠使用技巧｜最大化獎金、避雷流水陷阱',   '優惠技巧', '娛樂城優惠最佳使用技巧：最大化獎金、避開高流水陷阱、組合領取策略。'],
];

$casino_id = ($p = get_page_by_path('guides/casino')) ? $p->ID : 0;
if (!$casino_id) { echo "ERROR: /guides/casino/ not found\n"; exit(1); }

$stats = ['template_updated'=>0, 'pages_created'=>0, 'pages_existed'=>0, 'pages_bound'=>0];

foreach ($pages as $cfg) {
    [$path, $template, $title, $fk, $desc] = $cfg;
    $template_path = "$theme_dir/$template";

    // 1. 加 Template Name header (if 沒有)
    if (file_exists($template_path)) {
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
    } else {
        echo "  ⚠ Missing template: $template\n";
        continue;
    }

    // 2. 確保 parent chain 存在
    $segments = explode('/', $path);
    $slug = array_pop($segments);
    $parent_path = implode('/', $segments);
    $parent = get_page_by_path($parent_path);
    if (!$parent) {
        echo "  ⚠ Missing parent: $parent_path (for $path)\n";
        continue;
    }

    // 3. 建 page (if 不存在)
    $page = get_page_by_path($path);
    if ($page) {
        $stats['pages_existed']++;
        $pid = $page->ID;
        echo "  /$path/ exists (ID $pid)\n";
    } else {
        $pid = wp_insert_post([
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_parent'  => $parent->ID,
            'post_content' => '',
            'post_author'  => 1,
        ], true);
        if (is_wp_error($pid)) { echo "  ERROR /$path/: ".$pid->get_error_message()."\n"; continue; }
        $stats['pages_created']++;
        echo "  Created /$path/ (ID $pid)\n";
    }

    // 4. 綁 template + 設 Rank Math meta
    update_post_meta($pid, '_wp_page_template', $template);
    update_post_meta($pid, 'rank_math_focus_keyword', $fk);
    update_post_meta($pid, 'rank_math_description', $desc);
    $stats['pages_bound']++;
}

flush_rewrite_rules(true);
delete_transient('rank_math_sitemap_cache');

echo "\n===== SUMMARY =====\n";
echo "Templates updated: {$stats['template_updated']}\n";
echo "Pages created:     {$stats['pages_created']}\n";
echo "Pages existed:     {$stats['pages_existed']}\n";
echo "Pages bound:       {$stats['pages_bound']}\n";
