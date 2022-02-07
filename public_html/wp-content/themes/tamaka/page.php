<?php get_header();?>
<?php if (is_shop()) {include('catalog.php');exit;}?>
<!--? if( is_product_category() ) {
include('archive.php');exit;
}?-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content();?>
<?php edit_post_link(); ?>
<?php endwhile; ?>
<?php endif; ?>
		</div>
	</section>

<?php get_footer();?>