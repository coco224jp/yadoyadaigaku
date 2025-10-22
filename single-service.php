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

    while ( have_posts() ) : the_post();
  ?>

  <section class="p-service-introSec">
    <div class="l-inner">
    <?php
        the_content();
    ?>
    </div>
  </section>

  <?php
    endwhile;
  ?>

  <?php
    if(have_rows('service_features')):
  ?>
  <section class="p-service-features bg-light">
    <div class="l-inner">
      <h2 class="c-subpage-ttl">宿屋塾の研修サービスの特徴</h2>
      <ul class="p-service-features__list">
        <?php
          while(have_rows('service_features')): the_row();
            $service_feature_ttl = get_sub_field('service_feature_ttl');
            $service_feature_ttl = preg_replace('/\{(.+?)\}/', '<span class="text-highlight">$1</span>', $service_feature_ttl);
            $service_feature_txt = get_sub_field('service_feature_txt');
        ?>
        <li class="p-service-features__item">
          <h3 class="p-service-features__item-ttl"><?php echo $service_feature_ttl; ?></h3>
          <p class="p-service-features__item-txt"><?php echo $service_feature_txt; ?></p>
        </li>
        <?php
          endwhile;
        ?>
      </ul>
    </div>
  </section>
  <?php
    endif;
  ?>

  <?php
    $service_products = get_field('service_products');

    if ($service_products):
  ?>
  <section class="p-service-products">
    <div class="l-inner">
      <h2 class="c-subpage-ttl">研修サービス一覧</h2>
      <ul class="p-service-products__list">
        <?php
          foreach($service_products as $product_post):
            $product_permalink = get_permalink($product_post->ID);
            $product_ttl = get_the_title($product_post->ID);
            $product_thumbnail = get_the_post_thumbnail($product_post->ID, 'full');
            $product_desc = get_field('一覧よう説明文', $product_post->ID);
            $product_duration = get_field('日程', $product_post->ID);
            $product_deadline = get_field('締め切り', $product_post->ID);
        ?>
        <li class="p-service-products__item">
          <a href="<?php echo esc_attr($product_permalink); ?>" class="p-service-products__item-link">
            <div class="p-service-products__item-body">
              <h3 class="p-service-products__item-ttl"><?php echo esc_html($product_ttl); ?></h3>
              <p class="p-service-products__item-txt"><?php echo $product_desc; ?></p>
              <p class="p-service-products__date-info">
                <span class="p-service-products__date">
                  日時：<?php echo $product_duration; ?>
                </span>
                <span class="p-service-products__deadline">締切：<?php echo $product_deadline; ?></span>
              </p>
            </div>
            <?php if(has_post_thumbnail($product_post->ID)): ?>
            <figure class="p-service-products__item-img">
              <?php echo $product_thumbnail; ?>
            </figure>
            <?php endif; ?>
          </a>
        </li>
        <?php
          endforeach;
        ?>
      </ul>
    </div>
  </section>
  <?php
    endif;
  ?>

  <?php
    $service_voices = get_field('service_voices');

    if ($service_voices):
  ?>
  <section class="p-service-voices bg-light">
    <div class="l-inner">
      <h2 class="c-subpage-ttl">お客様からの声</h2>
      <div id="js-voice-card-swiper" class="c-voice-card-swiper swiper">
        <ul class="c-voice-card-swiper__wrapper swiper-wrapper">
          <?php
            foreach($service_voices as $voice_post):
              $voice_post_role = get_field('voice_role', $voice_post->ID);
              $voice_post_txt = get_the_content(null, false, $voice_post->ID);
          ?>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl"><?php echo $voice_post_role; ?></h3>
              <div class="c-voice-card__txt-wrap"><?php echo $voice_post_txt; ?></div>
          </li>
          <?php
            endforeach;
          ?>
        </ul>
      </div>

      <div id="js-voice-card-swiper-controls" class="c-swiper-controls">
        <div class="swiper-button-prev c-arrow-btn prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next c-arrow-btn next"></div>
      </div>
    </div>
  </section>
  <?php
    endif;
  ?>

</main>
<?php get_footer(); ?>