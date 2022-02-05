<?php /*Template name: Главная */ get_header();?>
    <main class="main">
      <section class="collection">
  <div class="container">
  <?php $imf = get_field('imager','option');?>
    <div class="collection__content" style="background:url(<?php echo $imf;?>) no-repeat center/cover">
      <div class="collection__text">
        <span><?php echo get_field('txt','option');?></span>
      </div>
    </div>
  </div>
</section>
 <section class="new">
  <div class="container">
    <h1>НОВЫЕ ПОСТУПЛЕНИЯ</h1>
    <div class="new__content">
      <div class="base-slider">
        
        <?php
	global $wp_query;

$posts_Query = new WP_Query(array(
    'post_type'   =>  'product',
    'showposts'   =>  4,
    'orderby'     =>  'date',
    'order'       =>  'DESC',
));

if ($posts_Query->have_posts()) {
    while ($posts_Query->have_posts()) {
        $posts_Query->the_post();
        ?>

        <div class="base-slider__item">
          <div class="new__card">
            <div class="new__img">
               <a href="<? the_permalink();?>"><img src="<? the_post_thumbnail_url();?>" alt="new-card" /></a>
            </div>
            <span class="new__title"><?php the_title();?></span>
            <span class="new__price"><?php echo get_post_meta( get_the_ID(), '_regular_price', true);?> рублей</span>
          </div>
        </div>
        <?
    }

    wp_reset_postdata();
}

?>
      </div>
    </div>
  </div>
</section>
      <section class="popular">
  <div class="container">
    <h1>ПОПУЛЯРНЫЕ ПРЕДЛОЖЕНИЯ</h1>
    <div class="popular__content">

              <?php
$tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN', // or 'NOT IN' to exclude feature products
);

// The query
$posts_Query = new WP_Query( array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'posts_per_page'      => 4,
    'orderby'             => 'date',
    'order'               => $order == 'asc' ? 'asc' : 'desc',
    'tax_query'           => $tax_query // <===
) );


if ($posts_Query->have_posts()) {
    while ($posts_Query->have_posts()) {
        $posts_Query->the_post();
        ?>
      <div class="popular__card">
        <a href="<? the_permalink();?>"><img src="<? the_post_thumbnail_url();?>" alt="popular-card" /></a>
        <span class="popular__card__title"><?php the_title();?></span>
        <span class="popular__card__price"><?php echo get_post_meta( get_the_ID(), '_regular_price', true);?> рублей</span>
      </div>
        <?
    }

    wp_reset_postdata();
}

?>
    </div>
  </div>
</section> <section class="info">
  <div class="container">
    <div class="info__text">
      <span>Интернет магазин одежды</span>
      <p>
        <? the_field('desc','option');?>
      </p>
    </div>
  </div>
</section>

    </main>
<? get_footer();