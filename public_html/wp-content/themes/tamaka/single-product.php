<?php get_header();?>
		<main class="main">
			<nav class="nav">
	<div class="container">
		<div class="nav__content">
			<?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
		</div>
	</div>
</nav>
			<section class="item">
	<div class="container">
		<div class="item__content">
			<div class="item__image">
				<!--img src="<?php echo get_the_post_thumbnail_url();?>" alt=""-->
                <?php echo do_shortcode('[woothumbs-gallery]');?>
			</div>
			<div class="item__main">
				<div class="item__title">
					<? the_title();?>
				</div>
				<div class="item__price">
					<?php echo get_post_meta( get_the_ID(), '_regular_price', true);?> рублей
				</div>
				<div class="item__buy">
					<button class="item__button" id="add">Добавить в корзину</button>
				</div>
				<div class="item__desctiption spoiler">
					<input type="checkbox" id="spoiler1">
					<label for="spoiler1">Описание</label>
					<div><? the_content();?></div>
				</div>
				<div class="item__delivery spoiler">
					<input type="checkbox" id="spoiler2">
					<label for="spoiler2">Доставка и возврат</label>
					<div>Бесплатная доставка по ....
						Условия доставки
						Если товар вам не подошел или не понравился, вы можете вернуть его в течении 10 дней с даты
						получения
						Условия возврата</div>
				</div>
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
    'post_type'      => 'product',  // тип записи 
    'posts_per_page' => 12,             // кол-во записей на странице 
));

if ($posts_Query->have_posts()) {
    while ($posts_Query->have_posts()) {
        $posts_Query->the_post();
        ?>
		  
		  <div class="base-slider__item">
          <div class="new__card" style="cursor:pointer;" onclick="location.href='<? the_permalink();?>'">
            <div class="new__img">
              <img src="<? the_post_thumbnail_url();?>" alt="new-card" />
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
			<section class="info">
  <div class="container">
    <div class="info__text">
      <span>Интернет магазин одежды</span>
      <p>
        <?php the_field('desc','option');?>
      </p>
    </div>
  </div>
</section>
<script>
(function($){
$('#add').click(function(){
	$.get('<? the_permalink();?>?add-to-cart=<? echo get_the_ID();?>',function(){
    location.href="http://<?=$_SERVER['HTTP_HOST'];?>/cart";
    });
});
})(jQuery);
</script>
		</main>
<?php get_footer();