<?php
  $theme_uri = get_template_directory_uri();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
<?php wp_head(); ?>
</head>

<body>
<header class="l-header">
  <div class="l-header__inner">
    <<?php echo is_front_page() ? 'h1' : 'div'; ?> class="l-header__logo">
      <a href="<?php echo home_url('/'); ?>">
        <img src="<?php echo $theme_uri; ?>/assets/images/common/logo.png" alt="宿屋塾">
      </a>
    <<?php echo is_front_page() ? '/h1' : '/div'; ?>>
    <div id="js-header-menu" class="l-header__sp-menu-bg">
      <div class="l-header__sp-menu-inner">
        <?php
          wp_nav_menu( array( 
            'theme_location' => 'header-menu',
            'container' => 'nav', 
            'container_class' => 'l-header__nav', 
            'menu_class' => 'l-header__nav-list', 

          ) ); 
        ?>
        <div class="l-header__sp-nav-btn c-btn">
          <a href="<?php echo home_url('/'); ?>" class="c-btn__link">
            お問い合わせ
          </a>
        </div>
      </div><!-- .l-header__sp-menu-inner -->
    </div><!-- /.l-header__sp-menu -->
    <a href="#" class="l-header__contact-btn c-btn">お問い合わせ</a>
    <button id="js-header-burger" class="l-header__burger">
      <span class="l-header__burger-bar-wrap">
        <span class="l-header__burger-line"></span>
        <span class="l-header__burger-line"></span>
        <span class="l-header__burger-line"></span>
      </span>
      <span id="js-header-burger-text" class="l-header__burger-text">メニュー</span>
    </button>
  </div>
</header>
