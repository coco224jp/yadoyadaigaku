<?php
  $theme_uri = get_template_directory_uri();
  $post_id = get_the_ID();
  $terms = get_the_terms( $post_id, 'product-cat' );
  $ttl_jp = '';
  $ttl_en = '';
  
  if ( $terms && ! is_wp_error( $terms ) ) {
    foreach ( $terms as $term ) {
      $ttl_jp = esc_html( $term->name );
    }
  }

  if(str_contains($ttl_jp, 'オープン')) {
    $ttl_en = 'Open Courses';
  } elseif(str_contains($ttl_jp, 'スクール')) {
    $ttl_en = 'Schools';
  } 

  get_header();
?>
<main class="single-product">
  <?php 
    $args = [
      'ttl_jp' => $ttl_jp,
      'ttl_en' => $ttl_en 
    ];

    get_template_part('template-parts/subpage-mv', null, $args); 
  ?>

  <section class="p-product-fv">
    <div class="l-inner">
      <div class="p-product-fv__wrapper">
        <div class="p-product-fv__txt-wrap">
          <div class="p-product-fv__cats">
            <span class="u-term">カテゴリ</span>
            <span class="u-term">カテゴリ</span>
            <span class="u-term">カテゴリ</span>
            <span class="u-term">カテゴリ</span>
          </div>
          <h1 class="p-product-fv__ttl">「次世代」のハウスキーピングマネジャー養成講座～ホテルブランド価値向上への寄与！</h1>
          <p class="p-product-fv__subttl">
            魅力的なコンセプトをハードとソフトの両面から築き、ずっと愛されるホテルを創れる人を育成します。
          </p>
          <div class="p-product-fv__instructor">
            <figure class="p-product-fv__instructor-img">
              <img src="<?php echo $theme_uri; ?>/assets/images/product/instructor.jpg" alt="">
            </figure>
            <div class="p-product-fv__instructor-txt">
              株式会社クリーンネクスト 代表取締役<br>
              西山 貴代(にしやま・きよ)氏 
            </div>
          </div>
          <dl class="p-product-fv__date-place">
            <dt class="p-product-fv__date-place-ttl ">日時</dt>
            <dd class="p-product-fv__date-place-txt font-en">2025.5～2025.7（全6回）</dd>
            <dt class="p-product-fv__date-place-ttl">会場</dt>
            <dd class="p-product-fv__date-place-txt">ZOOMによるオンラインと都内でのオフライン</dd>
          </dl>
        </div>
        <figure class="p-product-fv__img">
          <img src="<?php echo $theme_uri; ?>/assets/images/front/front-mv01.jpg" alt="">
        </figure>
        </div>
      </div>
    </div>
  </section>

  <section class="p-product-recommend bg-light pb-0">
    <div class="l-inner __small">
      <h2 class="p-product-recommend__ttl c-subpage-ttl __small">こんな方におすすめ</h2>
      <ul class="p-product-recommend__list">
        <li class="p-product-recommend__item">
          <h2 class="p-product-recommend__item-txt">
            ホテルのハウスキーピング部門の<br>
            <span class="text-highlight">マネジャー、マネジャー候補生</span>
          </h2>
        </li>
        <li class="p-product-recommend__item">
          <h2 class="p-product-recommend__item-txt">
            フルサービス型ホテルに限らず、<br>
            <span class="text-highlight">宿泊主体型ホテルの方も</span>歓迎<br>
          </h2>
        </li>
        <li class="p-product-recommend__item">
          <h2 class="p-product-recommend__item-txt">
            <span class="text-highlight">ホテルオーナー、支配人など</span>清掃会社<br>
            とのミーティングや交渉をする方
          </h2>
        </li>
      </ul>
      <div class="p-product-recommend__btn c-btn __large __disabled">
        <a href="" class="c-btn__link">募集終了</a>
      </div>
    </div>
  </section>

  <section class="p-product-freeArea">
    <div class="l-inner __small">
      <h2 class="p-product-freeArea__ttl c-subpage-ttl __small text-center">魅力的なコンセプトをハードと<br class="only-sp">ソフトの両面から築き、<br>
      ずっと愛されるホテルを<br class="only-sp">創れる人を育成します。</h2>
      <p class="p-product-freeArea__txt">
        ところが、ポストコロナで急速に回復した宿泊需要や、乱立する新規ホテル建設ラッシュによって、ホテル清掃にあたる人材は大いに不足しています。この難しい状況において、「客室を期待通り、時間通りに完璧に仕上げる」を、どうコントロールするかが、ホテル運営に求められる命題です。そして、アウトソーシングしている清掃会社 の方とコミュニケーションし、マネジメントする仕事はプロフェッショナルな仕事だと考えています。ホテルにとって、最も重要な商品である「客室」。<br>
        その清掃の品質が劣化すると 途端にコンプレやクレームが発生し、口コミ評価スコアが下がります。客室が清潔に、ゴミひとつなく清掃されていることはゲストが最低限望む期待だからです。つまり、期待通りに客室が仕上がり、そしてそれが時間通りに完了されるという
      </p>
      <div class="p-product-freeArea__iframe-wrap">
        <iframe src="https://www.youtube.com/embed/wDchsz8nmbo?si=qFOwVKZ6kGw8Rp2u" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <p class="p-product-freeArea__txt">
        ところが、ポストコロナで急速に回復した宿泊需要や、乱立する新規ホテル建設ラッシュによって、ホテル清掃にあたる人材は大いに不足しています。この難しい状況において、「客室を期待通り、時間通りに完璧に仕上げる」を、どうコントロールするかが、ホテル運営に求められる命題です。そして、アウトソーシングしている清掃会社 の方とコミュニケーションし、マネジメントする仕事はプロフェッショナルな仕事だと考えています。ホテルにとって、最も重要な商品である「客室」。<br>
        その清掃の品質が劣化すると 途端にコンプレやクレームが発生し、口コミ評価スコアが下がります。客室が清潔に、ゴミひとつなく清掃されていることはゲストが最低限望む期待だからです。つまり、期待通りに客室が仕上がり、そしてそれが時間通りに完了されるという
      </p>
    </div>
  </section>

  <section class="p-product-cta bg-light text-center">
    <div class="l-inner">
      <h2 class="p-product-cta__ttl c-subpage-ttl __small">ホテル経営の課題を<br class="only-sp">乗り越えるヒントがここに</h2>
      <p class="p-product-cta__txt">ホテル経営研究会では、全国の経営者と共に学び、実践に活かす貴重な機会を提供します。</p>
      <div class="p-product-cta__btn c-btn __disabled">
        <a href="" class="c-btn__link">詳細を見る</a>
      </div>
    </div>
  </section>

  <section class="p-product-voice bg-dark">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl __small text-center">参加者の声</h2>
      <ul class="p-product-voice__list">
        <li class="p-product-voice__item">
            <figure class="p-product-voice__item-img">
              <img src="<?php echo $theme_uri; ?>/assets/images/product/voice.jpg" alt="">
            </figure>
            <h3 class="p-product-voice__item-catch">ホテル経営者に<br>とって多様な価値を<br>られる場所</h3>
            <p class="p-product-voice__item-info">
              <span class="p-product-voice__item-company">JR九州ホテルズアンドリゾーツ株式会社</span><br>
              <span class="p-product-voice__item-role">代表取締役社長執行役員</span>
            </p>
            <span class="p-product-voice__item-name">角谷 英彦 氏</span>
            <p class="p-product-voice__item-txt">
              マネージメントに必要な、オーナーやオペレーション本部、地域の行政機関など、広域なステークホルダーと関わるための考え方を身に着けられました。<br>
              普段では体験できないマネージメントを講義で疑似体験することで“新たな引き出し”が増えました。
            </p>
        </li>
        <li class="p-product-voice__item">
            <figure class="p-product-voice__item-img">
              <img src="<?php echo $theme_uri; ?>/assets/images/product/voice.jpg" alt="">
            </figure>
            <h3 class="p-product-voice__item-catch">ホテル経営者に<br>とって多様な価値を<br>られる場所</h3>
            <p class="p-product-voice__item-info">
              <span class="p-product-voice__item-company">JR九州ホテルズアンドリゾーツ株式会社</span><br>
              <span class="p-product-voice__item-role">代表取締役社長執行役員</span>
            </p>
            <span class="p-product-voice__item-name">角谷 英彦 氏</span>
            <p class="p-product-voice__item-txt">
              マネージメントに必要な、オーナーやオペレーション本部、地域の行政機関など、広域なステークホルダーと関わるための考え方を身に着けられました。<br>
              普段では体験できないマネージメントを講義で疑似体験することで“新たな引き出し”が増えました。
            </p>
        </li>
        <li class="p-product-voice__item">
            <figure class="p-product-voice__item-img">
              <img src="<?php echo $theme_uri; ?>/assets/images/product/voice.jpg" alt="">
            </figure>
            <h3 class="p-product-voice__item-catch">ホテル経営者に<br>とって多様な価値を<br>られる場所</h3>
            <p class="p-product-voice__item-info">
              <span class="p-product-voice__item-company">JR九州ホテルズアンドリゾーツ株式会社</span><br>
              <span class="p-product-voice__item-role">代表取締役社長執行役員</span>
            </p>
            <span class="p-product-voice__item-name">角谷 英彦 氏</span>
            <p class="p-product-voice__item-txt">
              マネージメントに必要な、オーナーやオペレーション本部、地域の行政機関など、広域なステークホルダーと関わるための考え方を身に着けられました。<br>
              普段では体験できないマネージメントを講義で疑似体験することで“新たな引き出し”が増えました。
            </p>
        </li>
      </ul>
    </div>
  </section>

  <section class="p-product-schedule">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl __small text-center">スケジュール</h2>
      <div class="p-product-schedule__table-wrap">
        <table class="p-product-schedule__table">
          <thead class="p-product-schedule__thead">
            <tr class="p-product-schedule__tr">
              <th colspan="2">内容</th>
              <th>日程</th>
              <th>会場</th>
            </tr>
          </thead>
          <tbody>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
            <tr class="p-product-schedule__tr">
              <td>Day1</td>
              <td>ホテルビジネスと<br>
                プロフェッショナルマネージャー
              </td>
              <td>2025.5.10(土) 10:00-17:00</td>
              <td>オフライン (東京都内)</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="p-product-schedule__btn c-btn">
        <a href="" class="c-btn__link">講座内容の詳細</a>
      </div>
    </div>
  </section>

  <section class="p-product-overview bg-light">
    <div class="l-inner __small">
      <h2 class="p-product-overview__ttl c-subpage-ttl">開催概要</h2>
      <dl class="p-product-overview__dl">
        <div class="p-product-overview__item">
          <dt class="p-product-overview__dt text-last-justify">日時</dt>
          <dd class="p-product-overview__dd">
            <div class="p-product-overview__dd-txt">2025.02～2025.07(12回)</div>
            <div class="p-product-overview__note">
              <small>※都内でのリアル集合研修３回、オンライン研修７回、フィールドワーク２回</small>
              <small>※都合が合わず欠席となった場合、後日動画で視聴することが可能です</small>
            </div>
          </dd>
        </div>
        <div class="p-product-overview__item">
          <dt class="p-product-overview__dt text-last-justify">会場</dt>
          <dd class="p-product-overview__dd">
            <div class="p-product-overview__dd-txt">ZOOMによるオンラインと都内にてオフライン開催</div>
            <div class="p-product-overview__note"><small>※都内でのリアル集合研修３回、オンライン研修７回、フィールドワーク２回</small></div>
          </dd>
        </div>
        <div class="p-product-overview__item __pd-block-large">
          <dt class="p-product-overview__dt text-last-justify">定員</dt>
          <dd class="p-product-overview__dd">
            <div class="p-product-overview__dd-txt">8人 (最少催行ざ人員4人)</div>
          </dd>
        </div>
        <div class="p-product-overview__item">
          <dt class="p-product-overview__dt">受講料</dt>
          <dd class="p-product-overview__dd">
            <div class="p-product-overview__dd-txt">650,000円(税別)</div>
            <div class="p-product-overview__note"><small class="">※フィールドワークにかかる費用は別途必要になります。</small></div>
          </dd>
        </div>
        <div class="p-product-overview__item deadline __pd-block-large">
          <dt class="p-product-overview__dt">締め切り</dt>
          <dd class="p-product-overview__dd">
            <div class="p-product-overview__dd-txt">2025.02.07(金)</div>
          </dd>
        </div>
      </dl>
    </div>
  </section>

  <section class="p-product-profile">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl">講師プロフィール</h2>
      <ul class="p-product-profile__list">
        <li class="p-product-profile__item">
          <figure class="p-product-profile__item-img">
            <img src="<?php echo $theme_uri; ?>/assets/images/product/instructor.jpg" alt="">
          </figure>
          <p class="p-product-profile__item-txt">
            <span class="p-product-profile__role">株式会社クリーンネクスト 代表取締役 </span>
            <span class="p-product-profile__name">西山 貴代 氏</span>
            <span class="p-product-profile__furigana">(にしやま・きよ)</span>
          </p>
          <div class="p-product-profile__btn c-btn __height-short">
            <a href="" class="c-btn__link">詳細をみる</a>
          </div>
        </li>
        <li class="p-product-profile__item">
          <figure class="p-product-profile__item-img">
            <img src="<?php echo $theme_uri; ?>/assets/images/product/instructor.jpg" alt="">
          </figure>
          <p class="p-product-profile__item-txt">
            <span class="p-product-profile__role">株式会社クリーンネクスト 代表取締役 </span>
            <span class="p-product-profile__name">西山 貴代 氏</span>
            <span class="p-product-profile__furigana">(にしやま・きよ)</span>
          </p>
          <div class="p-product-profile__btn c-btn __height-short">
            <a href="" class="c-btn__link">詳細をみる</a>
          </div>
        </li>
        <li class="p-product-profile__item">
          <figure class="p-product-profile__item-img">
            <img src="<?php echo $theme_uri; ?>/assets/images/product/instructor.jpg" alt="">
          </figure>
          <p class="p-product-profile__item-txt">
            <span class="p-product-profile__role">株式会社クリーンネクスト 代表取締役 </span>
            <span class="p-product-profile__name">西山 貴代 氏</span>
            <span class="p-product-profile__furigana">(にしやま・きよ)</span>
          </p>
          <div class="p-product-profile__btn c-btn __height-short">
            <a href="" class="c-btn__link">詳細をみる</a>
          </div>
        </li>
        <li class="p-product-profile__item">
          <figure class="p-product-profile__item-img">
            <img src="<?php echo $theme_uri; ?>/assets/images/product/instructor.jpg" alt="">
          </figure>
          <p class="p-product-profile__item-txt">
            <span class="p-product-profile__role">株式会社クリーンネクスト 代表取締役 </span>
            <span class="p-product-profile__name">西山 貴代 氏</span>
            <span class="p-product-profile__furigana">(にしやま・きよ)</span>
          </p>
          <div class="p-product-profile__btn c-btn __height-short">
            <a href="" class="c-btn__link">詳細をみる</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="p-product-other">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl">その他講座・ビジネススクール</h2>
      <div id="js-product-swiper" class="u-product-swiper swiper">
        <ul class="swiper-wrapper">
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">講座</span>
                <h3 class="c-thumbnail-card__ttl">第3回 ホテル経営会</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card01.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">セミナー</span>
                <h3 class="c-thumbnail-card__ttl">次世代のハウスキーピングマネジャーに必要な３つの重要な能力の高め方～清掃会社と二人三脚で『客室を完璧に仕上げる』技術</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card-other02.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">スクール</span>
                <h3 class="c-thumbnail-card__ttl">「ゲストの期待を超える自立型組織を築くリーダーシップとマネジメント ～Operational Excellenceな現場を創る！」</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card03.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">講座</span>
                <h3 class="c-thumbnail-card__ttl">第3回 ホテル経営会</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card01.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">セミナー</span>
                <h3 class="c-thumbnail-card__ttl">次世代のハウスキーピングマネジャーに必要な３つの重要な能力の高め方～清掃会社と二人三脚で『客室を完璧に仕上げる』技術</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card-other02.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">スクール</span>
                <h3 class="c-thumbnail-card__ttl">「ゲストの期待を超える自立型組織を築くリーダーシップとマネジメント ～Operational Excellenceな現場を創る！」</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card03.jpg" alt="">
              </figure>
            </a>
          </li>

        </ul>
      </div>
      <div id="js-product-swiper-controls" class="c-swiper-controls">
        <div class="swiper-button-prev c-arrow-btn prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next c-arrow-btn next"></div>
      </div> 
    </div>
  </section>
</main>
<?php get_footer(); ?>