<? get_header();?>

<main class="main catalog">
<section class="popular">
  <div class="container">
    <div class="popular__content">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
      <div class="popular__card" style="    max-width: 20%!important;" onclick="location.href='<? the_permalink();?>'">
        <a href="<? the_permalink();?>"><img src="<? the_post_thumbnail_url();?>" alt="popular-card" /></a>
        <span class="popular__card__title"><?php the_title();?></span>
        <span class="popular__card__price"><?php echo get_post_meta( get_the_ID(), '_regular_price', true);?> рублей</span>
      </div>
 
<?php endwhile; ?>
</div>
<center>
<?php
if ( get_next_posts_link() ) {
next_posts_link();
}
?>
<?php
if ( get_previous_posts_link() ) {
previous_posts_link();
}
?>
</center>
<section class="info">
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

<?php else: ?>
<?php if (!isset($_GET['s'])) {include('archive.php');exit;}?>
<p>Не найдено похожих товаров :(</p>

<?php endif; ?>
<? get_footer();?>