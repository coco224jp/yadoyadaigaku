<?php
  $theme_uri = get_template_directory_uri();
  $section_class = '';
  $is_single_service = false;
  $has_single_service_bg = false;
  $is_single_product = false;
  $has_single_product_bg = false;

  if(is_singular('service')) {
    $is_single_service = true;

    if( isset($args['service_bg_pc']) && isset($args['service_bg_sp']) ) {
      $has_single_service_bg = true;
    }
  } elseif(is_singular('product')) {
    $is_single_product = true;

    if( isset($args['single_product_bg_pc']) && isset($args['single_product_bg_sp']) ) {
      $has_single_product_bg = true;
    }
  } elseif (is_singular('knowledge')) {
    $section_class = '__has-bg';
  }
?>

<section class="c-subpage-mv <?php echo (!empty($section_class)) ? $section_class : ''; ?>">
  <?php if($is_single_service && $has_single_service_bg && !empty($args['service_bg_pc']) && !empty($args['service_bg_sp'])): ?>
    <figure class="c-subpage-mv__bg-img">
      <img class="only-pc" src="<?php echo esc_url($args['service_bg_pc']['url']); ?>" alt="" width="<?php echo $args['service_bg_pc']['width']; ?>" height="<?php echo $args['service_bg_pc']['height']; ?>">
      <img class="only-sp" src="<?php echo esc_url($args['service_bg_sp']['url']); ?>" alt="" width="<?php echo $args['service_bg_sp']['width']; ?>" height="<?php echo $args['service_bg_sp']['height']; ?>">
    </figure>
  <?php elseif($is_single_product && $has_single_product_bg && !empty($args['single_product_bg_pc']) && !empty($args['single_product_bg_sp'])): ?>
    <figure class="c-subpage-mv__bg-img">
      <img class="only-pc" src="<?php echo esc_url($args['single_product_bg_pc']['url']); ?>" alt="" width="<?php echo $args['single_product_bg_pc']['width']; ?>" height="<?php echo $args['single_product_bg_pc']['height']; ?>">
      <img class="only-sp" src="<?php echo esc_url($args['single_product_bg_sp']['url']); ?>" alt="" width="<?php echo $args['single_product_bg_sp']['width']; ?>" height="<?php echo $args['single_product_bg_sp']['height']; ?>">
    </figure>
  <?php endif; ?>

  <<?php echo (is_post_type_archive() || is_page('service') || is_singular('service')) ? 'h1' : 'div' ?> 
    class="c-subpage-mv__ttl">
    <?php if(isset($args['ttl_en'])): ?>
      <span class="c-subpage-mv__ttl-en"><?php echo $args['ttl_en']; ?></span>
    <?php endif; ?>
    
    <?php if(isset($args['ttl_jp'])): ?>
      <span class="c-subpage-mv__ttl-ja"><?php echo $args['ttl_jp']; ?></span>
    <?php endif; ?>
  <<?php echo (is_post_type_archive() || is_page('service') || is_singular('service')) ? '/h1' : '/div' ?>>
</section>
