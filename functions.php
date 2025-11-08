<?php
if (!defined('ABSPATH')) exit;

add_theme_support('post-thumbnails');
add_theme_support('menus');

// メニューの登録
register_nav_menus([
  'header-menu' => 'ヘッダーメニュー',
  'footer-menu' => 'フッターメニュー'
]);

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_style('matching-board-style', get_stylesheet_uri());
});

// カスタム投稿タイプ「神待ち女性」の登録
function register_kamimachi_girl_post_type() {
  $labels = [
    'name' => '神待ち女性',
    'singular_name' => '神待ち女性',
    'add_new' => '新規追加',
    'add_new_item' => '新しい神待ち女性を追加',
    'edit_item' => '神待ち女性を編集',
    'new_item' => '新しい神待ち女性',
    'view_item' => '神待ち女性を表示',
    'search_items' => '神待ち女性を検索',
    'not_found' => '神待ち女性が見つかりませんでした',
    'not_found_in_trash' => 'ゴミ箱に神待ち女性はありません',
    'menu_name' => '神待ち女性'
  ];

  $args = [
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-groups',
    'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
    'rewrite' => ['slug' => 'girl'],
    'show_in_rest' => true,
    'taxonomies' => ['prefecture']
  ];

  register_post_type('kamimachi_girl', $args);
}
add_action('init', 'register_kamimachi_girl_post_type');

// タクソノミー「都道府県」の登録
function register_prefecture_taxonomy() {
  $labels = [
    'name' => '都道府県',
    'singular_name' => '都道府県',
    'search_items' => '都道府県を検索',
    'all_items' => 'すべての都道府県',
    'edit_item' => '都道府県を編集',
    'update_item' => '都道府県を更新',
    'add_new_item' => '新しい都道府県を追加',
    'new_item_name' => '新しい都道府県名',
    'menu_name' => '都道府県'
  ];

  $args = [
    'labels' => $labels,
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => false,
    'rewrite' => ['slug' => 'prefecture'],
    'show_in_rest' => true
  ];

  register_taxonomy('prefecture', ['kamimachi_girl'], $args);
}
add_action('init', 'register_prefecture_taxonomy');

// 47都道府県を自動登録
function auto_register_prefectures() {
  if (get_option('prefectures_registered')) {
    return;
  }

  $prefectures = [
    '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
    '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
    '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県',
    '岐阜県', '静岡県', '愛知県', '三重県',
    '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
    '鳥取県', '島根県', '岡山県', '広島県', '山口県',
    '徳島県', '香川県', '愛媛県', '高知県',
    '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
  ];

  foreach ($prefectures as $prefecture) {
    if (!term_exists($prefecture, 'prefecture')) {
      wp_insert_term($prefecture, 'prefecture');
    }
  }

  update_option('prefectures_registered', true);
}
add_action('init', 'auto_register_prefectures');

// カスタムフィールドのメタボックス追加
function add_girl_meta_boxes() {
  add_meta_box(
    'girl_details',
    '詳細情報',
    'render_girl_meta_box',
    'kamimachi_girl',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'add_girl_meta_boxes');

function render_girl_meta_box($post) {
  wp_nonce_field('save_girl_meta', 'girl_meta_nonce');
  
  $age = get_post_meta($post->ID, '_girl_age', true);
  $figure = get_post_meta($post->ID, '_girl_figure', true);
  $character = get_post_meta($post->ID, '_girl_character', true);
  $comment = get_post_meta($post->ID, '_girl_comment', true);
  ?>
  <p>
    <label><strong>年齢：</strong></label>
    <input type="number" name="girl_age" value="<?php echo esc_attr($age); ?>" style="width:100px;">
  </p>
  <p>
    <label><strong>体型：</strong></label>
    <select name="girl_figure" style="width:200px;">
      <option value="">選択してください</option>
      <option value="小柄" <?php selected($figure, '小柄'); ?>>小柄</option>
      <option value="標準" <?php selected($figure, '標準'); ?>>標準</option>
      <option value="スリム" <?php selected($figure, 'スリム'); ?>>スリム</option>
      <option value="グラマー" <?php selected($figure, 'グラマー'); ?>>グラマー</option>
    </select>
  </p>
  <p>
    <label><strong>系統：</strong></label>
    <select name="girl_character" style="width:200px;">
      <option value="">選択してください</option>
      <option value="天然系" <?php selected($character, '天然系'); ?>>天然系</option>
      <option value="癒し系" <?php selected($character, '癒し系'); ?>>癒し系</option>
      <option value="お色気系" <?php selected($character, 'お色気系'); ?>>お色気系</option>
      <option value="清楚系" <?php selected($character, '清楚系'); ?>>清楚系</option>
      <option value="小悪魔系" <?php selected($character, '小悪魔系'); ?>>小悪魔系</option>
      <option value="カッコキレイ系" <?php selected($character, 'カッコキレイ系'); ?>>カッコキレイ系</option>
      <option value="幼い系" <?php selected($character, '幼い系'); ?>>幼い系</option>
      <option value="セレブ系" <?php selected($character, 'セレブ系'); ?>>セレブ系</option>
      <option value="キャリア系" <?php selected($character, 'キャリア系'); ?>>キャリア系</option>
    </select>
  </p>
  <p>
    <label><strong>自己紹介：</strong></label><br>
    <textarea name="girl_comment" rows="4" style="width:100%;"><?php echo esc_textarea($comment); ?></textarea>
  </p>
  <?php
}

function save_girl_meta($post_id) {
  if (!isset($_POST['girl_meta_nonce']) || !wp_verify_nonce($_POST['girl_meta_nonce'], 'save_girl_meta')) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['girl_age'])) {
    update_post_meta($post_id, '_girl_age', sanitize_text_field($_POST['girl_age']));
  }

  if (isset($_POST['girl_figure'])) {
    update_post_meta($post_id, '_girl_figure', sanitize_text_field($_POST['girl_figure']));
  }

  if (isset($_POST['girl_character'])) {
    update_post_meta($post_id, '_girl_character', sanitize_text_field($_POST['girl_character']));
  }

  if (isset($_POST['girl_comment'])) {
    update_post_meta($post_id, '_girl_comment', sanitize_textarea_field($_POST['girl_comment']));
  }
}
add_action('save_post_kamimachi_girl', 'save_girl_meta');

// 既存のDB接続関数（互換性維持）
function get_kami_import_data($limit = 50, $prefecture = null) {
  $log_path = WP_CONTENT_DIR . '/debug.log';
  file_put_contents($log_path, "=== DB接続テスト開始 ===\n", FILE_APPEND);

  $conn = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_errno) {
    file_put_contents($log_path, "❌ DB接続失敗: {$conn->connect_error}\n", FILE_APPEND);
    return [];
  }

  file_put_contents($log_path, "✅ DB接続成功: " . DB_NAME . "\n", FILE_APPEND);
  $conn->set_charset('utf8mb4');

  $limit = intval($limit);
  $prefecture = $prefecture ? trim($prefecture) : null;

  // ✅ テーブル構造に完全一致
  $base_sql = "SELECT name, age, figure, `character`, `comment`, samune, url, prefecture
          FROM `jqabp_6e7f3y4v`.`wp_kami_import`";

  $result = false;

  if ($prefecture) {
    $sql = $base_sql . " WHERE prefecture = ? ORDER BY name DESC LIMIT ?";
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param('si', $prefecture, $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    } else {
      file_put_contents($log_path, "⚠️ プレースホルダー付きSQL準備失敗: {$conn->error}\n", FILE_APPEND);
    }
  }

  if (!$result) {
    $sql = $base_sql . " ORDER BY name DESC LIMIT ?";
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param('i', $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    } else {
      file_put_contents($log_path, "⚠️ SQL準備失敗: {$conn->error}\n", FILE_APPEND);
      $fallback_sql = $base_sql . " ORDER BY name DESC LIMIT {$limit}";
      $result = $conn->query($fallback_sql);
    }
  }

  $data = [];
  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }
    file_put_contents($log_path, "✅ 取得件数: " . count($data) . "\n", FILE_APPEND);
  } else {
    file_put_contents($log_path, "⚠️ SQLエラー: {$conn->error}\n", FILE_APPEND);
  }

  $conn->close();
  file_put_contents($log_path, "=== DB接続テスト終了 ===\n", FILE_APPEND);
  return $data;
}

// SEO対策：メタディスクリプションとOGPタグの追加
function add_seo_meta_tags() {
  if (is_singular('kamimachi_girl')) {
    // 神待ち女性の詳細ページ
    global $post;
    $age = get_post_meta($post->ID, '_girl_age', true);
    $figure = get_post_meta($post->ID, '_girl_figure', true);
    $character = get_post_meta($post->ID, '_girl_character', true);
    $comment = get_post_meta($post->ID, '_girl_comment', true);
    $prefectures = get_the_terms($post->ID, 'prefecture');
    
    $pref_name = $prefectures && !is_wp_error($prefectures) ? $prefectures[0]->name : '';
    $description = $pref_name . 'の神待ち女性「' . get_the_title() . '」' . ($age ? '（' . $age . '歳）' : '') . 'のプロフィール。' . mb_substr($comment, 0, 80);
    
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . ' | ' . get_bloginfo('name') . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:type" content="article">' . "\n";
    echo '<meta property="og:url" content="' . get_permalink() . '">' . "\n";
    
    if (has_post_thumbnail()) {
      echo '<meta property="og:image" content="' . get_the_post_thumbnail_url($post->ID, 'large') . '">' . "\n";
    }
    
  } elseif (is_tax('prefecture')) {
    // 都道府県別ページ
    $term = get_queried_object();
    $description = $term->name . 'の神待ち掲示板。' . $term->name . 'で神待ち女性と出会える掲示板情報をまとめています。実際に出会えた体験談も掲載中。';
    
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($term->name) . 'の神待ち掲示板 | ' . get_bloginfo('name') . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . get_term_link($term) . '">' . "\n";
    
  } elseif (is_front_page()) {
    // トップページ
    $description = '全国の神待ち女性と出会える掲示板情報サイト。47都道府県別に神待ち女性のプロフィールを掲載。実際に出会えた体験談も多数掲載中。安全・安心な出会いをサポートします。';
    
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:title" content="' . get_bloginfo('name') . ' | 全国の神待ち掲示板">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . home_url('/') . '">' . "\n";
  }
  
  // Twitter Card
  echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}
add_action('wp_head', 'add_seo_meta_tags');

// 構造化データ（JSON-LD）の追加
function add_structured_data() {
  if (is_singular('kamimachi_girl')) {
    global $post;
    $age = get_post_meta($post->ID, '_girl_age', true);
    $comment = get_post_meta($post->ID, '_girl_comment', true);
    $prefectures = get_the_terms($post->ID, 'prefecture');
    
    $structured_data = [
      '@context' => 'https://schema.org',
      '@type' => 'Person',
      'name' => get_the_title(),
      'description' => $comment,
      'url' => get_permalink()
    ];
    
    if ($age) {
      $structured_data['age'] = $age;
    }
    
    if (has_post_thumbnail()) {
      $structured_data['image'] = get_the_post_thumbnail_url($post->ID, 'large');
    }
    
    echo '<script type="application/ld+json">' . json_encode($structured_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    
  } elseif (is_tax('prefecture')) {
    $term = get_queried_object();
    
    $structured_data = [
      '@context' => 'https://schema.org',
      '@type' => 'WebPage',
      'name' => $term->name . 'の神待ち掲示板',
      'description' => $term->name . 'で神待ち女性と出会える掲示板情報',
      'url' => get_term_link($term)
    ];
    
    echo '<script type="application/ld+json">' . json_encode($structured_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    
  } elseif (is_front_page()) {
    $structured_data = [
      '@context' => 'https://schema.org',
      '@type' => 'WebSite',
      'name' => get_bloginfo('name'),
      'description' => '全国の神待ち女性と出会える掲示板情報サイト',
      'url' => home_url('/')
    ];
    
    echo '<script type="application/ld+json">' . json_encode($structured_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
  }
}
add_action('wp_head', 'add_structured_data');

// パンくずリスト機能
function display_breadcrumb() {
  if (is_front_page()) {
    return;
  }
  
  echo '<div style="max-width:1200px; margin:20px auto; padding:0 20px; font-size:14px; color:#666;">';
  echo '<a href="' . home_url('/') . '" style="color:#667eea; text-decoration:none;">ホーム</a>';
  
  if (is_singular('kamimachi_girl')) {
    global $post;
    $prefectures = get_the_terms($post->ID, 'prefecture');
    
    if ($prefectures && !is_wp_error($prefectures)) {
      echo ' &gt; <a href="' . get_term_link($prefectures[0]) . '" style="color:#667eea; text-decoration:none;">' . esc_html($prefectures[0]->name) . '</a>';
    }
    
    echo ' &gt; <span>' . get_the_title() . '</span>';
    
  } elseif (is_tax('prefecture')) {
    $term = get_queried_object();
    echo ' &gt; <span>' . esc_html($term->name) . '</span>';
    
  } elseif (is_page()) {
    echo ' &gt; <span>' . get_the_title() . '</span>';
  }
  
  echo '</div>';
}

// XMLサイトマップ用の優先度設定
function custom_sitemap_priority($priority, $type, $object) {
  if ($type === 'post_type' && $object->post_type === 'kamimachi_girl') {
    return 0.8;
  }
  
  if ($type === 'taxonomy' && $object->taxonomy === 'prefecture') {
    return 0.9;
  }
  
  return $priority;
}
add_filter('wp_sitemaps_posts_entry', 'custom_sitemap_priority', 10, 3);
add_filter('wp_sitemaps_taxonomies_entry', 'custom_sitemap_priority', 10, 3);

// タイトルタグの最適化
function optimize_title_tag($title) {
  if (is_singular('kamimachi_girl')) {
    global $post;
    $age = get_post_meta($post->ID, '_girl_age', true);
    $prefectures = get_the_terms($post->ID, 'prefecture');
    $pref_name = $prefectures && !is_wp_error($prefectures) ? $prefectures[0]->name : '';
    
    return get_the_title() . ($age ? '（' . $age . '歳）' : '') . ' | ' . $pref_name . 'の神待ち掲示板';
    
  } elseif (is_tax('prefecture')) {
    $term = get_queried_object();
    return $term->name . 'の神待ち掲示板 | 神待ち女性と出会える掲示板情報';
    
  } elseif (is_front_page()) {
    return get_bloginfo('name') . ' | 全国の神待ち女性と出会える掲示板情報';
  }
  
  return $title;
}
add_filter('pre_get_document_title', 'optimize_title_tag');
