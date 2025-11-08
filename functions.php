<?php
if (!defined('ABSPATH')) exit;
add_action('init', function() {
  register_post_type('profile', [
    'label' => 'プロフィール',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-id',
    'supports' => ['title', 'editor', 'thumbnail'],
    'has_archive' => true,
    'rewrite' => ['slug' => 'profiles'],
  ]);
});
add_theme_support('post-thumbnails');
add_action('wp_enqueue_scripts', function() {
  wp_enqueue_style('matching-board-style', get_stylesheet_uri());
});

// functions.php に追加
function get_kami_import_data($limit = 20) {
  global $wpdb;
  $table = '240710kami_import'; // phpMyAdminでのテーブル名

  // データ取得
  $results = $wpdb->get_results("SELECT * FROM {$table} WHERE post_status='publish' LIMIT {$limit}");
  return $results;
}
?>
