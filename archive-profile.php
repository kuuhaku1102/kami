<?php get_header(); ?>
<div class="profile-grid" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:20px; padding:40px;">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
  <?php endwhile; else : ?>
    <p>まだプロフィールがありません。</p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>