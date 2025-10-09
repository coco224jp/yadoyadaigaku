<?php
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
    wp_enqueue_style(
      'google-fonts',
      'https://fonts.googleapis.com/css2?family=BIZ+UDPGothic&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&display=swap',
      array(),
      null
    );
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '0.0.0');
    wp_enqueue_style('common-css', get_template_directory_uri().'/assets/css/common.css', array('google-fonts', 'swiper-css'), '0.0.0');

    if(is_front_page()){
      wp_enqueue_style('front-css', get_template_directory_uri().'/assets/css/front.css', array('google-fonts', 'swiper-css', 'common-css'), '0.0.0');
    } elseif( is_singular('service') || is_post_type_archive('service') ){
        wp_enqueue_style('service-css', get_template_directory_uri().'/assets/css/service.css', array('google-fonts', 'swiper-css', 'common-css'), '0.0.0');
    } elseif( is_singular('product') || is_post_type_archive('product') ){
      wp_enqueue_style('product-css', get_template_directory_uri().'/assets/css/product.css', array('google-fonts', 'swiper-css', 'common-css'), '0.0.0');
    }

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '0.0.0');
    wp_enqueue_script('jquery');
    wp_enqueue_script('script-js', get_template_directory_uri().'/assets/js/script.js', array('swiper-js', 'jquery'), '0.0.0');
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
        'footer-menu' => 'フッターメニュー',
      )
    );
  }

  add_action('after_setup_theme', 'theme_setup');