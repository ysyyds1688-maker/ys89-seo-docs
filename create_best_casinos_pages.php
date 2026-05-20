<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

function add_page($slug, $title, $parent, $fk='', $desc='') {
    $exist = get_page_by_path($slug);
    if ($exist) { echo "/$slug/ exists (ID {$exist->ID})\n"; return $exist->ID; }
    $segs = explode('/', $slug);
    $name = end($segs);
    $id = wp_insert_post([
        'post_type'=>'page','post_status'=>'publish',
        'post_title'=>$title,'post_name'=>$name,'post_parent'=>$parent,
        'post_content'=>'','post_author'=>1,
    ], true);
    if (is_wp_error($id)) { echo "ERR /$slug/: ".$id->get_error_message()."\n"; return false; }
    if ($fk) update_post_meta($id, 'rank_math_focus_keyword', $fk);
    if ($desc) update_post_meta($id, 'rank_math_description', $desc);
    echo "Created /$slug/ (ID $id)\n";
    return $id;
}

// /recommendations/best-casinos/ 父頁
$rec = get_page_by_path('recommendations');
$rec_id = $rec ? $rec->ID : 0;
$bc_id = add_page('recommendations/best-casinos',
    '最佳娛樂城推薦｜按主題分類的 2026 平台清單',
    $rec_id, '最佳娛樂城', '依出金速度、優惠、USDT 友好度等多種維度分類的最佳娛樂城推薦清單。');

if ($bc_id) {
    add_page('recommendations/best-casinos/2025',
        '2026 年最佳娛樂城完整推薦｜全方位評比 TOP 5',
        $bc_id, '2026 娛樂城推薦', '2026 年最新娛樂城完整推薦：出金速度、優惠活動、安全性全方位評比 TOP 5 平台。');
    add_page('recommendations/best-casinos/fast-withdrawal',
        '快速出金娛樂城推薦｜5 分鐘內到帳平台清單',
        $bc_id, '快速出金娛樂城', '2026 最快出金娛樂城清單：實測 5 分鐘內到帳的平台推薦與出金技巧。');
    add_page('recommendations/best-casinos/high-bonus',
        '高額優惠娛樂城推薦｜體驗金 + 首儲加碼最多平台',
        $bc_id, '高額優惠娛樂城', '提供最高體驗金與首儲加碼的娛樂城推薦清單，比較優惠金額與流水條件。');
    add_page('recommendations/best-casinos/usdt-friendly',
        'USDT 友好娛樂城推薦｜加密貨幣存款最方便平台',
        $bc_id, 'USDT 娛樂城', '最適合使用 USDT/Tether 入金的娛樂城推薦：手續費低、到帳快、流程簡單的平台清單。');
}

flush_rewrite_rules(true);
delete_transient('rank_math_sitemap_cache');
echo "\n===== DONE =====\n";
