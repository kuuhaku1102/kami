<?php
/**
 * Template Name: トップページ
 * Description: 神待ち掲示板のトップページ（拡張版）
 */
get_header();
?>

<main style="max-width:1200px; margin:40px auto; padding:20px;">
  <!-- メインビジュアル -->
  <section style="background:linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:#fff; padding:60px 40px; border-radius:15px; text-align:center; margin-bottom:40px; box-shadow:0 5px 15px rgba(102, 126, 234, 0.3);">
    <h1 style="font-size:36px; margin-bottom:15px; font-weight:bold;">神待ち掲示板</h1>
    <p style="font-size:18px; margin-bottom:10px; opacity:0.9;">全国の神待ち女性と出会える掲示板情報</p>
    <p style="font-size:14px; margin-bottom:25px; opacity:0.8;">安心・安全に利用できる神待ちコミュニティ</p>
    <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
      <a href="#prefecture-list" style="display:inline-block; background:#fff; color:#667eea; padding:12px 30px; border-radius:30px; text-decoration:none; font-weight:bold; transition:all 0.3s;">
        都道府県から探す
      </a>
      <a href="#how-to-use" style="display:inline-block; background:rgba(255,255,255,0.2); color:#fff; padding:12px 30px; border-radius:30px; text-decoration:none; font-weight:bold; border:2px solid #fff; transition:all 0.3s;">
        使い方ガイド
      </a>
    </div>
  </section>

  <!-- 重要なお知らせ -->
  <section style="background:#fff3cd; border-left:5px solid #ffc107; padding:20px 30px; border-radius:8px; margin-bottom:40px;">
    <h3 style="margin:0 0 10px; font-size:18px; color:#856404; display:flex; align-items:center; gap:8px;">
      ⚠️ 安全にご利用いただくために
    </h3>
    <ul style="margin:0; padding-left:20px; color:#856404; line-height:1.8; font-size:14px;">
      <li>18歳未満の方の利用は固くお断りしています</li>
      <li>金銭の要求や違法行為は厳禁です</li>
      <li>初めて会う際は必ず公共の場所で待ち合わせしましょう</li>
      <li>困ったときは<a href="#support-info" style="color:#856404; text-decoration:underline;">支援団体</a>にご相談ください</li>
    </ul>
  </section>

  <!-- 神待ち掲示板とは -->
  <section style="background:#fff; padding:40px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); margin-bottom:40px;">
    <h2 style="font-size:28px; margin-bottom:20px; color:#333; border-bottom:3px solid #667eea; padding-bottom:10px;">神待ち掲示板とは</h2>
    <div style="line-height:1.8; color:#555;">
      <p style="margin-bottom:15px;">
        神待ち掲示板とは、家出や経済的な理由で一時的に宿泊場所を探している女性（神待ち女性）と、彼女たちをサポートしたい方をつなぐコミュニティプラットフォームです。当サイトは、困っている女性を支援し、安心・安全な出会いの場を提供することを目的としています。
      </p>
      <p style="margin-bottom:15px;">
        当サイトでは、全国47都道府県の神待ち女性の情報を掲載しており、年齢、体型、性格などの詳細なプロフィールから、あなたに合った相手を見つけることができます。各都道府県ページには、地域別の待ち合わせポイントやSEO対策を施した詳細情報も掲載しています。
      </p>
      <p style="margin-bottom:0;">
        利用する際は、相手の気持ちを尊重し、安全に配慮した出会いを心がけてください。金銭のやり取りや違法行為は厳禁です。健全なコミュニティを維持するため、皆様のご協力をお願いいたします。
      </p>
    </div>
  </section>

  <!-- 主要コンテンツへの導線 -->
  <section style="margin-bottom:40px;">
    <h2 style="font-size:28px; margin-bottom:20px; color:#333; border-bottom:3px solid #667eea; padding-bottom:10px;">はじめての方へ</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
      <!-- 使い方ガイド -->
      <div id="how-to-use" style="background:#fff; padding:30px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); border-top:4px solid #667eea;">
        <div style="font-size:36px; margin-bottom:15px;">📖</div>
        <h3 style="margin:0 0 15px; font-size:20px; color:#333;">使い方ガイド</h3>
        <p style="margin:0 0 20px; color:#666; font-size:14px; line-height:1.6;">
          神待ち掲示板の基本的な使い方、安全な出会いのための心得、よくある質問をまとめています。初めての方はこちらをご覧ください。
        </p>
        <div style="background:#f9f9f9; padding:15px; border-radius:5px; margin-bottom:15px;">
          <h4 style="margin:0 0 10px; font-size:16px; color:#333;">主な内容</h4>
          <ul style="margin:0; padding-left:20px; color:#666; font-size:13px; line-height:1.8;">
            <li>神待ち掲示板の基本概念</li>
            <li>登録から出会うまでの流れ</li>
            <li>安全な出会いのための心得</li>
            <li>よくある質問（FAQ）</li>
          </ul>
        </div>
        <a href="#" style="display:inline-block; background:#667eea; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none; font-size:14px; transition:all 0.3s;">
          詳しく見る
        </a>
      </div>

      <!-- ガイドライン -->
      <div style="background:#fff; padding:30px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); border-top:4px solid #f39c12;">
        <div style="font-size:36px; margin-bottom:15px;">⚖️</div>
        <h3 style="margin:0 0 15px; font-size:20px; color:#333;">ガイドライン</h3>
        <p style="margin:0 0 20px; color:#666; font-size:14px; line-height:1.6;">
          健全なコミュニティを維持するための利用規約と禁止事項を定めています。ご利用前に必ずお読みください。
        </p>
        <div style="background:#f9f9f9; padding:15px; border-radius:5px; margin-bottom:15px;">
          <h4 style="margin:0 0 10px; font-size:16px; color:#333;">禁止事項</h4>
          <ul style="margin:0; padding-left:20px; color:#666; font-size:13px; line-height:1.8;">
            <li>金銭の要求・援助交際</li>
            <li>18歳未満の利用</li>
            <li>違法行為・犯罪行為</li>
            <li>個人情報の不正取得</li>
          </ul>
        </div>
        <a href="#" style="display:inline-block; background:#f39c12; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none; font-size:14px; transition:all 0.3s;">
          詳しく見る
        </a>
      </div>

      <!-- 支援団体情報 -->
      <div id="support-info" style="background:#fff; padding:30px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); border-top:4px solid #27ae60;">
        <div style="font-size:36px; margin-bottom:15px;">🤝</div>
        <h3 style="margin:0 0 15px; font-size:20px; color:#333;">支援団体情報</h3>
        <p style="margin:0 0 20px; color:#666; font-size:14px; line-height:1.6;">
          困ったときに頼れる公的な支援団体や相談窓口の情報をまとめています。一人で悩まず、専門家にご相談ください。
        </p>
        <div style="background:#f9f9f9; padding:15px; border-radius:5px; margin-bottom:15px;">
          <h4 style="margin:0 0 10px; font-size:16px; color:#333;">主な支援団体</h4>
          <ul style="margin:0; padding-left:20px; color:#666; font-size:13px; line-height:1.8;">
            <li>Colabo（一般社団法人）</li>
            <li>もやい（NPO法人）</li>
            <li>配偶者暴力相談支援センター</li>
            <li>ホームレス支援全国ネットワーク</li>
          </ul>
        </div>
        <a href="#support-organizations" style="display:inline-block; background:#27ae60; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none; font-size:14px; transition:all 0.3s;">
          詳しく見る
        </a>
      </div>
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
  <section style="background:#f9f9f9; padding:40px; border-radius:10px; text-align:center; margin-bottom:40px;">
    <h2 style="font-size:28px; margin-bottom:15px; color:#333;">実際に出会えた体験談</h2>
    <p style="color:#666; margin-bottom:25px; line-height:1.8;">
      当サイトを利用して実際に神待ち女性と出会えた方々の声をご紹介します。<br>
      リアルな体験談から、安心・安全な出会い方のヒントを見つけてください。
    </p>
    <a href="<?php echo home_url('/voice'); ?>" style="display:inline-block; background:#667eea; color:#fff; padding:12px 30px; border-radius:30px; text-decoration:none; font-weight:bold; transition:all 0.3s;">
      体験談を読む
    </a>
  </section>

  <!-- 支援団体情報（詳細） -->
  <section id="support-organizations" style="background:#fff; padding:40px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); margin-bottom:40px;">
    <h2 style="font-size:28px; margin-bottom:20px; color:#333; border-bottom:3px solid #27ae60; padding-bottom:10px;">神待ち・家出女性のための支援情報</h2>
    <p style="color:#666; margin-bottom:30px; line-height:1.8;">
      事情を抱えた家出、貧困女性に対する様々な支援団体があります。一人で悩まず、専門家に相談することをお勧めします。
    </p>
    <div style="display:grid; gap:20px;">
      <!-- Colabo -->
      <div style="background:#f9f9f9; padding:25px; border-radius:8px; border-left:4px solid #27ae60;">
        <h3 style="margin:0 0 10px; font-size:18px; color:#333;">一般社団法人 Colabo</h3>
        <p style="margin:0 0 15px; color:#666; font-size:14px; line-height:1.6;">
          10代の神待ち少女を支える活動をしています。保護者への連絡をせずに、家出相談、食事提供、シェルターでの宿泊支援、シェアハウスの運営、性的搾取の被害による救済等を行っています。
        </p>
        <a href="https://colabo-official.net/" target="_blank" rel="noopener" style="color:#27ae60; text-decoration:underline; font-size:14px;">
          公式サイトを見る →
        </a>
      </div>

      <!-- もやい -->
      <div style="background:#f9f9f9; padding:25px; border-radius:8px; border-left:4px solid #27ae60;">
        <h3 style="margin:0 0 10px; font-size:18px; color:#333;">認定NPO法人 自立生活サポートセンター・もやい</h3>
        <p style="margin:0 0 15px; color:#666; font-size:14px; line-height:1.6;">
          DV、ネカフェ難民、家出、ホームレス等、行き場を失った人達に、連帯保証人にもなってくれて入居支援してくれるNPO法人です。
        </p>
        <a href="https://www.moyai.net/" target="_blank" rel="noopener" style="color:#27ae60; text-decoration:underline; font-size:14px;">
          公式サイトを見る →
        </a>
      </div>

      <!-- ホームレス支援全国ネットワーク -->
      <div style="background:#f9f9f9; padding:25px; border-radius:8px; border-left:4px solid #27ae60;">
        <h3 style="margin:0 0 10px; font-size:18px; color:#333;">ホームレス支援全国ネットワーク</h3>
        <p style="margin:0 0 15px; color:#666; font-size:14px; line-height:1.6;">
          ネカフェ難民、ホームレスの自立支援を応援する各自治体の相談所を網羅しています。
        </p>
        <a href="https://www.homeless-net.org/" target="_blank" rel="noopener" style="color:#27ae60; text-decoration:underline; font-size:14px;">
          公式サイトを見る →
        </a>
      </div>

      <!-- 配偶者暴力相談支援センター -->
      <div style="background:#f9f9f9; padding:25px; border-radius:8px; border-left:4px solid #27ae60;">
        <h3 style="margin:0 0 10px; font-size:18px; color:#333;">配偶者暴力相談支援センター</h3>
        <p style="margin:0 0 15px; color:#666; font-size:14px; line-height:1.6;">
          配偶者からの暴力（「ドメスティック・バイオレンス＝DV」）で悩んでいる人のための全国の支援センターです。
        </p>
        <a href="https://www.gender.go.jp/policy/no_violence/e-vaw/soudankikan/index.html" target="_blank" rel="noopener" style="color:#27ae60; text-decoration:underline; font-size:14px;">
          公式サイトを見る →
        </a>
      </div>
    </div>
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

  section a[style*="background:#667eea"]:hover,
  section a[style*="background:#f39c12"]:hover,
  section a[style*="background:#27ae60"]:hover {
    opacity: 0.9;
    transform: translateY(-2px);
  }
</style>

<?php get_footer(); ?>
