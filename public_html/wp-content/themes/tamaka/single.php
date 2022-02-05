<?php get_header();?>
<?php if (in_category(3)) {?>

    <section class="photo-gallery">
      <div class="container">
        <div class="bg-flow-2-2"></div>
        <h1 class="title title_beige"><?php the_title();?></h1>

        <div class="photo-gallery__container">
		<?php
		$images = get_field('gallery');
		if( $images ) { ?>
				<?php foreach( $images as $image ): ?>
				  <a href="<?php echo esc_url($image['url']); ?>" class="photo-item">
					<img src="<?php echo esc_url($image['url']); ?>" class="photo-item__img" alt="alt" />
				  </a>
				<?php endforeach; ?>
		<?}?>
		</div>
      </div>
    </section>

<?} else {?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="open-news">
      <div class="bg-flow-2-2"></div>
      <h1 class="title title_beige"><?php the_title(); ?></h1>

      <div class="container">
        <div class="open-news__date"><i></i> <?php the_date('d.m.Y');?></div>
      </div>
<?php 
$images = get_field('gallery');
if( $images ) { ?>
<div class="news-slider">
    <div class="swiper-wrapper">
        <?php foreach( $images as $image ): ?>
            <div class="swiper-slide">
                     <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <p><?php echo esc_html($image['caption']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
        <div class="swiper-button-prev news-prev"></div>
        <div class="swiper-button-next news-next"></div>
<?} else {?>
</div>
<iframe class="video" src="<?php the_field('vlink');?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
<?php } ?>
      </div>

      <div class="open-news__content container">
        <? the_content();?>

<?php wp_link_pages(); ?>
<?php edit_post_link(); ?>
 
<?php endwhile; ?>
		</div>
	</section>
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
 
<?php else: ?>
<p>No posts found. :(</p>
 
<?php endif; ?>
<?}?>
<? get_footer();?>