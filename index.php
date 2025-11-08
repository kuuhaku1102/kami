<?php get_header(); ?>

<main style="max-width:1100px; margin:40px auto; padding:20px;">
  <h2 style="margin-bottom:20px;">登録一覧</h2>

  <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:20px;">
    <?php
      $girls = get_kami_import_data(50);
      if ($girls):
        foreach ($girls as $g):
    ?>
      <div style="background:#fff; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1); overflow:hidden;">
        <a href="<?php echo esc_url($g->url); ?>" target="_blank" style="text-decoration:none; color:#333;">
          <img src="<?php echo esc_url($g->samune); ?>" alt="<?php echo esc_attr($g->name); ?>" style="width:100%; height:220px; object-fit:cover;">
          <div style="padding:15px;">
            <h3 style="margin:0 0 5px;"><?php echo esc_html($g->name); ?>（<?php echo esc_html($g->age); ?>）</h3>
            <p style="font-size:14px; color:#666;"><?php echo esc_html($g->figure . '・' . $g->character); ?></p>
            <p style="font-size:13px; margin-top:8px;"><?php echo esc_html($g->comment); ?></p>
          </div>
        </a>
      </div>
    <?php
        endforeach;
      else:
        echo '<p>まだ登録がありません。</p>';
      endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>
