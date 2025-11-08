<footer style="background:#333; color:#fff; padding:40px 20px; margin-top:60px;">
  <div style="max-width:1200px; margin:0 auto;">
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:30px; margin-bottom:30px;">
      <!-- サイト情報 -->
      <div>
        <h3 style="font-size:20px; margin-bottom:15px; color:#fff;">
          <?php bloginfo('name'); ?>
        </h3>
        <p style="color:#ccc; line-height:1.8; font-size:14px;">
          全国の神待ち女性と出会える掲示板情報サイト。安全・安心な出会いをサポートします。
        </p>
      </div>

      <!-- フッターメニュー -->
      <div>
        <h4 style="font-size:16px; margin-bottom:15px; color:#fff;">メニュー</h4>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer-menu',
            'container' => 'nav',
            'menu_class' => 'footer-menu',
            'fallback_cb' => 'default_footer_menu'
          ]);
        ?>
      </div>

      <!-- 注意事項 -->
      <div>
        <h4 style="font-size:16px; margin-bottom:15px; color:#fff;">ご利用にあたって</h4>
        <ul style="list-style:none; padding:0; color:#ccc; font-size:14px; line-height:2;">
          <li>• 18歳未満の方の利用は禁止</li>
          <li>• 金銭のやり取りは厳禁</li>
          <li>• 個人情報の取り扱いに注意</li>
          <li>• 安全な出会いを心がける</li>
        </ul>
      </div>
    </div>

    <!-- コピーライト -->
    <div style="border-top:1px solid #555; padding-top:20px; text-align:center; color:#999; font-size:14px;">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - InfinityDesign. All rights reserved.</p>
    </div>
  </div>
</footer>

<style>
  .footer-menu {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .footer-menu li {
    margin-bottom: 10px;
  }
  .footer-menu a {
    color: #ccc;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s;
  }
  .footer-menu a:hover {
    color: #fff;
  }
</style>

<?php wp_footer(); ?>
</body>
</html>

<?php
function default_footer_menu() {
  echo '<ul class="footer-menu">';
  echo '<li><a href="' . home_url('/') . '">ホーム</a></li>';
  echo '<li><a href="' . home_url('/voice') . '">体験談</a></li>';
  echo '<li><a href="' . home_url('/privacy') . '">プライバシーポリシー</a></li>';
  echo '<li><a href="' . home_url('/terms') . '">利用規約</a></li>';
  echo '</ul>';
}
?>
