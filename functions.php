<?php
  $theme_path = get_template_directory();

  function mytheme_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => true,
        );
    }
    return $urls;
  }

  add_filter('wp_resource_hints', 'mytheme_resource_hints', 10, 2);

  function add_files(){
    global $theme_path;

    wp_enqueue_style(
      'google-fonts',
      'https://fonts.googleapis.com/css2?family=BIZ+UDPGothic&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&display=swap',
      array(),
      null
    );
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '0.0.0');
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '0.0.0');
    wp_enqueue_style('common-css', get_template_directory_uri().'/assets/css/common.css', array('google-fonts', 'swiper-css', 'aos-css'), filemtime( $theme_path . '/assets/css/common.css'));

    if(is_front_page()){
      wp_enqueue_style('front-css', get_template_directory_uri().'/assets/css/front.css', array('google-fonts', 'swiper-css', 'common-css'), filemtime( $theme_path . '/assets/css/front.css'));
    } elseif( is_singular('service') || is_post_type_archive('service') || is_page('service') ){
        wp_enqueue_style('service-css', get_template_directory_uri().'/assets/css/service.css', array('google-fonts', 'swiper-css', 'common-css'), filemtime( $theme_path . '/assets/css/service.css'));
    } elseif( is_singular('product') || is_post_type_archive('product') ){
      wp_enqueue_style('product-css', get_template_directory_uri().'/assets/css/product.css', array('google-fonts', 'swiper-css', 'common-css'), filemtime( $theme_path . '/assets/css/product.css'));
    } elseif( is_singular('knowledge') || is_post_type_archive('knowledge') ){
      wp_enqueue_style('blog-css', get_template_directory_uri().'/assets/css/blog.css', array('google-fonts', 'swiper-css', 'common-css'), filemtime( $theme_path . '/assets/css/blog.css'));
    }

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '0.0.0');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '0.0.0');
    wp_enqueue_script('jquery');
    wp_enqueue_script('script-js', get_template_directory_uri().'/assets/js/script.js', array('swiper-js','aos-js', 'jquery'), filemtime( $theme_path . '/assets/js/script.js'));
  }

  add_action('wp_enqueue_scripts', 'add_files');

  function my_body_class($classes){
    if (is_page()) {
        $page = get_post();
        $classes[] = $page->post_name;
    }
    return $classes;
  }

  add_filter('body_class', 'my_body_class');

  function theme_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(
      array(
        'header-menu' => 'ヘッダーメニュー',
        'footer-menu' => 'フッターメニュー1',
        'footer-menu2' => 'フッターメニュー2',
        'footer-menu3' => 'フッターメニュー3',
      )
    );
  }

  add_action('after_setup_theme', 'theme_setup');

  // ホテルマネジメントの教科書一覧ページのページネーションのカスタマイズ
  add_filter( 'paginate_links_output', function( $output ) {
    // 前へボタンが無い場合に追加
    if ( strpos( $output, 'class="prev page-numbers' ) === false ) {
        $output = '<span class="prev page-numbers c-arrow-btn disabled"></span>' . $output;
    } else {
        $output = str_replace( 'class="prev page-numbers"', 'class="prev page-numbers c-arrow-btn"', $output );
    }

    // 次へボタンが無い場合に追加
    if ( strpos( $output, 'class="next page-numbers' ) === false ) {
        $output .= '<span class="next page-numbers c-arrow-btn disabled"></span>';
    } else {
        $output = str_replace( 'class="next page-numbers"', 'class="next page-numbers c-arrow-btn"', $output );
    }

    return $output;
  });

  /**
   * すべてのACF関係フィールドで
   * 左側リスト（未選択の投稿一覧）の並び順を「投稿日の新しい順」に並べ替える
   */
  add_filter('acf/fields/relationship/query', function($args, $field, $post_id) {
    $args['orderby'] = 'date'; // 投稿日順
    $args['order'] = 'DESC';   // 新しい順
    return $args;
  }, 10, 3);

  /**
   * ACF関係フィールドの選択済み投稿（右側）の並べ替え
   */
  add_filter('acf/load_value/type=relationship', 'acf_custom_sort_relationship_fields', 10, 3);
  function acf_custom_sort_relationship_fields($value, $post_id, $field) {
    if (empty($value) || !is_array($value)) {
      return $value;
    }

    // ★管理画面での表示順に表示するフィールド名
    $keep_order_fields = ['front_service', 'front_voice', '参加者'];

    // フィールド名が一致する場合は「管理画面での表示順序」を維持
    if (in_array($field['name'], $keep_order_fields, true)) {
        return $value;
    }

    // それ以外のフィールドは投稿日（新しい順）でソート
    $posts = array_map('get_post', $value);

    usort($posts, function($a, $b) {
        return strtotime($b->post_date) <=> strtotime($a->post_date);
    });

    return array_map(function($post) {
        return $post->ID;
    }, $posts);
  }

/**
 * イベントが締め切りかどうかを判定
 *
 * @param int|null $post_id 投稿ID（省略時は現在の投稿）
 * @return bool true = 締め切り、false = 受付中
 */
function is_event_closed($post_id = null) {
    // ACFのフィールド値取得
    $deadline = get_field('締切日', $post_id);
    $capacity = get_field('定員に達した', $post_id); // チェックボックス

    // 今日の日付（Y-m-d形式）
    $today = current_time('Y-m-d');

    // 1. 締切日が設定されていて、今日より前なら締め切り
    if ($deadline && $deadline < $today) {
        return true;
    }

    // 2. チェックボックスがあり、「締め切る」が含まれていれば締め切り
    if (is_array($capacity) && in_array('締め切る', $capacity)) {
        return true;
    }

    // どちらにも当てはまらない場合は受付中
    return false;
}


/* ========================================================
// acf クラシックエディタのカスタム
=========================================================*/

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
    $toolbars['テーブル' ] = array();
    $toolbars['テーブル' ][1] = array('table','link', 'unlink');

    return $toolbars;
}


