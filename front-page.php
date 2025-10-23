<?php
  $theme_uri = get_template_directory_uri();

  get_header();
?>

<main>
  <section class="p-front-mv bg-light">
    <div class="p-front-mv__inner l-inner">
      <div id="js-front-mv-swiper" class="p-front-mv__swiper c-overflow-swiper swiper">
        <ul class="p-front-mv__swiper-wrapper swiper-wrapper">
           <?php

            $today = current_time('Y-m-d');

            $mv_args = array(
              'post_type'      => 'product',
              'posts_per_page' => 5,
              'meta_query'     => array(
                'relation' => 'AND',
                array(
                  'key'     => '終了日',
                  'value'   => $today,
                  'compare' => '>=',
                  'type'    => 'DATE',
                ),
                array(
                  'key'     => '開催日',
                  'compare' => 'EXISTS',
                ),
              ),
              'meta_key'       => '開催日',
              'orderby'        => 'meta_value',
              'order'          => 'ASC',
            );

            $mv_query = new WP_Query($mv_args);

  // 開催日の曜日を日本語で取得する関数
  function get_weekday_jp($date) {
      $weekdays = ['日', '月', '火', '水', '木', '金', '土'];
      return $weekdays[$date->format('w')];
  }

 if($mv_query->have_posts()){ 
 while ( $mv_query->have_posts() ) : $mv_query->the_post(); 

  $link        = get_permalink();
  $link_target = '';

  if(get_field("詳細ページURL")){
    $link        = get_field("詳細ページURL");
    $link_target = ' target="_blank" ';
  }

  //アイキャッチのID
  $thumbnail_id = get_post_thumbnail_id();
  $img = wp_get_attachment_image_src($thumbnail_id,'large');
  $img = (isset($img[0]))? $img[0] : $theme_uri ."/assets/images/common/no-image.png";

  //応募締切 終了=true
  $end = is_event_closed($post->ID);

  //カテゴリー
  $cat = get_the_terms($post->ID, "product-cat");


  // 開催日と終了日を取得
  $start_date = get_field('開催日');
  $end_date   = get_field('終了日');

  // 今日の日付（Y-m-d形式）
  $today = current_time('Y-m-d');

  // 開催日をDateTime型に変換
  $start = new DateTime($start_date);
  $end   = new DateTime($end_date);
  $now   = new DateTime($today);


?>
          <li class="p-front-mv__swiper-slide swiper-slide <?php echo $end ? '__disabled' : ''; ?>">
            <a href="<?php echo $link; ?>" <?php echo $link_target; ?> class="p-front-mv__swiper-slide-link">
              <div class="p-front-mv__swiper-slide-body">
                <p class="p-front-mv__swiper-slide-title">
                  <span class="p-front-mv__swiper-slide-date-info">

<?php

  $youbi        = "";
  $v_date       = $start_date;
  $v_date_array = explode('-', $v_date);

  $v_date_mm    = $v_date_array[1];
  $v_date_dd    = $v_date_array[2];

  if ($now < $start) {
      // 開催日前 → 開催日と曜日を表示
      $weekday = get_weekday_jp($start);
      $youbi = $weekday ."曜日";

  } elseif ($now >= $start && $now <= $end) {
      // 開催期間中 → 本日開催
      $youbi = "本日開催";      

      $v_date       = current_time('Y-m-d');
      $v_date_mm    = current_time('m');
      $v_date_dd    = current_time('d');           
  }
?>

                    <time class="p-front-mv__swiper-slide-date-wrap" datetime="<?php echo $v_date; ?>">
                      <span class="month <?php echo ($v_date_mm >= 10) ? 'double' : ''; ?>"><?php echo $v_date_mm; ?></span>
                      <span class="date <?php echo ($v_date_dd >= 10) ? 'double' : ''; ?>"><?php echo $v_date_dd; ?></span>
                    </time>
                    <span class="p-front-mv__swiper-slide-date-txt"><?php echo $youbi; ?></span>
                  </span><!-- /.p-front-mv__swiper-slide-date-info -->
                  <span class="p-front-mv__swiper-slide-txt"><?php the_title(); ?></span>
                </p>
              </div>
              <figure class="p-front-mv__swiper-slide-img">
              <img src="<?php echo $img; ?>" alt="">

<?php
  if(is_array($cat)){
    foreach ($cat as $key => $value) {
echo '      <span class="p-front-mv__swiper-slide__cat '.$value->slug .'">'.$value->name .'</span>';
    }
  }
?>              

            </figure>
            </a>
          </li>

<?php
 endwhile; 
 }
            wp_reset_postdata();
          ?>
        </ul><!-- /.p-front-mv__swiper-wrapper -->
      </div><!-- /.p-front-mv__swiper -->
      <div class="swiper-pagination p-pagination-progress-circle"></div>
    </div>
  </section>

  <section class="p-front-feature">
    <div class="l-inner">
      <h2 class="p-front-ttl" data-aos="fade">
        <span class="p-front-ttl__en">Feature</span>
        <span class="p-front-ttl__ja">宿屋大学の特徴</span>
      </h2>
      <ul class="p-front-feature__card-list">

      <?php
        $front_feature_index = 0;

        if(have_rows('front_features')):while(have_rows('front_features')):
          the_row();

          $front_feature_icon = get_sub_field('front_feature_icon');
          $front_feature_ttl = get_sub_field('front_feature_ttl');
          $front_feature_ttl = preg_replace('/\{(.+?)\}/', '<span class="text-highlight">$1</span>', $front_feature_ttl);
          $front_feature_txt = get_sub_field('front_feature_txt');
      ?>
        <li class="p-front-feature__card" data-aos="fade-up" data-aos-delay="<?php echo $front_feature_index * 300; ?>">
          <?php if($front_feature_icon): ?>
          <figure class="p-front-feature__card-img">
            <img src="<?php echo $front_feature_icon['url']; ?>" alt="<?php echo $front_feature_icon['alt']; ?>" width="<?php echo $front_feature_icon['width']; ?>" height="<?php echo $front_feature_icon['height']; ?>">
          </figure>
          <?php endif; ?>
          <h3 class="p-front-feature__card-ttl"><?php echo $front_feature_ttl; ?></h3>
          <p class="p-front-feature__card-txt"><?php echo $front_feature_txt; ?></p>
        </li>
      <?php
        $front_feature_index++;
        endwhile; endif;
      ?>
      </ul>
      <div class="c-btn __pc-right" data-aos="fade" data-aos-delay="1300">
        <a href="" class="c-btn__link">宿屋塾のビジョン</a>
      </div>
    </div><!-- ./-inner -->
  </section>

  <section class="p-front-service bg-light">
    <div class="l-inner">
      <h2 class="p-front-ttl" data-aos="fade">
        <span class="p-front-ttl__en">service</span>
        <span class="p-front-ttl__ja">宿屋塾のサービス</span>
      </h2>
      <p class="p-front-service__intro-txt" data-aos="fade">宿屋塾では、宿泊産業のビジネス力を高めるためのサービスを提供しています。</p>
      <ul class="p-front-service__list">
      <?php
        $front_services = get_field('front_service');
        $front_service_index = 0;

        foreach($front_services as $service_post):
          $service_en_ttl = get_field('service_en_ttl', $service_post->ID);
      ?>
        <li class="c-card" data-aos="fade-up" data-aos-delay="<?php echo $front_service_index * 300; ?>">
          <a href="<?php echo get_permalink($service_post->ID); ?>" class="c-card__link">
            <div class="c-card__txt-wrap">
              <h3 class="c-card__ttl">
                <span class="c-card__ttl-en"><?php echo $service_en_ttl; ?></span>
                <span class="c-card__ttl-jp"><?php echo esc_html(get_the_title($service_post->ID)); ?></span>
              </h3>
            </div>
            <?php if(has_post_thumbnail($service_post->ID)): ?>
            <figure class="c-card__img">
                <?php echo get_the_post_thumbnail($service_post->ID, 'full'); ?>
            </figure>
            <?php endif; ?>
          </a>
        </li>
      <?php
        $front_service_index++;
        endforeach;
      ?>
      </ul>
      <div class="c-btn __pc-right" data-aos="fade">
        <a href="<?php echo home_url('/service/'); ?>" class="c-btn__link">サービス一覧をみる</a>
      </div>
    </div>
  </section>

  <section class="p-front-industry-news">
      <div class="p-front-industry-news__inner">
        <div class="p-front-industry-news__ttl-wrap bg-light">
          <h2 class="p-front-industry-news__ttl" data-aos="fade">
            <span class="p-front-industry-news__ttl-en">News</span>
            <span class="p-front-industry-news__ttl-ja">宿泊業界最新ニュース</span>
          </h2>
        </div>
        <div id="js-front-industry-news-swiper" class="p-front-industry-news__swiper c-overflow-swiper swiper" data-aos="fade">
          <ul class="p-front-industry-news__list swiper-wrapper">
          <?php
            $industry_news_args = [
              'post_type' => 'industry-news',
              'posts_per_page' => 10,
              'post_status' => 'publish',
              'orderby' => 'date',
              'order' => 'DESC',
            ];

            $industry_news_query = new WP_Query($industry_news_args);
            while($industry_news_query->have_posts()): 
              $industry_news_query->the_post();
          ?>
            <li class="p-front-industry-news__item swiper-slide">
              <a href="<?php the_permalink(); ?>" class="p-front-industry-news__item-link">
                <time class="p-front-industry-news__item-date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php the_time('Y.m.d'); ?></time>
                <h3 class="p-front-industry-news__item-ttl"><?php the_title(); ?></h3>
              </a>
            </li>
          <?php
            endwhile;
            wp_reset_postdata();
          ?>
          </ul>
          <div class="c-btn">
            <a href="<?php echo home_url('/industry-news/'); ?>" class="c-btn__link">一覧へ</a>
          </div>
        </div>
      </div>
  </section>

  <section class="p-front-knowledge">
    <div class="l-inner">
      <h2 class="p-front-ttl" data-aos="fade">
        <span class="p-front-ttl__en">Knowledge</span>
        <span class="p-front-ttl__ja">ホテルマネジメントの教科書</span>
      </h2>
      <div id="js-front-knowledge-swiper" class="c-overflow-swiper __pc-overflow-left-none swiper" data-aos="fade">
        <ul class="p-front-knowledge__swiper-wrapper swiper-wrapper">
          <?php
            $blog_args = [
              'post_type' => 'knowledge',
              'posts_per_page' => 10,
              'post_status' => 'publish',
              'orderby' => 'date',
              'order' => 'DESC',
            ];

            $blog_query = new WP_Query($blog_args);
          ?>
          <?php
            while($blog_query->have_posts()):
              $blog_query->the_post();
              $blog_cats = get_the_terms(get_the_ID(), 'knowledge-cat');
              $blog_cat_name = '';

              if($blog_cats):
                foreach($blog_cats as $blog_cat):
                  if($blog_cat->slug !== 'uncategorized'):
                    $blog_cat_name = $blog_cat->name;
                    break;
                  endif;
                endforeach;
              endif;
          ?>
          <li class="c-thumbnail-card swiper-slide">
            <a href="<?php the_permalink(); ?>" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <?php if($blog_cat_name): ?>
                <div class="c-thumbnail-card__cat">
                  <span class="u-term"><?php echo $blog_cat_name; ?></span>
                </div>
                <?php endif; ?>
                <h3 class="c-thumbnail-card__ttl"><?php the_title(); ?></h3>
                <div class="c-thumbnail-card__date"><time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php the_time('Y.m.d'); ?></time></div>             
              </div>
              <?php if(has_post_thumbnail()): ?>
              <figure class="c-thumbnail-card__img">
                <?php the_post_thumbnail('full'); ?>
              </figure>
              <?php endif; ?>
            </a>
          </li>
          <?php
            endwhile;
            wp_reset_postdata();
          ?>
        </ul>
      </div><!-- /.swiper -->
      <div class="c-swiper-controls">
        <div class="swiper-button-prev c-arrow-btn prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next c-arrow-btn next"></div>
      </div>  
    </div><!-- /.l-inner -->
  </section>

  <section class="p-front-voices bg-dark">
    <div class="l-inner">
      <h2 class="p-front-ttl" data-aos="fade">
        <span class="p-front-ttl__en">Voices</span>
        <span class="p-front-ttl__ja">お客様からの声</span>
      </h2>
      <div id="js-voice-card-swiper" class="c-voice-card-swiper swiper" data-aos="fade">
        <ul class="c-voice-card-swiper__wrapper swiper-wrapper">
          <?php
            $front_voices = get_field('front_voice');
            
            foreach($front_voices as $voice_post):
          ?>
          <li class="c-voice-card swiper-slide">
              <h3 class="c-voice-card__ttl"><?php echo get_field('voice_age', $voice_post->ID); ?></h3>
              <div class="c-voice-card__txt-wrap"><?php echo get_field('voice_detail', $voice_post->ID); ?></div>
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

  <section class="p-front-news">
    <div class="l-inner">
      <h2 class="p-front-ttl" data-aos="fade">
        <span class="p-front-ttl__en">information</span>
        <span class="p-front-ttl__ja">お知らせ</span>
      </h2>
      <ul class="p-front-news__list" data-aos="fade">
        <?php
          $news_args = [
            'post_type' => 'news',
            'posts_per_page' => 5,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
          ];

          $news_query = new WP_Query($news_args);

          while($news_query->have_posts()):
            $news_query->the_post();
        ?>
        <li class="p-front-news__item">
          <a href="" class="p-front-news__item-link">
            <time class="p-front-news__item-date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php the_time('Y.m.d'); ?></time>
            <h3 class="p-front-news__item-ttl"><?php the_title(); ?></h3>
          </a>
        </li>
        <?php
          endwhile;
          wp_reset_postdata();
        ?>
      </ul>
      <div class="c-btn __pc-right">
        <a href="" class="c-btn__link">お知らせ一覧へ</a>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
