<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Hiragino Kaku Gothic ProN', 'Hiragino Sans', Meiryo, sans-serif;
      background: #f5f5f5;
      color: #333;
    }
    .site-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 20px 0;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .header-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .site-title {
      font-size: 28px;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      transition: opacity 0.3s;
    }
    .site-title:hover {
      opacity: 0.8;
    }
    .header-menu {
      display: flex;
      gap: 20px;
      list-style: none;
    }
    .header-menu a {
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      padding: 8px 15px;
      border-radius: 5px;
      transition: background 0.3s;
    }
    .header-menu a:hover {
      background: rgba(255,255,255,0.2);
    }
    .mobile-menu-toggle {
      display: none;
      background: none;
      border: none;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
    }
    @media (max-width: 768px) {
      .header-menu {
        display: none;
        position: absolute;
        top: 70px;
        right: 20px;
        background: #fff;
        flex-direction: column;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        z-index: 1000;
      }
      .header-menu.active {
        display: flex;
      }
      .header-menu a {
        color: #333;
      }
      .mobile-menu-toggle {
        display: block;
      }
    }
  </style>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="header-container">
    <a href="<?php echo home_url('/'); ?>" class="site-title">
      <?php bloginfo('name'); ?>
    </a>
    
    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
    
    <?php
      wp_nav_menu([
        'theme_location' => 'header-menu',
        'container' => 'nav',
        'container_class' => 'header-navigation',
        'menu_class' => 'header-menu',
        'fallback_cb' => 'default_header_menu'
      ]);
    ?>
  </div>
</header>

<script>
  function toggleMobileMenu() {
    const menu = document.querySelector('.header-menu');
    if (menu) {
      menu.classList.toggle('active');
    }
  }
</script>

<?php
function default_header_menu() {
  echo '<nav class="header-navigation">';
  echo '<ul class="header-menu">';
  echo '<li><a href="' . home_url('/') . '">ホーム</a></li>';
  echo '<li><a href="' . home_url('/voice') . '">体験談</a></li>';
  echo '</ul>';
  echo '</nav>';
}
?>
