<?php if (isset($_GET['qty'])) {change_price_of_product($_GET['id'],$_GET['qty']);exit;}?>
<?php if(isset($_GET['gqty'])) {
	global $woocommerce;
    echo $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total;exit;
}?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cormorant+Garamond:wght@400;500&display=swap"
    rel="stylesheet">
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <link rel="stylesheet" href="<? echo get_template_directory_uri().'/css/style.css';?>" />
  <title><?php if (get_field('title')=='') { if (is_front_page()) {bloginfo( 'title' );} else {the_title();} ?> - <?php bloginfo( 'description' ); } else {the_field('title');}?></title>
<?php wp_head();?>
<script type="text/javascript" src="<? echo get_template_directory_uri().'/js/jquery.cookie.js';?>"></script>
<style>
.checked {
background-color: #333333;
    color: white;
}
.header__bottom li {list-style:none}
#fmenu,#mmenu {display:none}
</style>
</head>

<body>
	<div class="wrapper">
		<header class="header">
  <div class="container">
    <div class="header__content">
      <div class="header__top">
        <div class="category-buttons">
        <form id="check" action="<?=$_SERVER['REQUEST_URI'];?>" method="POST">
          <div class="category-buttons__button">
            <input id="male" class="category-buttons__radio" name="category" value="male" type="radio" />
            <label for="male">Мужская</label>
          </div>
          <div class="category-buttons__button">
            <input id="female" class="category-buttons__radio" name="category" value="female" type="radio" />
            <label for="female">Женская</label>
          </div>
          <div class="category-buttons__burger">
            <span></span>
          </div>
        </div>
        <div class="logo">
          <a href="/"><img src="https://tamaka.ru/wp-content/uploads/2022/02/2147483648_-211468-1024x255.jpg" alt="logo" /></a>
        </div>
        <div class="service">
          <div class="search">
            <input type="text" id="search" name="s" placeholder="Поиск по сайту" />
            <div class="search-icon" style="cursor:pointer" onclick="(function($){if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){}else{location.href='http://<?=$_SERVER['HTTP_HOST'];?>/?s='+$('#search').val();}})(jQuery);"></div>
          </div>
          <div class="shopping-cart">
            <div class="shopping-cart__icon">
              <a href="/cart"><img src="<? echo get_template_directory_uri().'/img/icon-shop.svg';?>" alt="shopping-cart" />
              <span><?php echo WC()->cart->get_cart_contents_count(); ?></a></span>
            </div>
            <span class="shopping-cart__text">Корзина</span>
          </div>
        </div>
      </div>
      <div id="fmenu">
                <?php
			wp_nav_menu( [
				'theme_location'  => 'primary',
				'menu'            => 'Women menu',
				'container'       => 'div',
				'container_class' => 'header__bottom',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '%3$s',
				'depth'           => 0,
				'walker'          => '',
			] );
            ?></div><div id="mmenu"><?
			wp_nav_menu( [
				'theme_location'  => 'primary',
				'menu'            => 'Men menu',
				'container'       => 'div',
				'container_class' => 'header__bottom',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '%3$s',
				'depth'           => 0,
				'walker'          => '',
			] );
		  ?></div>
    </div>
  </div>
</header>
<script>
(function($){
 if ($.cookie('check')==null){
        $.cookie('check', 'female', { expires: 7, path: '/' });
        $('#female').attr('checked','checked');
        $('[for="female"]').addClass('checked');
        $('#fmenu').show();
    } else {
        if ($.cookie('check')=='female') {
        	$('#female').attr('checked','checked');
            $('[for="female"]').addClass('checked');
            $('#fmenu').show();
        } else {
        	$('#male').attr('checked','checked');
            $('[for="male"]').addClass('checked');
            $('#mmenu').show();
        }
    }
    
$('#male').click(function(){
$(this).attr('checked','checked');$('[for=male]').addClass('checked');$.removeCookie('check');$.cookie('check', 'male', { expires: 7, path: '/' });location.reload();
});
$('#female').click(function(){
$(this).attr('checked','checked');$('[for=female]').addClass('checked');$.removeCookie('check');$.cookie('check', 'female', { expires: 7, path: '/' });location.reload();
});

})(jQuery);
</script>