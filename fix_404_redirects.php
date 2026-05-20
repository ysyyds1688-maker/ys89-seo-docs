<?php
require('/home/1561033.cloudwaysapps.com/vyjtrkxqpm/public_html/wp-load.php');

if (!class_exists('RankMath\Redirections\DB')) {
    echo "ERROR: Rank Math Redirections module not active\n";
    exit(1);
}

$redirects = [
    ['from' => 'guides',           'to' => '/beginner-guide/',     'desc' => '新手攻略'],
    ['from' => 'promotions',       'to' => '/bonus-368/',          'desc' => '優惠 → 體驗金'],
    ['from' => 'guides/register',  'to' => '/how-to-register/',    'desc' => '註冊教學'],
    ['from' => 'recommendations',  'to' => '/casino-ranking/',     'desc' => '推薦排行榜'],
    ['from' => 'games',            'to' => 'https://ys89.games/',  'desc' => '遊戲 → ys89.games 站'],
];

foreach ($redirects as $r) {
    $data = [
        'sources'     => [['pattern' => $r['from'], 'comparison' => 'exact']],
        'url_to'      => $r['to'],
        'header_code' => 301,
        'status'      => 'active',
    ];
    $id = \RankMath\Redirections\DB::update_iff($data);
    echo "/{$r['from']}/ → {$r['to']}  ({$r['desc']})  [ID: $id]\n";
}

echo "\nTotal: " . count($redirects) . " redirects added\n";

// Clear caches
delete_transient('rank_math_sitemap_cache');
delete_option('rank_math_seo_analysis_results');
echo "Caches cleared\n";
