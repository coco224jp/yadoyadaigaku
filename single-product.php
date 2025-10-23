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

  //応募締切 終了=true
  $end = is_event_closed($post->ID);

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
<?php
  $cat = get_the_terms($post->ID, "product-tag");
  $cat_slug_array = array();

  if(is_array($cat)){
?> 
              <div class="p-product-fv__cats">
<?php
    foreach ($cat as $key => $value) {
      echo '<span class="u-term">'.$value->name.'</span>';
      $cat_slug_array[] = $value->slug;
    }
?>        
              </div>
<?php } ?>


          <h1 class="p-product-fv__ttl"><?php echo get_the_title(); ?></h1>
          <p class="p-product-fv__subttl"><?php echo get_field("サブタイトル"); ?></p>
<?php if(have_rows('講師リスト')): ?>
<?php while(have_rows('講師リスト')): the_row(); ?>
          <div class="p-product-fv__instructor">

<?php $img = get_sub_field("画像"); ?>
<?php $img = (isset($img["sizes"]["thumbnail"]))? $img["sizes"]["thumbnail"] : ""; ?>
         
            <figure class="p-product-fv__instructor-img">
              <img src="<?php echo $img; ?>" alt="">
            </figure>

            <div class="p-product-fv__instructor-txt">
              <?php echo get_sub_field("役職名"); ?><br>
              <?php echo get_sub_field("名前"); ?>(<?php echo get_sub_field("ふりがな"); ?>)氏 
            </div>
          </div>
<?php break; ?>
<?php endwhile; ?>
<?php endif; ?>   

          <dl class="p-product-fv__date-place">
<?php if(get_field("日程")){ ?>
            <dt class="p-product-fv__date-place-ttl ">日程</dt>
            <dd class="p-product-fv__date-place-txt font-en"><?php echo get_field("日程"); ?></dd>
<?php } ?>
<?php if(get_field("会場")){ ?>
            <dt class="p-product-fv__date-place-ttl">会場</dt>
            <dd class="p-product-fv__date-place-txt"><?php echo get_field("会場"); ?></dd>
<?php } ?>
<?php if(get_field("締め切り")){ ?>
            <dt class="p-product-fv__date-place-ttl">締切</dt>
            <dd class="p-product-fv__date-place-txt"><?php echo get_field("締め切り"); ?></dd>
<?php } ?>
          </dl>
        </div>

<?php
  //アイキャッチのID
  $thumbnail_id = get_post_thumbnail_id();
  $img = wp_get_attachment_image_src($thumbnail_id,'large');
  $img = (isset($img[0]))? $img[0] : "";

?>           
        <figure class="p-product-fv__img <?php echo $end ? '__disabled' : ''; ?>">
          <img src="<?php echo $img; ?>" alt="">
        </figure>
        </div>
      </div>
    </div>
  </section>

  <section class="p-product-recommend bg-light pb-0">
    <div class="l-inner __small">
<?php if(have_rows('おすすめ内容')): ?>      
      <h2 class="p-product-recommend__ttl c-subpage-ttl __small">こんな方におすすめ</h2>
      <ul class="p-product-recommend__list">

<?php while(have_rows('おすすめ内容')): the_row(); /* <span class="text-highlight">ホテルオーナー、支配人など</span> */ ?>

        <li class="p-product-recommend__item">
          <h2 class="p-product-recommend__item-txt">
            <?php echo get_sub_field("内容"); ?>
          </h2>
        </li>

<?php endwhile; ?>
      </ul>
<?php endif; ?>     


      <?php if($end){ ?>
      <div class="p-product-recommend__btn c-btn __large __disabled">
        <a href="" class="c-btn__link">募集終了</a>
      </div>
      <?php }else{ ?>
      <div class="p-product-recommend__btn c-btn __bg-gold __large">
        <a href="<?php echo get_field("申し込みページURL"); ?>" class="c-btn__link">受講お申し込みはこちら</a>
      </div>
      <?php } ?>


    </div>
  </section>

  <?php 
    if(have_posts()): while ( have_posts() ) :
      the_post();
      $content = get_the_content();
      if ( trim( wp_strip_all_tags( $content ) ) !== '' ) :
  ?>
  <section class="p-product-freeArea">
    <div class="l-inner __small">
      <div class="l-wp-block-content">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
  <?php 
      endif;
    endwhile; endif; 
  ?>

<?php
  $mousikomi = '
  <section class="p-product-cta bg-light text-center">
    <div class="l-inner">
      <h2 class="p-product-cta__ttl c-subpage-ttl __small">'.get_field("お申し込み見出し").'</h2>
';

if(get_field("お申し込みメッセージ")){
  $mousikomi .= '
      <p class="p-product-cta__txt">'.get_field("お申し込みメッセージ").'</p>
';
}

if($end){
  $mousikomi .= '
      <div class="p-product-cta__btn c-btn __disabled">
        <a href="" class="c-btn__link">募集終了</a>
      </div>
';
}else{
  $mousikomi .= '
      <div class="p-product-cta__btn c-btn __bg-gold">
        <a href="'. get_field("申し込みページURL") .'" class="c-btn__link">受講お申し込みはこちら</a>
      </div>
';
}


  $mousikomi .= '
    </div>
  </section>
';
$dis_posi = get_field("表示位置"); 
?>

<?php
if (is_array($dis_posi) && in_array("参加者の声の上", $dis_posi)) {
  echo $mousikomi;
}
?>

<?php 
  $posts = get_field('参加者');
  if( $posts ):
?>

  <section class="p-product-voice bg-dark">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl __small text-center">参加者の声</h2>



      <ul class="p-product-voice__list">

  <?php foreach( $posts as $view ): ?>

<?php
   //アイキャッチのID
    $thumbnail_id = get_post_thumbnail_id($view->ID);
    $img = wp_get_attachment_image_src($thumbnail_id,'thumbnail');
    $img = (isset($img[0]))? $img[0] : "";
?>


        <li class="p-product-voice__item">
            <figure class="p-product-voice__item-img">
              <img src="<?php echo $img; ?>" alt="">
            </figure>
            <h3 class="p-product-voice__item-catch"><?php echo get_field("voice_subttl", $view->ID); ?></h3>
            <p class="p-product-voice__item-info">
              <span class="p-product-voice__item-company"><?php echo get_field("voice_company", $view->ID); ?></span><br>
              <span class="p-product-voice__item-role"><?php echo get_field("voice_role", $view->ID); ?></span>
            </p>
            <span class="p-product-voice__item-name"><?php echo get_the_title($view->ID); ?> 氏</span>
            <p class="p-product-voice__item-txt">
              <?php echo get_field("voice_detail", $view->ID); ?>
            </p>
        </li>

  <?php endforeach; ?>

      </ul>
    </div>
  </section>
<?php endif; ?>

<?php
if (is_array($dis_posi) && in_array("スケジュールの上", $dis_posi)) {
  echo $mousikomi;
}
?>

<?php if(get_field("スケジュール")){ ?>

  <section class="p-product-schedule">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl __small text-center">スケジュール</h2>
      <div class="p-product-schedule__table-wrap">


<?php
$table = get_field("スケジュール"); 
$table = str_replace('<table', '<table class="p-product-schedule__table"', $table);
echo $table;
?>      
      </div>

<?php if(get_field("講座内容の詳細URL")){ ?>      
      <div class="p-product-schedule__btn c-btn">
        <a href="<?php echo get_field("講座内容の詳細URL"); ?>" class="c-btn__link">講座内容の詳細</a>
      </div>
<?php } ?>

    </div>
  </section>
<?php } ?>

<?php
if (is_array($dis_posi) && in_array("開催概要の上", $dis_posi)) {
  echo $mousikomi;
}
?>

  <section class="p-product-overview bg-light">
    <div class="l-inner __small">
      <h2 class="p-product-overview__ttl c-subpage-ttl">開催概要</h2>
      <dl class="p-product-overview__dl">

<?php
$gaiyou = array(
   array("name" => "日程","class1" => "text-last-justify","class2" => "")
  ,array("name" => "会場","class1" => "text-last-justify","class2" => "")
  ,array("name" => "定員","class1" => "text-last-justify","class2" => "")
  ,array("name" => "受講料","class1" => "","class2" => "")
  ,array("name" => "締め切り","class1" => "","class2" => "deadline")
  ,array("name" => "対象者","class1" => "","class2" => "")
  ,array("name" => "特典","class1" => "text-last-justify","class2" => "")
  ,array("name" => "参加資格","class1" => "","class2" => "deadline")
  ,array("name" => "会費","class1" => "text-last-justify","class2" => "")
  ,array("name" => "備考","class1" => "text-last-justify","class2" => "")
);

foreach ($gaiyou as $key => $value) {
?>


<?php if(get_field($value["name"])){ ?>
        <div class="p-product-overview__item <?php echo $value["class2"]; ?>">
          <dt class="p-product-overview__dt <?php echo $value["class1"]; ?>"><?php echo $value["name"]; ?></dt>
          <dd class="p-product-overview__dd">
            <p class="p-product-overview__dd-txt"><?php echo get_field($value["name"]); ?></p>
            <?php if(get_field($value["name"]."の注釈")){ ?>
            <p class="p-product-overview__note">
              <?php echo get_field($value["name"]."の注釈"); ?>
            </p>
            <?php } ?>                    
          </dd>
        </div>
<?php } ?>        
<?php } ?>        

      </dl>
    </div>
  </section>


<?php
if (is_array($dis_posi) && in_array("講師プロフィールの上", $dis_posi)) {
  echo $mousikomi;
}
?>

  <section class="p-product-profile">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl">講師プロフィール</h2>



<?php reset_rows('講師リスト'); ?>
<?php if(have_rows('講師リスト')): ?>
      <ul class="p-product-profile__list">
<?php while(have_rows('講師リスト')): the_row(); ?>

<?php $img = get_sub_field("画像"); ?>
<?php $img = (isset($img["sizes"]["thumbnail"]))? $img["sizes"]["medium"] : ""; ?>

        <li class="p-product-profile__item">
          <figure class="p-product-profile__item-img">
            <img src="<?php echo $img; ?>" alt="">
          </figure>
          <p class="p-product-profile__item-txt">
            <span class="p-product-profile__role"><?php echo get_sub_field("役職名"); ?></span>
            <span class="p-product-profile__name"><?php echo get_sub_field("名前"); ?> 氏</span>
            <span class="p-product-profile__furigana">(<?php echo get_sub_field("ふりがな"); ?>)</span>
          </p>
          <div class="p-product-profile__btn c-btn __height-short">
            <a href="" class="c-btn__link">詳細をみる</a>
          </div>
<!--
<?php echo get_sub_field("詳細"); ?>
-->

        </li>
<?php endwhile; ?>

      </ul>
<?php endif; ?>

    </div>
  </section>


<?php
if (is_array($dis_posi) && in_array("その他講座・ビジネススクールの上", $dis_posi)) {
  echo $mousikomi;
}
?>


<?php
  
  $current_id = get_the_ID(); // 現在表示中の記事IDを取得

  $where = array(
      'post_status' => 'publish'
    , 'post_type' => 'product'
    , 'posts_per_page' => "10"
    , 'post__not_in'   => array($current_id), // ← 現在の記事を除外
  );

  if($cat_slug_array){
    $where['tax_query'] = array(array('operator' => 'IN','taxonomy' => 'product-tag','field' => "slug",'terms' => $cat_slug_array ));
  }

  $loop = new WP_Query($where);

?>
<?php if($loop->have_posts()){ ?>

  <section class="p-product-other">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl">その他講座・ビジネススクール</h2>
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
          <li class="c-thumbnail-card swiper-slide">
            <a href="<?php echo $link; ?>" <?php echo $link_target; ?> class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
<?php
  $cat = get_the_terms($post->ID, "product-tag");
  if(is_array($cat)){
?> 
              <div class="c-thumbnail-card__cat">
<?php
    foreach ($cat as $key => $value) {
      echo '<span class="u-term">'.$value->name.'</span>';
    }
?>        
              </div>
<?php } ?>
                <h3 class="c-thumbnail-card__ttl"><?php echo get_the_title(); ?></h3>
                <div class="c-thumbnail-card__date">
                  日時：<span><?php echo get_field("日程"); ?></span>
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
    </div>
  </section>
<?php } ?>


</main>
<?php get_footer(); ?>