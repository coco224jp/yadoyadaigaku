<?php
  $theme_uri = get_template_directory_uri();

  $queried_object = get_queried_object();
  $ttl_jp = esc_html( get_the_title( $queried_object->ID ) );
  $ttl_en = '';
  
  if(str_contains($ttl_jp, 'スクール') || str_contains($ttl_jp, 'オープン')) {
    $ttl_en = 'For Students';
  } elseif(str_contains($ttl_jp, '研修')) {
    $ttl_en = 'For Companies';
  } elseif(str_contains($ttl_jp, '業務支援') || str_contains($ttl_jp, 'サポート')) {
    $ttl_en = 'For Owners';
  }

  get_header();
?>

<main class="single-service">
  <?php 
    get_template_part('template-parts/subpage-mv', null, ['ttl_jp' => $ttl_jp, 'ttl_en' => $ttl_en]); 
  ?>

  <section class="p-service-introSec">
    <div class="l-inner">
      <div class="p-service-introSec__wrap">
        <div class="p-service-introSec__left">
          <p class="p-service-introSec__txt">現場のサービススタッフは優秀だが、ホテルのマネジメントやホテルビジネスを教える教育機関は皆無。欧米では大学が幹部候補生を育成することも一般的。宿屋塾は、ホテリエのソロバン力を鍛え、ロマンとソロバンを持ち合わせたホテリエを育成することで、日本の宿泊産業全体の高付加価値化を目指しています。<br><br>
          テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
        </div>
        <div class="p-service-introSec__right">
          <figure class="p-service-introSec__img">
            <img src="<?php echo $theme_uri; ?>/assets/images/service/single-service01.jpg" alt="">
          </figure>
        </div>
      </div><!-- /.p-service-introSec__wrap -->
    </div>
  </section>

  <section class="p-service-features bg-light">
    <div class="l-inner">
      <h2 class="c-subpage-ttl">宿屋塾の研修サービスの特徴</h2>
      <ul class="p-service-features__list">
        <li class="p-service-features__item">
          <h3 class="p-service-features__item-ttl">ホテル・旅館経営<br>
          <span class="text-highlight">マネジメント人材養成</span>に特化</h3>
          <p class="p-service-features__item-txt">ホテル・旅館ビジネスにおいて、CS（顧客満足）、ES（スタッフ満足）、Profit（利益）をバランスよく高めるプロフェッショナルホテルマネージャーの養成をミッションとしています。</p>
        </li>
        <li class="p-service-features__item">
          <h3 class="p-service-features__item-ttl">お客様の要望やニーズを叶える<br>
          <span class="text-highlight">多彩なプログラム</span></h3>
          <p class="p-service-features__item-txt">過去16年以上にわたり、500を超える講座開してきたネットワークを活用し、適任の講師を厳選し、的確な研修プログラムをカスタマイズし、ご提案いたします。</p>
        </li>
        <li class="p-service-features__item">
          <h3 class="p-service-features__item-ttl">成果至上主義で<br>
          研修者に<span class="text-highlight">とことん伴走</span></h3>
          <p class="p-service-features__item-txt">過去16年以上にわたり、500を超える講座開してきたネットワークを活用し、適任の講師を厳選し、的確な研修プログラムをカスタマイズし、ご提案いたします。</p>
        </li>
      </ul>
    </div>
  </section>

  <section class="p-service-products">
    <div class="l-inner">
      <h2 class="c-subpage-ttl">研修サービス一覧</h2>
      <ul class="p-service-products__list">
        <li class="p-service-products__item">
          <a href="" class="p-service-products__item-link">
            <div class="p-service-products__item-body">
              <h3 class="p-service-products__item-ttl">プロフェッショナルホテルマネジャー養成講座</h3>
              <p class="p-service-products__item-txt">ホテル総支配人やプロフェッショナルホテルマネジャーに必要な知識やスキルを体系的に、ホテル業界の内外で活躍する講師陣から8か月間かけて学ぶ「国内唯一」のプログラムです。<br>
              <p class="p-service-products__date">
                日時：
                <span class="p-service-products__period">
                  <time datetime="2025-05-01">2025.5</time>〜<time datetime="2026-03-31">2026.3</time>
                </span>
                締切：<time class="p-service-products__deadline" datetime="2025-05-01">2025.05.01</time>
              </p>
            </div>
            <figure class="p-service-products__item-img">
              <img src="<?php echo $theme_uri; ?>/assets/images/service/single-service02.jpg" alt="">
            </figure>
          </a>
        </li>
        <li class="p-service-products__item">
          <a href="" class="p-service-products__item-link">
            <div class="p-service-products__item-body">
              <h3 class="p-service-products__item-ttl">ホテル経営研究会</h3>
              <p class="p-service-products__item-txt">ホテル総支配人やプロフェッショナルホテルマネジャーに必要な知識やスキルを体系的に、ホテル業界の内外で活躍する講師陣から8か月間かけて学ぶ「国内唯一」のプログラムです。</p>
              <p class="p-service-products__date">
                日時：
                <span class="p-service-products__period">
                  <time datetime="2025-05-01">2025.5</time>〜<time datetime="2026-03-31">2026.3</time>
                </span>
                締切：<time class="p-service-products__deadline" datetime="2025-05-01">2025.05.01</time>
              </p>
            </div>
            <figure class="p-service-products__item-img">
              <img src="<?php echo $theme_uri; ?>/assets/images/service/single-service02.jpg" alt="">
            </figure>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section class="p-front-voices bg-light">
    <div class="l-inner">
    <h2 class="c-subpage-ttl">お客様からの声</h2>
    <div id="js-voice-card-swiper" class="c-voice-card-swiper swiper">
        <ul class="c-voice-card-swiper__wrapper swiper-wrapper">
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl">旅館経営者 / 50代</h3>
              <p class="c-voice-card__txt">宿屋塾をパートナーに選んだことで、「三菱電機としてのリーダー」を作ることにこだわったプログラムを実施し、熱を伝えることができたように思います。 議論していく中で、三菱電機「らしさ」を理解した、三菱電機グループでやっていく覚悟をもった経営者を作ることの大切さを参加者に伝えられたように思います。 </p>
          </li>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl">ホテルマネージャー / 40代</h3>
              <p class="c-voice-card__txt">宿屋塾は答えのない新規市場で戦う我々にひらめきを与えてくれます。事業成長資金はもちろん、ビジネスアイディア、組織づくり、コンプライアンスに至るまで全方位で事業成長を支援してくれる最高のパートナーです。</p>
          </li>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl">ホテルマネージャー / 40代</h3>
              <p class="c-voice-card__txt">グロービス・キャピタル・パートナーズは答えのない新規市場で戦う我々にひらめきを与えてくれます。事業成長資金はもちろん、ビジネスアイディア、組織づくり、コンプライアンスに至るまで全方位で事業成長を支援してくれる最高のパートナーです。</p>
          </li>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl">ホテルマネージャー / 40代</h3>
              <p class="c-voice-card__txt">グロービス・キャピタル・パートナーズは答えのない新規市場で戦う我々にひらめきを与えてくれます。事業成長資金はもちろん、ビジネスアイディア、組織づくり、コンプライアンスに至るまで全方位で事業成長を支援してくれる最高のパートナーです。</p>
          </li>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl">ホテルマネージャー / 40代</h3>
              <p class="c-voice-card__txt">グロービス・キャピタル・パートナーズは答えのない新規市場で戦う我々にひらめきを与えてくれます。事業成長資金はもちろん、ビジネスアイディア、組織づくり、コンプライアンスに至るまで全方位で事業成長を支援してくれる最高のパートナーです。</p>
          </li>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl">ホテルマネージャー / 40代</h3>
              <p class="c-voice-card__txt">グロービス・キャピタル・パートナーズは答えのない新規市場で戦う我々にひらめきを与えてくれます。事業成長資金はもちろん、ビジネスアイディア、組織づくり、コンプライアンスに至るまで全方位で事業成長を支援してくれる最高のパートナーです。</p>
          </li>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl">ホテルマネージャー / 40代</h3>
              <p class="c-voice-card__txt">グロービス・キャピタル・パートナーズは答えのない新規市場で戦う我々にひらめきを与えてくれます。事業成長資金はもちろん、ビジネスアイディア、組織づくり、コンプライアンスに至るまで全方位で事業成長を支援してくれる最高のパートナーです。</p>
          </li>
        </ul>
      </div>

      <div id="js-voice-card-swiper-controls" class="c-swiper-controls">
        <div class="swiper-button-prev c-arrow-btn prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next c-arrow-btn next"></div>
      </div>
    </div>
  </section>


</main>
<?php get_footer(); ?>