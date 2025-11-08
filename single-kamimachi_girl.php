<?php
/**
 * Template Name: 神待ち女性詳細ページ
 */
get_header();

if (have_posts()) : while (have_posts()) : the_post();
  $age = get_post_meta(get_the_ID(), '_girl_age', true);
  $figure = get_post_meta(get_the_ID(), '_girl_figure', true);
  $character = get_post_meta(get_the_ID(), '_girl_character', true);
  $comment = get_post_meta(get_the_ID(), '_girl_comment', true);
  $prefectures = get_the_terms(get_the_ID(), 'prefecture');
?>

<main style="max-width:900px; margin:40px auto; padding:20px;">
  <article style="background:#fff; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); overflow:hidden;">
    <?php if (has_post_thumbnail()) : ?>
      <div style="width:100%; max-height:400px; overflow:hidden;">
        <?php the_post_thumbnail('large', ['style' => 'width:100%; height:auto; object-fit:cover;']); ?>
      </div>
    <?php endif; ?>

    <div style="padding:30px;">
      <h1 style="font-size:28px; margin-bottom:10px; color:#333;">
        <?php the_title(); ?><?php if ($age) echo '（' . esc_html($age) . '歳）'; ?>
      </h1>

      <?php if ($prefectures && !is_wp_error($prefectures)) : ?>
        <p style="color:#666; margin-bottom:10px;">
          <strong>エリア：</strong>
          <?php
            $pref_names = [];
            foreach ($prefectures as $pref) {
              $pref_names[] = '<a href="' . get_term_link($pref) . '" style="color:#5DADE2; text-decoration:none;">' . esc_html($pref->name) . '</a>';
            }
            echo implode(', ', $pref_names);
          ?>
        </p>
      <?php endif; ?>

      <?php if ($figure || $character) : ?>
        <p style="color:#666; margin-bottom:20px;">
          <strong>体型・系統：</strong><?php echo esc_html($figure . '・' . $character); ?>
        </p>
      <?php endif; ?>

      <?php if ($comment) : ?>
        <div style="background:#f9f9f9; padding:20px; border-radius:8px; margin-bottom:20px;">
          <h3 style="font-size:18px; margin-bottom:10px; color:#333;">自己紹介</h3>
          <p style="line-height:1.8; color:#555;">
            <?php echo nl2br(esc_html($comment)); ?>
          </p>
        </div>
      <?php endif; ?>

      <div style="line-height:1.8; color:#555; margin-top:20px;">
        <?php the_content(); ?>
      </div>
    </div>
  </article>

  <!-- 関連記事 -->
  <section style="margin-top:40px;">
    <h2 style="font-size:24px; margin-bottom:20px; color:#333;">同じエリアの神待ち女性</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:20px;">
      <?php
        if ($prefectures && !is_wp_error($prefectures)) :
          $current_pref = $prefectures[0];
          $related_args = [
            'post_type' => 'kamimachi_girl',
            'posts_per_page' => 4,
            'post__not_in' => [get_the_ID()],
            'orderby' => 'rand',
            'tax_query' => [
              [
                'taxonomy' => 'prefecture',
                'field' => 'term_id',
                'terms' => $current_pref->term_id
              ]
            ]
          ];

          $related_query = new WP_Query($related_args);

          if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
              $rel_age = get_post_meta(get_the_ID(), '_girl_age', true);
      ?>
        <div style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
          <a href="<?php the_permalink(); ?>" style="text-decoration:none; color:#333;">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('thumbnail', ['style' => 'width:100%; height:180px; object-fit:cover;']); ?>
            <?php else : ?>
              <div style="width:100%; height:180px; background:#f0f0f0;"></div>
            <?php endif; ?>
            <div style="padding:10px;">
              <h4 style="margin:0; font-size:16px;">
                <?php the_title(); ?><?php if ($rel_age) echo '（' . esc_html($rel_age) . '）'; ?>
              </h4>
            </div>
          </a>
        </div>
      <?php
            endwhile;
            wp_reset_postdata();
          endif;
        endif;
      ?>
    </div>
  </section>
</main>

<?php
endwhile;
endif;

get_footer();
?>
