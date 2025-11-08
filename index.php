<?php get_header(); ?>

<main style="max-width:900px; margin:40px auto; background:#fff; padding:40px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
  <h2 style="margin-bottom:30px;">新着プロフィール</h2>
  テスト
  <div class="profile-grid" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:20px;">
    <?php
    $query = new WP_Query([
      'post_type' => 'profile',
      'posts_per_page' => 12
    ]);
    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>
        <div class="profile-card" style="background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 3px 8px rgba(0,0,0,0.1);">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium', ['style' => 'width:100%; height:200px; object-fit:cover;']); ?>
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/no-image.jpg" style="width:100%; height:200px; object-fit:cover;">
            <?php endif; ?>
          </a>
          <div style="padding:15px;">
            <h2 style="font-size:18px; margin:0 0 5px;"><?php the_title(); ?></h2>
            <p style="font-size:14px; color:#666;"><?php echo wp_trim_words(get_the_content(), 15, '...'); ?></p>
          </div>
        </div>
      <?php endwhile;
      wp_reset_postdata();
    else : ?>
      <p>まだプロフィールがありません。</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
