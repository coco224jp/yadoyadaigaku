<?php
  $theme_uri = get_template_directory_uri();
  $queried_object = get_queried_object();
  $section_class = '';

  if (is_singular('')) {
    $section_class = 'singular';
  } elseif (is_post_type_archive('') || is_home()) {
    $section_class = 'archive';
  }
?>

<section class="c-subpage-mv <?php echo $section_class; ?>">
  <<?php echo (is_post_type_archive('') || is_singular('service')) ? 'h1' : 'div' ?> 
    class="c-subpage-mv__ttl">
    <?php if(isset($args['ttl_en'])): ?>
      <span class="c-subpage-mv__ttl-en"><?php echo $args['ttl_en']; ?></span>
    <?php endif; ?>
    
    <?php if(isset($args['ttl_jp'])): ?>
      <span class="c-subpage-mv__ttl-ja"><?php echo $args['ttl_jp']; ?></span>
    <?php endif; ?>
  <<?php echo (is_post_type_archive('') || is_singular('service')) ? '/h1' : '/div' ?>>
</section>
