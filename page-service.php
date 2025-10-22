<?php
  $theme_uri = get_template_directory_uri();

  get_header();
  $args = [
    'ttl_jp' => '宿屋塾のサービス',
    'ttl_en' => 'Service'
  ];
?>

<main class="archive-service">
  <?php get_template_part('template-parts/subpage-mv', null, $args); ?>

  <section class="p-service-introSec">
    <div class="l-inner">
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
            the_content();
          endwhile;
        endif;
      ?>
    </div>
  </section>

  <section class="p-service-cards bg-light">
    <div class="l-inner">
      <ul class="p-service-cards__card-list">
        <?php
          $service_args = [
            'post_type' => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
          ];

          $service_query = new WP_Query($service_args);

          while($service_query->have_posts()): $service_query->the_post();
            $service_en_ttl = get_field('service_en_ttl');
            $service_desc = get_field('service_desc');
        ?>
        <li class="c-card">
          <a href="<?php the_permalink(); ?>" class="c-card__link">
            <div class="c-card__txt-wrap">
              <h2 class="c-card__ttl">
                <span class="c-card__ttl-en"><?php echo $service_en_ttl; ?></span>
                <span class="c-card__ttl-jp"><?php the_title(); ?></span>
              </h2>
              <p class="c-card__txt"><?php echo $service_desc; ?></p>
            </div>
            <?php if(has_post_thumbnail()): ?>
            <figure class="c-card__img">
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
  </section>
</main>
<?php get_footer(); ?>