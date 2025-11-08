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
?>