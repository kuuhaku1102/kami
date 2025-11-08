<?php
/**
 * Template Name: トップページ
 * Description: 神待ち掲示板のトップページ（画像なし、掲示板情報のみ）
 */
get_header();
?>

<main style="max-width:1200px; margin:40px auto; padding:20px;">
  <!-- メインビジュアル -->
  <section style="background:linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:#fff; padding:60px 40px; border-radius:15px; text-align:center; margin-bottom:40px;">
    <h1 style="font-size:36px; margin-bottom:15px; font-weight:bold;">神待ち掲示板</h1>
    <p style="font-size:18px; margin-bottom:25px;">全国の神待ち女性と出会える掲示板情報</p>
    <a href="#prefecture-list" style="display:inline-block; background:#fff; color:#667eea; padding:12px 30px; border-radius:30px; text-decoration:none; font-weight:bold; transition:all 0.3s;">
      都道府県から探す
    </a>
  </section>

  <!-- 神待ち掲示板とは -->
  <section style="background:#fff; padding:40px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); margin-bottom:40px;">
    <h2 style="font-size:28px; margin-bottom:20px; color:#333; border-bottom:3px solid #667eea; padding-bottom:10px;">神待ち掲示板とは</h2>
    <div style="line-height:1.8; color:#555;">
      <p style="margin-bottom:15px;">
        神待ち掲示板とは、家出や経済的な理由で一時的に宿泊場所を探している女性（神待ち女性）と、彼女たちをサポートしたい方をつなぐコミュニティプラットフォームです。
      </p>
      <p style="margin-bottom:15px;">
        当サイトでは、全国47都道府県の神待ち女性の情報を掲載しており、年齢、体型、性格などの詳細なプロフィールから、あなたに合った相手を見つけることができます。
      </p>
      <p style="margin-bottom:0;">
        利用する際は、相手の気持ちを尊重し、安全に配慮した出会いを心がけてください。金銭のやり取りや違法行為は厳禁です。
      </p>
    </div>
  </section>

  <!-- 最新の神待ち女性（テキストのみ） -->
  <section style="margin-bottom:40px;">
    <h2 style="font-size:28px; margin-bottom:20px; color:#333; border-bottom:3px solid #667eea; padding-bottom:10px;">最新の神待ち女性</h2>
    <div style="background:#fff; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); overflow:hidden;">
      <?php
        $latest_args = [
          'post_type' => 'kamimachi_girl',
          'posts_per_page' => 10,
          'orderby' => 'date',
          'order' => 'DESC'
        ];

        $latest_query = new WP_Query($latest_args);

        if ($latest_query->have_posts()) :
          while ($latest_query->have_posts()) : $latest_query->the_post();
            $age = get_post_meta(get_the_ID(), '_girl_age', true);
            $figure = get_post_meta(get_the_ID(), '_girl_figure', true);
            $character = get_post_meta(get_the_ID(), '_girl_character', true);
            $comment = get_post_meta(get_the_ID(), '_girl_comment', true);
            $prefectures = get_the_terms(get_the_ID(), 'prefecture');
      ?>
        <div style="padding:20px; border-bottom:1px solid #eee;">
          <div style="display:flex; justify-content:space-between; align-items:start; gap:20px;">
            <div style="flex:1;">
              <h3 style="margin:0 0 8px; font-size:20px;">
                <a href="<?php the_permalink(); ?>" style="color:#333; text-decoration:none; transition:color 0.3s;">
                  <?php the_title(); ?><?php if ($age) echo '（' . esc_html($age) . '歳）'; ?>
                </a>
              </h3>
              <?php if ($prefectures && !is_wp_error($prefectures)) : ?>
                <p style="margin:0 0 5px; color:#667eea; font-size:14px;">
                  <strong>📍 <?php echo esc_html($prefectures[0]->name); ?></strong>
                </p>
              <?php endif; ?>
              <?php if ($figure || $character) : ?>
                <p style="margin:0 0 10px; color:#999; font-size:14px;">
                  <?php echo esc_html($figure . '・' . $character); ?>
                </p>
              <?php endif; ?>
              <?php if ($comment) : ?>
                <p style="margin:0; color:#555; font-size:14px; line-height:1.6;">
                  <?php echo esc_html(mb_substr($comment, 0, 80)) . (mb_strlen($comment) > 80 ? '...' : ''); ?>
                </p>
              <?php endif; ?>
            </div>
            <div>
              <a href="<?php the_permalink(); ?>" style="display:inline-block; background:#667eea; color:#fff; padding:8px 20px; border-radius:5px; text-decoration:none; font-size:14px; white-space:nowrap;">
                詳細を見る
              </a>
            </div>
          </div>
        </div>
      <?php
          endwhile;
          wp_reset_postdata();
        else :
      ?>
        <div style="padding:40px; text-align:center; color:#999;">
          現在、登録されている神待ち女性はいません。
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- 都道府県一覧 -->
  <section id="prefecture-list" style="margin-bottom:40px;">
    <h2 style="font-size:28px; margin-bottom:20px; color:#333; border-bottom:3px solid #667eea; padding-bottom:10px;">都道府県から探す</h2>
    <div style="background:#fff; padding:30px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1);">
      <?php
        $regions = [
          '北海道・東北' => ['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'],
          '関東' => ['茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県'],
          '中部' => ['新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県'],
          '近畿' => ['三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県'],
          '中国' => ['鳥取県', '島根県', '岡山県', '広島県', '山口県'],
          '四国' => ['徳島県', '香川県', '愛媛県', '高知県'],
          '九州・沖縄' => ['福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県']
        ];

        foreach ($regions as $region_name => $prefs) :
      ?>
        <div style="margin-bottom:30px;">
          <h3 style="font-size:20px; margin-bottom:15px; color:#667eea; border-left:4px solid #667eea; padding-left:10px;">
            <?php echo esc_html($region_name); ?>
          </h3>
          <div style="display:flex; flex-wrap:wrap; gap:10px;">
            <?php foreach ($prefs as $pref_name) :
              $term = get_term_by('name', $pref_name, 'prefecture');
              if ($term) :
            ?>
              <a href="<?php echo get_term_link($term); ?>" style="display:inline-block; padding:10px 20px; background:#f0f0f0; border-radius:5px; text-decoration:none; color:#333; font-size:14px; transition:all 0.3s; border:2px solid transparent;">
                <?php echo esc_html($pref_name); ?>
              </a>
            <?php
              endif;
            endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ユーザーボイスへのリンク -->
  <section style="background:#f9f9f9; padding:40px; border-radius:10px; text-align:center;">
    <h2 style="font-size:28px; margin-bottom:15px; color:#333;">実際に出会えた体験談</h2>
    <p style="color:#666; margin-bottom:25px; line-height:1.8;">
      当サイトを利用して実際に神待ち女性と出会えた方々の声をご紹介します
    </p>
    <a href="<?php echo home_url('/voice'); ?>" style="display:inline-block; background:#667eea; color:#fff; padding:12px 30px; border-radius:30px; text-decoration:none; font-weight:bold; transition:all 0.3s;">
      体験談を読む
    </a>
  </section>
</main>

<style>
  a[href*="prefecture"]:hover {
    background: #667eea !important;
    color: #fff !important;
    border-color: #667eea !important;
  }
  
  h3 a:hover {
    color: #667eea !important;
  }
</style>

<?php get_footer(); ?>
