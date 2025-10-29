<?php 
date_default_timezone_set('Asia/Tokyo');

require $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';

ini_set("default_charset"             , "UTF-8");
ini_set("mbstring.internal_encoding"  , "UTF-8");
ini_set("mbstring.http_output"        , "UTF-8");
header('content-type: application/json; charset=utf-8');


$pg  = (isset($_POST["pg"]))?  $_POST["pg"] : "";
$suu = (isset($_POST["suu"]))? $_POST["suu"] : "";

// $pg  = (isset($_GET["pg"]))?  $_GET["pg"] : "";
// $suu = (isset($_GET["suu"]))? $_GET["suu"] : "";


$where = array(
      'post_status' => 'publish'
    , 'post_type' => 'product'
    , 'tax_query' => array(array('taxonomy' => 'product-cat','field' => "slug",'terms' => "open-course" ))
    , 'posts_per_page' => $suu
    , 'paged' => $pg
);


$loop = new WP_Query( $where );

  

if($loop->have_posts() && $pg && $suu){

  $list = "";

while ( $loop->have_posts() ) : $loop->the_post();

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



$list .='        <li class="p-product-card">';
$list .='          <div class="c-thumbnail-card ' . ($end ? '__closed' : '') . '">';
$list .='            <a href="'. $link .'" '. $link_target .' class="c-thumbnail-card__inner">';
$list .='              <div class="c-thumbnail-card__body">';

  $cat = get_the_terms($post->ID, "product-tag");
  if(is_array($cat)){

$list .='              <div>';

    foreach ($cat as $key => $value) {
$list .='      <span class="c-thumbnail-card__cat">'.$value->name .'</span>';
    }
        
$list .='              </div>';
}

$list .='                <h3 class="c-thumbnail-card__ttl">'. get_the_title() .'</h3>';
$list .='                <div class="c-thumbnail-card__date"><span>'. get_field("日程") .'</span></div>';
$list .='              </div>';
$list .='              <figure class="c-thumbnail-card__img">';
$list .='                <img src="'. $img .'" alt="">';
$list .='              </figure>';
$list .='            </a>';
$list .='          </div>';
$list .='          <a href="'. $link .'" '. $link_target .' class="p-product-card__info">';

if(have_rows('講師リスト')):
while(have_rows('講師リスト')): the_row();
$list .='            <span class="p-product-card__instructor">'. get_sub_field("役職名") .'  '. get_sub_field("名前") .'</span>';
break;
endwhile;
endif;

$list .='            <p class="p-product-card__subttl">'. get_field("サブタイトル") .'</p>';
$list .='          </a>';
$list .='          <div class="p-product-card__double-btn">';
$list .='            <div class="c-btn __height-short"><a href="'. $link .'" '. $link_target .' class="c-btn__link">詳細を見る</a></div>';

        if($end){ 
$list .='            <div class="c-btn __height-short __disabled"><a href="" class="c-btn__link">お申し込み</a></div>';
        }else{
$list .='            <div class="c-btn __height-short __bg-gold"><a href="'. get_field("申し込みページURL") .'" class="c-btn__link">お申し込み</a></div>';
        } 

$list .='          </div>';
$list .='        </li>';


endwhile;


	echo json_encode(array('status' => 'ok','count' => $loop->found_posts,'list' => $list ));	
}else{
	echo json_encode(array('status' => 'err','message' => 'not data'));	
}


?>