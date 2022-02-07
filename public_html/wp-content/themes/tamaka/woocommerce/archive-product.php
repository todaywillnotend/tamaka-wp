<?php get_header();?>
<?php
$category = get_queried_object();
$cat = $category->term_id;
$catname = $category->name;
?>
<style>.h1,.h2 {display:none}
#ord {
    margin-bottom: 30px;
    padding: 5px;
    border-radius: 10px;
}
[aria-current="page"] {
	border-radius: 30px;
    background: silver;
    padding: 10px 20px;
    color: white!important;
    font-weight: bold;
}
</style>
<?php
if (!isset($_GET['order'])) {
        $metakey = '_regular_price';
        $metaval = 'meta_value_num';
        $asc = 'asc';
        $feat = 'outofstock';
        $oper = 'NOT IN';
        $priceasc = 'selected="selected"';
        $pricedesc='';
        $newprod='';
        $featured='';
} else {
    if ($_GET['order'] =='pricedesc') {
        $metakey = '_regular_price';
        $metaval = 'meta_value_num';
        $asc = 'desc';
        $feat = 'outofstock';
        $oper = 'NOT IN';
        $pricedesc = 'selected="selected"';
        $priceasc='';
        $newprod='';
        $featured='';
    } elseif ($_GET['order'] == 'priceasc') {
        $metakey = '_regular_price';
        $metaval = 'meta_value_num';
        $asc = 'asc';
        $feat = 'outofstock';
        $oper = 'NOT IN';
        $priceasc = 'selected="selected"';
        $pricedesc='';
        $newprod='';
        $featured='';
    } elseif ($_GET['order'] == 'newprod') {
        $metaval = 'date';
        $asc = 'asc';
        $metakey = '';
        $feat = 'outofstock';
        $oper = 'NOT IN';
        $newprod = 'selected="selected"';
        $pricedesc='';
        $priceasc='';
        $featured='';
    } elseif ($_GET['order'] == 'featured') {
    	$feat = 'featured';
        $metaval = 'date';
        $asc = 'asc';
        $metakey = '';
        $oper = 'IN';
        $featured = 'selected="selected"';
        $pricedesc='';
        $priceasc='';
        $newprod='';
    }
}
?>
<main class="main catalog">
<section class="popular">
  <div class="container">
    <h1>КАТАЛОГ "<?=$catname;?>"</h1>
      <div style="text-align:center">
      <select id="ord" name="order">
      	<option value="priceasc" <?=$priceasc;?>>Цена: по возрастанию</option>
      	<option value="pricedesc" <?=$pricedesc;?>>Цена: по убыванию</option>
      	<option value="newprod" <?=$newprod;?>>Новые товары</option>
        <option value="featured" <?=$featured;?>>Наши рекомендации</option>
      </select>
      </div>
    <div class="popular__content">
<?php
	global $wp_query;
    $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$posts_Query = new WP_Query(array(
    'post_type' => 'product',
    'tax_query' => array( 
    	'relation' => 'AND',
            array(
                'taxonomy'         => 'product_cat',
                'field'            => 'slug', // Or 'term_id' or 'name'
                'terms'            => get_query_var( 'product_cat' ), // A slug term
                // 'include_children' => false // or true (optional)
            ),
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => $feat,
                'operator' => $oper, // or 'NOT IN' to exclude feature products
        	)
    ),
    'posts_per_page' => 4,             // кол-во записей на странице 
    'paged'          => $currentPage,  // текущая страница
 	'orderby'   => $metaval,
    'meta_key'  => $metakey,
    'order' => $asc
));

    $pagination = paginate_links([
    'base'    => str_replace(999999999, '%#%', get_pagenum_link(999999999)),
    'format'  => '',
    'current' => max(1, $currentPage),
    'total'   => $posts_Query->max_num_pages,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
    ]);

if ($posts_Query->have_posts()) {
    while ($posts_Query->have_posts()) {
        $posts_Query->the_post();
        ?>
          
      <div class="popular__card" style="width:290px" onclick="location.href='<? the_permalink();?>'">
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
</section>
<section class="pagination">
	<div class="container">
		<div class="pagination__content">
			<?=$pagination;?>
		</div>
	</div>
</section>
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
<script>
(function($){
$('#ord').wrapAll('<form action="" id="order" method="GET"></form>');
$('#ord').change(function(){$('#order').submit();});
})(jQuery);
</script>
		</main>
<? get_footer();