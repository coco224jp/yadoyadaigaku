<?php
  $theme_uri = get_template_directory_uri();
  $post_id = get_the_ID();

  get_header();

  $args = ['ttl_jp' => 'ホテルマネジメントの<br class="only-sp">教科書', 'ttl_en' => 'Knowledge'];
  get_template_part('template-parts/subpage-mv', null, $args); 
?>
<main>
  <section class="p-blog-single">
    <div class="l-inner __small">
      <?php while(have_posts()): the_post(); ?>
        <h1 class="p-blog-single__ttl"><?php the_title(); ?></h1>
        <div class="p-blog-single__date">
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php the_time('Y.m.d(D)'); ?></time>
        </div>
        <div class="p-blog-single__tags">
          <?php
            $tags = get_the_terms($post->ID, 'knowledge-tag');

            if($tags):
              foreach($tags as $tag):
                echo '<span class="u-term">' . esc_html( $tag->name ) . '</span>';
              endforeach;
            endif;
          ?>
        </div>
        <?php if(has_post_thumbnail()) : ?>
        <figure class="p-blog-single__img">
          <?php the_post_thumbnail('full'); ?>
        </figure>
        <?php endif; ?>
        <div class="l-wp-block-content">
          <?php the_content(); ?>
        </div>
        <div class="p-blog-single__tags">
          <?php
            if($tags):
              foreach($tags as $tag):
                echo '<span class="u-term">' . $tag->name . '</span>';
              endforeach;
            endif;
          ?>
        </div>
        <?php
          $prev_post = get_previous_post();
          $next_post = get_next_post();
          $is_navi_exist = (isset($prev_post) && $prev_post != '') || (isset($next_post) && $next_post != '');

          if($is_navi_exist):
        ?>
        <nav class="p-blog-single__navi-wrap">
        <?php
            if (isset($prev_post) && $prev_post != ''):
        ?>
          <div class="p-blog-single__navi prev">
            <a class="p-blog-single__navi-link" href="<?php echo get_permalink($prev_post->ID); ?>">
              <span class="p-blog-single__navi-txt">前の記事</span>
              <span class="p-blog-single__navi-ttl"><?php echo esc_html( get_the_title($prev_post->ID) ); ?></span>
            </a>
          </div>
          <?php 
            endif;
            if (isset($next_post) && $next_post != ''):
          ?>
          <div class="p-blog-single__navi next">
            <a class="p-blog-single__navi-link " href="<?php echo get_permalink($next_post->ID); ?>">
              <span class="p-blog-single__navi-txt">次の記事</span>
              <span class="p-blog-single__navi-ttl"><?php echo esc_html( get_the_title($next_post->ID) ); ?></span>
            </a>
          </div>
          <?php 
            endif;
          ?>
        </nav>
        <?php 
            endif;
          endwhile;
        ?>
    </div><!-- /.l-inner -->
  </section>

  <section class="p-blog-single-other">
    <div class="l-inner __small">
      <h2 class="c-subpage-ttl">その他の記事</h2>
      <div id="js-product-swiper" class="u-product-swiper swiper">
        <ul class="swiper-wrapper">
          <?php
            $posts_args = [
              'post_type' => 'knowledge',
              'posts_per_page' => 5,
              'post_status' => 'publish',
              'orderby' => 'date',
              'order' => 'DESC',
            ];

            $posts_query = new WP_Query($posts_args);

            while($posts_query->have_posts()):
              $posts_query->the_post();

              $post_cats = get_the_terms(get_the_ID(), 'knowledge-cat');
              $post_cat_name = '';

              if($post_cats):
                foreach($post_cats as $post_cat):
                  $post_cat_name = $post_cat->name;
                  break;
                endforeach;
              endif;
          ?>
          <li class="c-thumbnail-card swiper-slide">
            <a href="<?php the_permalink(); ?>" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <div class="c-thumbnail-card__cat">
                  <span class="u-term"><?php echo $post_cat_name; ?></span>
                </div>
                <h3 class="c-thumbnail-card__ttl"><?php the_title(); ?></h3>
                <div class="c-thumbnail-card__date">
                  <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php the_time('Y.m.d(D)'); ?></time>
                </div>
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
      </div>
      <div id="js-product-swiper-controls" class="c-swiper-controls">
        <div class="swiper-button-prev c-arrow-btn prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next c-arrow-btn next"></div>
      </div> 
    </div>
  </section>
</main>
<?php
  get_footer();
?>