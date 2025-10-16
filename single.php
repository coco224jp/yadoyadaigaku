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
            $tags = get_the_tags();
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
      <h2 class="c-subpage-ttl">その他講座・ビジネススクール</h2>
      <div id="js-product-swiper" class="u-product-swiper swiper">
        <ul class="swiper-wrapper">
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">講座</span>
                <h3 class="c-thumbnail-card__ttl">第3回 ホテル経営会</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card01.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">セミナー</span>
                <h3 class="c-thumbnail-card__ttl">次世代のハウスキーピングマネジャーに必要な３つの重要な能力の高め方～清掃会社と二人三脚で『客室を完璧に仕上げる』技術</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card-other02.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">スクール</span>
                <h3 class="c-thumbnail-card__ttl">「ゲストの期待を超える自立型組織を築くリーダーシップとマネジメント ～Operational Excellenceな現場を創る！」</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card03.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">講座</span>
                <h3 class="c-thumbnail-card__ttl">第3回 ホテル経営会</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card01.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">セミナー</span>
                <h3 class="c-thumbnail-card__ttl">次世代のハウスキーピングマネジャーに必要な３つの重要な能力の高め方～清掃会社と二人三脚で『客室を完璧に仕上げる』技術</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card-other02.jpg" alt="">
              </figure>
            </a>
          </li>
          <li class="c-thumbnail-card swiper-slide">
            <a href="" class="c-thumbnail-card__inner">
              <div class="c-thumbnail-card__body">
                <span class="c-thumbnail-card__cat">スクール</span>
                <h3 class="c-thumbnail-card__ttl">「ゲストの期待を超える自立型組織を築くリーダーシップとマネジメント ～Operational Excellenceな現場を創る！」</h3>
                <div class="c-thumbnail-card__date">
                  日時：<time datetime="2025-05-01">2025.5</time>-<time datetime="2026-03-31">2026.03</time>
                  締切：<time datetime="2025-05-01">2025.05.01(木)</time>
                </div>
              </div>
              <figure class="c-thumbnail-card__img">
                <img src="<?php echo $theme_uri; ?>/assets/images/product/product-card03.jpg" alt="">
              </figure>
            </a>
          </li>

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