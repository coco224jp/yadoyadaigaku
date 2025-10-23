<?php
  $theme_uri = get_template_directory_uri();

  get_header();
  $args = [
    'ttl_jp' => 'ホテルマネジメントの<br class="only-sp">教科書一覧',
    'ttl_en' => 'Knowledge'
  ];
  get_template_part('template-parts/subpage-mv', null, $args);
?>

<main>
<section class="p-blog-archive">
  <div class="l-inner">
    <h2 class="c-subpage-ttl __small text-center">ホテルマネジメントの教科書とは</h2>
    <p class="p-blog-archive__intro-txt">各業界のスペシャリストをお招きして開催しているオープン講座です。2,000年に始まり、過去の500回以上開催している宿泊ビジネス・観光業に関する講演会。基本月一回、平日の18時～19時30分に開講しています。</p>
    <?php if(have_posts()): ?>
    <ul class="p-blog-archive__list">
      <?php while(have_posts()): the_post(); 
            $cats = get_the_terms(get_the_ID(), 'knowledge-cat');

            if($cats):
              foreach($cats as $cat):
                if($cat->slug !== 'uncategorized'):
                  $cat_name = $cat->name;
                  break;
                endif;
              endforeach;
            endif;
      ?>
      <li class="p-blog-archive__item c-thumbnail-card">
        <a href="<?php the_permalink(); ?>" class="c-thumbnail-card__inner">
          <div class="c-thumbnail-card__body">
            <?php if($cat_name): ?>
            <div class="c-thumbnail-card__cat">
              <span class="u-term"><?php echo esc_html( $cat_name ); ?></span>
            </div>
            <?php endif; ?>
            <h3 class="c-thumbnail-card__ttl"><?php the_title(); ?></h3>
            <div class="c-thumbnail-card__date"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php the_time('Y.m.d(D)'); ?></time></div>
            <p class="p-blog-archive__item-txt">
            <?php
              $content = strip_tags( get_the_content() ); // HTMLタグ除去
              $trimmed = mb_substr( $content, 0, 140 ); // 140文字に制限
              if ( mb_strlen( $content ) > 140 ) {
                $trimmed .= '...';
              }
              echo esc_html( $trimmed );
            ?>
            </p>
          </div>
          <figure class="c-thumbnail-card__img">
          <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
          <?php endif; ?>
          </figure>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
    <?php 
      endif;

      the_posts_pagination( array(
        'mid_size' => 4,
        'prev_text' => '',
        'next_text' => '',
      ) ); 
    ?>
  </div>
</section>
</main>
<?php get_footer(); ?>
