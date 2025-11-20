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
      $random_count = rand(6, 10);
      $import_girls = get_kami_import_data($random_count, $prefecture_name, true);

      if (!empty($import_girls)) :
        foreach ($import_girls as $g) :
          $meta_parts = array_filter([
            !empty($g->figure) ? $g->figure : null,
            !empty($g->character) ? $g->character : null,
          ]);
    ?>
      <div style="background:#fff; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1); overflow:hidden;">
        <a href="<?php echo esc_url($g->url); ?>" target="_blank" style="text-decoration:none; color:#333;">
          <?php if (!empty($g->samune)) : ?>
            <img src="<?php echo esc_url($g->samune); ?>" alt="<?php echo esc_attr($g->name); ?>" style="width:100%; height:220px; object-fit:cover;">
          <?php else : ?>
            <div style="width:100%; height:220px; background:#f0f0f0; display:flex; align-items:center; justify-content:center; color:#999;">
              No Image
            </div>
          <?php endif; ?>
          <div style="padding:15px;">
            <h3 style="margin:0 0 5px; font-size:18px;">
              <?php echo esc_html($g->name); ?><?php if (!empty($g->age)) echo '（' . esc_html($g->age) . '）'; ?>
            </h3>
            <?php if (!empty($meta_parts)) : ?>
              <p style="font-size:14px; color:#666;">
                <?php echo esc_html(implode('・', $meta_parts)); ?>
              </p>
            <?php endif; ?>
            <?php if (!empty($g->comment)) : ?>
              <p style="font-size:13px; margin-top:8px;">
                <?php echo esc_html($g->comment); ?>
              </p>
            <?php endif; ?>
          </div>
        </a>
      </div>
    <?php
        endforeach;
      else :
    ?>
      <p style="grid-column:1/-1; text-align:center; color:#999;">
        現在、<?php echo esc_html($prefecture_name); ?>の神待ち女性は登録されていません。
      </p>
    <?php endif; ?>
  </div>

  <!-- SEO対策コンテンツ -->
  <section style="background:#f9f9f9; padding:30px; border-radius:10px; margin-bottom:40px;">
    <h2 style="font-size:24px; margin-bottom:20px; color:#333;">
      <?php echo esc_html($prefecture_name); ?>の神待ち掲示板について
    </h2>
    <div style="line-height:1.8; color:#555;">
      <p style="margin-bottom:15px;">
        <?php echo esc_html($prefecture_name); ?>で神待ち女性と出会いたい方のための掲示板情報をまとめています。神待ちとは、家出や経済的な理由で一時的に宿泊場所を探している女性のことを指します。当サイトでは、<?php echo esc_html($prefecture_name); ?>エリアで実際に活動している神待ち女性のプロフィールを掲載しており、年齢、体型、性格などの詳細情報から、あなたに合った相手を見つけることができます。
      </p>
      <p style="margin-bottom:15px;">
        掲示板を利用する際は、相手の気持ちを尊重し、安全に配慮した出会いを心がけてください。金銭のやり取りや違法行為は厳禁です。初めて神待ち掲示板を利用する方は、まずメッセージのやり取りから始めて、相手のことをよく知ってから実際に会うことをお勧めします。
      </p>
    </div>
  </section>

  <!-- 都道府県別SEOコンテンツ -->
  <section style="background:#fff; padding:30px; border-radius:10px; box-shadow:0 3px 10px rgba(0,0,0,0.1); margin-bottom:40px;">
    <?php
      // 都道府県別のSEOコンテンツ
      $seo_content = [
        '北海道' => [
          'title' => '北海道で神待ち女性と出会うポイント',
          'content' => '北海道は広大な土地を持つため、札幌市を中心に神待ち女性が多く活動しています。特に冬季は寒さから宿泊場所を求める女性が増える傾向にあります。札幌駅周辺やすすきのエリアでの待ち合わせが一般的です。北海道の神待ち女性は、温かい人柄の方が多く、初めての方でも安心して出会えると評判です。'
        ],
        '東京都' => [
          'title' => '東京都で神待ち女性と出会うポイント',
          'content' => '東京都は日本最大の神待ち掲示板利用者数を誇ります。新宿、渋谷、池袋などの主要駅周辺で多くの神待ち女性が活動しており、24時間いつでも出会いのチャンスがあります。東京の神待ち女性は、様々なバックグラウンドを持つ方が多く、自分に合った相手を見つけやすいのが特徴です。カフェやカラオケでの待ち合わせが人気です。'
        ],
        '大阪府' => [
          'title' => '大阪府で神待ち女性と出会うポイント',
          'content' => '大阪府は関西最大の神待ち掲示板エリアです。梅田、難波、天王寺などの繁華街を中心に、多くの神待ち女性が活動しています。大阪の女性は明るく気さくな性格の方が多く、初対面でもすぐに打ち解けられると評判です。お好み焼き屋やたこ焼き屋での待ち合わせも人気があります。'
        ],
        '神奈川県' => [
          'title' => '神奈川県で神待ち女性と出会うポイント',
          'content' => '神奈川県は横浜市を中心に神待ち女性が多く活動しています。みなとみらいや横浜駅周辺、川崎駅周辺が人気のエリアです。海が近いため、デートスポットも豊富で、出会った後の展開もスムーズです。神奈川の神待ち女性は、おしゃれで洗練された方が多いのが特徴です。'
        ],
        '愛知県' => [
          'title' => '愛知県で神待ち女性と出会うポイント',
          'content' => '愛知県は名古屋市を中心に神待ち掲示板が活発です。栄、名駅、金山などの主要駅周辺で多くの神待ち女性が活動しています。東海地方最大の都市圏であり、様々なタイプの女性と出会えるチャンスがあります。名古屋の女性は、しっかりした性格の方が多く、真剣な出会いを求める方にもおすすめです。'
        ],
        '福岡県' => [
          'title' => '福岡県で神待ち女性と出会うポイント',
          'content' => '福岡県は九州最大の神待ち掲示板エリアです。天神、博多、中洲などの繁華街を中心に、多くの神待ち女性が活動しています。福岡の女性は、美人が多いと評判で、明るく社交的な性格の方が多いのが特徴です。屋台での待ち合わせも福岡ならではの楽しみ方です。'
        ],
        '埼玉県' => [
          'title' => '埼玉県で神待ち女性と出会うポイント',
          'content' => '埼玉県は大宮、浦和、川口などの主要都市で神待ち女性が活動しています。東京に近いため、都内からのアクセスも良く、気軽に出会えるのが魅力です。埼玉の神待ち女性は、親しみやすく素朴な方が多く、初心者にもおすすめのエリアです。'
        ],
        '千葉県' => [
          'title' => '千葉県で神待ち女性と出会うポイント',
          'content' => '千葉県は千葉市、船橋市、柏市などで神待ち女性が活動しています。東京ディズニーリゾートや幕張メッセなど、デートスポットも豊富です。千葉の神待ち女性は、明るく元気な方が多く、楽しい時間を過ごせると評判です。'
        ],
        '兵庫県' => [
          'title' => '兵庫県で神待ち女性と出会うポイント',
          'content' => '兵庫県は神戸市を中心に神待ち女性が活動しています。三宮、元町、神戸ハーバーランドなどのおしゃれなエリアでの待ち合わせが人気です。神戸の女性は、上品で洗練された方が多く、質の高い出会いを求める方におすすめです。'
        ],
        '京都府' => [
          'title' => '京都府で神待ち女性と出会うポイント',
          'content' => '京都府は古都の雰囲気を持つ独特のエリアです。四条河原町、京都駅周辺で神待ち女性が活動しています。京都の女性は、落ち着いた雰囲気の方が多く、ゆっくりと関係を深めたい方に向いています。観光スポットも多く、デートコースも豊富です。'
        ],
        '栃木県' => [
          'title' => '栃木県で神待ち女性と出会うポイント',
          'content' => '栃木県は宇都宮市を中心に神待ち女性が活動しています。餃子の街として有名な宇都宮では、食事を楽しみながらの出会いが人気です。栃木の神待ち女性は、素朴で親しみやすい方が多く、自然体での出会いを求める方におすすめです。日光や那須などの観光地も近く、デートスポットも充実しています。'
        ],
        '茨城県' => [
          'title' => '茨城県で神待ち女性と出会うポイント',
          'content' => '茨城県は水戸市、つくば市を中心に神待ち女性が活動しています。首都圏に近く、アクセスも良好です。茨城の神待ち女性は、気さくで明るい性格の方が多く、初対面でも話しやすいと評判です。海や湖など自然が豊かなエリアも多く、アウトドアデートも楽しめます。'
        ],
        '群馬県' => [
          'title' => '群馬県で神待ち女性と出会うポイント',
          'content' => '群馬県は高崎市、前橋市を中心に神待ち女性が活動しています。温泉地が多いため、温泉デートを楽しめるのが魅力です。群馬の神待ち女性は、温かく優しい性格の方が多く、癒しを求める方におすすめです。草津温泉や伊香保温泉など、有名な温泉地も多数あります。'
        ]
      ];

      // デフォルトコンテンツ
      $default_content = [
        'title' => $prefecture_name . 'で神待ち女性と出会うポイント',
        'content' => $prefecture_name . 'で神待ち女性と出会うためには、まず掲示板で気になる女性のプロフィールをチェックしましょう。年齢、体型、性格などの情報から、自分に合った相手を見つけることが大切です。メッセージのやり取りでは、相手の気持ちを尊重し、丁寧なコミュニケーションを心がけてください。実際に会う際は、カフェや公共の場所での待ち合わせをお勧めします。' . $prefecture_name . 'の神待ち女性は、真剣に出会いを求めている方が多いため、誠実な対応が信頼関係を築く鍵となります。'
      ];

      $content_data = isset($seo_content[$prefecture_name]) ? $seo_content[$prefecture_name] : $default_content;
    ?>
    <h2 style="font-size:22px; margin-bottom:20px; color:#333; border-left:4px solid #667eea; padding-left:15px;">
      <?php echo esc_html($content_data['title']); ?>
    </h2>
    <p style="line-height:1.8; color:#555; margin-bottom:20px;">
      <?php echo esc_html($content_data['content']); ?>
    </p>
  </section>

  <!-- 安全な利用のための注意事項 -->
  <section style="background:#fff3cd; padding:30px; border-radius:10px; border-left:5px solid #ffc107;">
    <h3 style="margin:0 0 15px; font-size:20px; color:#856404;">
      <?php echo esc_html($prefecture_name); ?>で安全に神待ち掲示板を利用するために
    </h3>
    <ul style="margin:0; padding-left:20px; color:#856404; line-height:1.8;">
      <li>初めて会う際は、必ず公共の場所（カフェ、ファミレスなど）で待ち合わせしましょう</li>
      <li>個人情報（住所、勤務先など）は安易に教えないようにしましょう</li>
      <li>金銭の要求があった場合は、すぐに連絡を断ちましょう</li>
      <li>相手の気持ちを尊重し、無理な要求はしないようにしましょう</li>
      <li>トラブルが発生した場合は、速やかに警察や運営に相談しましょう</li>
    </ul>
  </section>
</main>

<?php get_footer(); ?>
