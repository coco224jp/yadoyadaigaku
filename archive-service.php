<?php
  $theme_uri = get_template_directory_uri();

  get_header();
  $args = [
    'ttl_jp' => '宿屋塾のサービス',
    'ttl_en' => 'Service'
  ];
?>

<main class="archive-service">
  <?php get_template_part('template-parts/subpage-mv', null, $args); ?>

  <section class="p-service-introSec">
    <div class="l-inner">
      <div class="p-service-introSec__wrap">
        <div class="p-service-introSec__left">
          <h2 class="p-service-introSec__ttl">宿泊業に特化した<br>
          ビジネススクールサービス</h2>
          <p class="p-service-introSec__txt">現場のサービススタッフは優秀だが、ホテルのマネジメントやホテルビジネスを教える教育機関は皆無。欧米では大学が幹部候補生を育成することも一般的。宿屋塾は、ホテリエのソロバン力を鍛え、ロマンとソロバンを持ち合わせたホテリエを育成することで、日本の宿泊産業全体の高付加価値化を目指しています。<br><br>
          テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
        </div>
        <div class="p-service-introSec__right">
          <figure class="p-service-introSec__img">
            <img src="<?php echo $theme_uri; ?>/assets/images/service/service-archive01.jpg" alt="">
          </figure>
        </div>
      </div><!-- /.p-service-introSec__wrap -->
    </div>
  </section>

  <section class="p-service-cards bg-light">
    <div class="l-inner">
      <ul class="p-service-cards__card-list">
        <li class="c-card">
          <a href="<?php echo home_url('/service/business-school/'); ?>" class="c-card__link">
            <div class="c-card__txt-wrap">
              <h3 class="c-card__ttl">
                <span class="c-card__ttl-en">For Students</span>
                <span class="c-card__ttl-jp">ビジネススクール</span>
              </h3>
              <p class="c-card__txt">ホテル・旅館業界専門のビジネススクール「宿屋大学」は、年間100講座以上開講しているオープン講座以外にも、ホテル企業や観光協会、自治体からの依頼を受け</p>
            </div>
            <figure class="c-card__img">
              <img src="<?php echo $theme_uri; ?>/assets/images/service/service-archive02.jpg" alt="">
            </figure>
          </a>
        </li>
        <li class="c-card">
          <a href="" class="c-card__link">
            <div class="c-card__txt-wrap">
              <h3 class="c-card__ttl">
                <span class="c-card__ttl-en">For Students</span>
                <span class="c-card__ttl-jp">オープン講座</span>
              </h3>
              <p class="c-card__txt">ホテル・旅館業界専門のビジネススクール「宿屋大学」は、年間100講座以上開講しているオープン講座以外にも、ホテル企業や観光協会、自治体からの依頼を受け</p>
            </div>
            <figure class="c-card__img">
            <img src="<?php echo $theme_uri; ?>/assets/images/service/service-archive03.jpg" alt="">
            </figure>
          </a>
        </li>
        <li class="c-card">
          <a href="" class="c-card__link">
            <div class="c-card__txt-wrap">
              <h3 class="c-card__ttl">
                <span class="c-card__ttl-en">For Companies</span>
                <span class="c-card__ttl-jp">企業向け研修</span>
              </h3>
              <p class="c-card__txt">ホテル・旅館業界専門のビジネススクール「宿屋大学」は、年間100講座以上開講しているオープン講座以外にも、ホテル企業や観光協会、自治体からの依頼を受け</p>
            </div>
            <figure class="c-card__img">
            <img src="<?php echo $theme_uri; ?>/assets/images/service/service-archive04.jpg" alt="">
            </figure>
          </a>
        </li>
        <li class="c-card">
          <a href="" class="c-card__link">
            <div class="c-card__txt-wrap">
              <h3 class="c-card__ttl">
                <span class="c-card__ttl-en">For Owners</span>
                <span class="c-card__ttl-jp">業務支援</span>
              </h3>
              <p class="c-card__txt">ホテル・旅館業界専門のビジネススクール「宿屋大学」は、年間100講座以上開講しているオープン講座以外にも、ホテル企業や観光協会、自治体からの依頼を受け</p>
            </div>
            <figure class="c-card__img">
            <img src="<?php echo $theme_uri; ?>/assets/images/service/service-archive05.jpg" alt="">
            </figure>
          </a>
        </li>
      </ul>
    </div>
  </section>
</main>
<?php get_footer(); ?>