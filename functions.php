<?php
if (!defined('ABSPATH')) exit;

add_theme_support('post-thumbnails');

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_style('matching-board-style', get_stylesheet_uri());
});

function get_kami_import_data($limit = 50) {
  $log_path = WP_CONTENT_DIR . '/debug.log';
  file_put_contents($log_path, "=== DB接続テスト開始 ===\n", FILE_APPEND);

  $conn = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_errno) {
    file_put_contents($log_path, "❌ DB接続失敗: {$conn->connect_error}\n", FILE_APPEND);
    return [];
  }

  file_put_contents($log_path, "✅ DB接続成功: " . DB_NAME . "\n", FILE_APPEND);
  $conn->set_charset('utf8mb4');

  // ✅ テーブル構造に完全一致
  $sql = "SELECT name, age, figure, `character`, `comment`, samune, url
          FROM `jqabp_6e7f3y4v`.`wp_kami_import`
          ORDER BY name DESC
          LIMIT {$limit}";
  $result = $conn->query($sql);

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
