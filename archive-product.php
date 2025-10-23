<?php
  $theme_uri = get_template_directory_uri();

  get_header();
  $args = [
    'ttl_jp' => 'オープン講座<br class="only-sp">・スクール一覧',
    'ttl_en' => 'Open Courses & Schools'
  ];
?>

<main class="archive-product">
  <?php get_template_part('template-parts/subpage-mv', null, $args); ?>

  <section class="p-product-school">
    <div class="l-inner">
      <h2 class="p-product-archive-ttl">
        <span class="p-product-archive-ttl__en">For Students</span>
        <span class="p-product-archive-ttl__ja">ビジネススクール</span>
      </h2>


<?php
  $loop = new WP_Query(
    array(
        'post_status' => 'publish'
      , 'post_type' => 'product'
      , 'tax_query' => array(array('taxonomy' => 'product-cat','field' => "slug",'terms' => "school" ))
      , 'posts_per_page' => "-1"
    )
  );
?>

<?php if($loop->have_posts()){ ?>
      <div id="js-product-swiper" class="u-product-swiper swiper">
        <ul class="swiper-wrapper">


<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

<?php

  $link        = get_permalink();
  $link_target = '';

  if(get_field("詳細ページURL")){
    $link        = get_field("詳細ページURL");
    $link_target = ' target="_blank" ';
  }

  //アイキャッチのID
  $thumbnail_id = get_post_thumbnail_id();
  $img = wp_get_attachment_image_src($thumbnail_id,'large');
  $img = (isset($img[0]))? $img[0] : "";

  //応募締切 終了=true
  $end = is_event_closed($post->ID);

?>
          <li class="c-thumbnail-card swiper-slide <?php echo $end ? '__closed' : ''; ?>">
            <a href="<?php echo $link; ?>" <?php echo $link_target; ?> class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <h3 class="c-thumbnail-card__ttl"><?php echo get_the_title(); ?></h3>
                <div class="c-thumbnail-card__date">
                  日程：<span><?php echo get_field("日程"); ?></span>
                  締切：<span class="p-service-block-products__deadline"><?php echo get_field("締め切り"); ?></span>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $img; ?>" alt="">
              </figure>
            </a>
          </li>
<?php endwhile; ?>          

        </ul>
      </div>
      <div id="js-product-swiper-controls" class="c-swiper-controls">
        <div class="swiper-button-prev c-arrow-btn prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next c-arrow-btn next"></div>
      </div> 
<?php } ?>

    </div>
  </section>

  <section class="p-product-open pt-0">
    <div class="l-inner">
      <h2 class="p-product-archive-ttl">
        <span class="p-product-archive-ttl__en">For Students</span>
        <span class="p-product-archive-ttl__ja">オープン講座</span>
      </h2>
      <p class="p-product-open__intro-txt">
        各業界のスペシャリストをお招きして開催しているオープン講座です。2,000年に始まり、過去の500回以上開催している宿泊ビジネス・観光業に関する講演会。基本月一回、平日の18時～19時30分に開講しています。
      </p>





      <ul class="p-product-open__list">
      </ul>


      <div class="p-load-more">
        <button class="p-load-more__btn js-load-more">
          もっと見る
        </button>
      </div>
    </div>
  </section>

</main>
<script type="text/javascript" src="<?php echo $theme_uri; ?>/assets/js/product-load.js"></script>
<?php get_footer(); ?>