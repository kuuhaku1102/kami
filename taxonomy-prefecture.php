<?php
/**
 * Template Name: 都道府県別ページ
 * Description: 都道府県別の神待ち女性一覧ページ（6〜10件ランダム表示）
 */
get_header();

$term = get_queried_object();
$prefecture_name = $term->name;
?>

<main style="max-width:1200px; margin:40px auto; padding:20px;">
  <h1 style="font-size:28px; margin-bottom:10px; color:#333;">
    <?php echo esc_html($prefecture_name); ?>の神待ち掲示板
  </h1>
  <p style="color:#666; margin-bottom:30px;">
    <?php echo esc_html($prefecture_name); ?>で神待ち女性を探している方へ。実際に出会える掲示板情報をご紹介します。
  </p>

  <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:20px; margin-bottom:40px;">
    <?php
      // ランダムな表示件数（6〜10件）
      $random_count = rand(6, 10);
      
      $args = [
        'post_type' => 'kamimachi_girl',
        'posts_per_page' => $random_count,
        'orderby' => 'rand',
        'tax_query' => [
          [
            'taxonomy' => 'prefecture',
            'field' => 'slug',
            'terms' => $term->slug
          ]
        ]
      ];

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        $colors = ['#5DADE2', '#F8B4D9', '#F8C471', '#82E0AA', '#BB8FCE', '#F1948A'];
        $color_index = 0;
        
        while ($query->have_posts()) : $query->the_post();
          $age = get_post_meta(get_the_ID(), '_girl_age', true);
          $figure = get_post_meta(get_the_ID(), '_girl_figure', true);
          $character = get_post_meta(get_the_ID(), '_girl_character', true);
          $comment = get_post_meta(get_the_ID(), '_girl_comment', true);
          $border_color = $colors[$color_index % count($colors)];
          $color_index++;
    ?>
      <div style="background:#fff; border:3px solid <?php echo $border_color; ?>; border-radius:10px; overflow:hidden; box-shadow:0 3px 8px rgba(0,0,0,0.1);">
        <a href="<?php the_permalink(); ?>" style="text-decoration:none; color:#333;">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium', ['style' => 'width:100%; height:250px; object-fit:cover;']); ?>
          <?php else : ?>
            <div style="width:100%; height:250px; background:#f0f0f0; display:flex; align-items:center; justify-content:center; color:#999;">
              No Image
            </div>
          <?php endif; ?>
          <div style="padding:15px;">
            <h3 style="margin:0 0 5px; font-size:18px;">
              <?php the_title(); ?><?php if ($age) echo '（' . esc_html($age) . '歳）'; ?>
            </h3>
            <?php if ($figure || $character) : ?>
              <p style="font-size:14px; color:#666; margin:5px 0;">
                <?php echo esc_html($figure . '・' . $character); ?>
              </p>
            <?php endif; ?>
            <?php if ($comment) : ?>
              <p style="font-size:13px; margin-top:8px; line-height:1.5;">
                <?php echo esc_html(mb_substr($comment, 0, 50)) . (mb_strlen($comment) > 50 ? '...' : ''); ?>
              </p>
            <?php endif; ?>
          </div>
        </a>
      </div>
    <?php
        endwhile;
        wp_reset_postdata();
      else :
    ?>
      <p style="grid-column:1/-1; text-align:center; color:#999;">
        現在、<?php echo esc_html($prefecture_name); ?>の神待ち女性は登録されていません。
      </p>
    <?php endif; ?>
  </div>

  <!-- SEO対策コンテンツ -->
  <section style="background:#f9f9f9; padding:30px; border-radius:10px; margin-top:40px;">
    <h2 style="font-size:24px; margin-bottom:20px; color:#333;">
      <?php echo esc_html($prefecture_name); ?>の神待ち掲示板について
    </h2>
    <div style="line-height:1.8; color:#555;">
      <p style="margin-bottom:15px;">
        <?php echo esc_html($prefecture_name); ?>で神待ち女性と出会いたい方のための掲示板情報をまとめています。神待ちとは、家出や経済的な理由で一時的に宿泊場所を探している女性のことを指します。
      </p>
      <p style="margin-bottom:15px;">
        当サイトでは、<?php echo esc_html($prefecture_name); ?>エリアで実際に活動している神待ち女性のプロフィールを掲載しています。年齢、体型、性格などの詳細情報から、あなたに合った相手を見つけることができます。
      </p>
      <p style="margin-bottom:15px;">
        掲示板を利用する際は、相手の気持ちを尊重し、安全に配慮した出会いを心がけてください。金銭のやり取りや違法行為は厳禁です。
      </p>
    </div>
  </section>

  <!-- 関連都道府県リンク -->
  <section style="margin-top:40px;">
    <h3 style="font-size:20px; margin-bottom:15px; color:#333;">他の都道府県を探す</h3>
    <div style="display:flex; flex-wrap:wrap; gap:10px;">
      <?php
        $all_prefectures = get_terms([
          'taxonomy' => 'prefecture',
          'hide_empty' => false,
          'orderby' => 'name',
          'order' => 'ASC'
        ]);

        if ($all_prefectures && !is_wp_error($all_prefectures)) :
          foreach ($all_prefectures as $pref) :
            if ($pref->term_id === $term->term_id) continue;
      ?>
        <a href="<?php echo get_term_link($pref); ?>" style="display:inline-block; padding:8px 15px; background:#fff; border:1px solid #ddd; border-radius:5px; text-decoration:none; color:#333; font-size:14px; transition:all 0.3s;">
          <?php echo esc_html($pref->name); ?>
        </a>
      <?php
          endforeach;
        endif;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
