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
    } elseif( is_singular('service') || is_post_type_archive('service') ){
        wp_enqueue_style('service-css', get_template_directory_uri().'/assets/css/service.css', array('google-fonts', 'swiper-css', 'common-css'), filemtime( $theme_path . '/assets/css/service.css'));
    } elseif( is_singular('product') || is_post_type_archive('product') ){
      wp_enqueue_style('product-css', get_template_directory_uri().'/assets/css/product.css', array('google-fonts', 'swiper-css', 'common-css'), filemtime( $theme_path . '/assets/css/product.css'));
    } elseif( is_single() || is_home() ){
      wp_enqueue_style('blog-css', get_template_directory_uri().'/assets/css/blog.css', array('google-fonts', 'swiper-css', 'common-css'), filemtime( $theme_path . '/assets/css/product.css'));
    }

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '0.0.0');
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

  function change_post_menu_label() {
    global $menu, $submenu;
    $name = 'ホテルマネジメントの教科書';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name . '一覧';
    $submenu['edit.php'][10][0] = '新しい' . $name;
  }

  function change_post_object_label() {
    global $wp_post_types;
    $name = 'ホテルマネジメントの教科書';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = '追加';
    $labels->add_new_item = $name . 'の新規追加';
    $labels->edit_item = $name . 'の編集';
    $labels->new_item = '新規' . $name;
    $labels->view_item = $name . 'を表示';
    $labels->search_items = $name . 'を検索';
    $labels->not_found = $name . 'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
  }

  add_action('init', 'change_post_object_label');
  add_action('admin_menu', 'change_post_menu_label');

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
