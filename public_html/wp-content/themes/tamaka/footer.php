    <footer class="footer">
  <div class="footer__top">
    <div class="contact">
      <span>НУЖНА ПОМОЩЬ С ЗАКАЗОМ?</span>
      <div class="phone">
        <span><a href="tel:<? the_field('phone1','option');?>"><? the_field('phone1','option');?></a></span>
        <!-- <span>+7 800 465 33 75</span> -->
        <span><a href="tel:<? the_field('phone2','option');?>"><? the_field('phone2','option');?></a></span>
        <!-- <span>+7 800 465 33 75</span> -->
      </div>
      <span class="email"><a href="mailto:<? the_field('email','option');?>"><? the_field('email','option');?></a></span>
    </div>
    <div class="instagram">
      <span>ПРИСОЕДИНЯЙТЕСЬ К НАМ</span>
      <div class="link">
        <a href="<? the_field('instagram','option')?>"><img class="link__instagram--desktop" src="<? echo get_template_directory_uri().'/img/instagram.svg';?>" alt="instagram" />
        <img class="link__instagram--mobile" src="<? echo get_template_directory_uri().'/img/instagram-mobile.svg';?>" alt="instagram" /></a>
        <span>Будь в курсе новых товаров.
          Подписывайся на наш инстаграмм аккаунт</span>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <img src="<? echo get_template_directory_uri().'/img/logo.svg';?>" alt="logo" />
    <a href="/policy">Политика конфиденциальности</a>
  </div>
</footer>
  </div>
<?php
$cookie_name = 'check';
if (!isset($_POST['category'])){
    if(!isset($_COOKIE[$cookie_name])) {
        $cookie_name = "user";
        $cookie_value = "female";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        $womencheck = 'checked';
        $mencheck = '';
    } else {
        if ($_COOKIE[$cookie_name]=='female') {
        	$womencheck = 'checked';$mencheck='';
        } else {
        	$mencheck = 'checked';$womencheck='';
        }
    }
} else {
    $cookie_value = $_POST['category'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    if ($cookie_value=='male') {
    	$womencheck = 'checked';$mencheck='';
        header("Location: ".$_SERVER['REQUEST_URI']);
    } else {
    	$womencheck='';$mencheck = 'checked';
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
}
?>
  <div class="drawer hidden-left">
  <div class="drawer__content">
  <form id="checker" action="<?=$_SERVER['REQUEST_URI'];?>" method="POST">
    <div class="category-buttons category-buttons--drawer">
      <div class="category-buttons__button">
        <input
          id="male-drawer"
          class="category-buttons__radio"
          name="category"
          value="male"
          type="radio"
        <?=$mencheck;?> onclick="(function($){$('#check').submit();})(jQuery);"
        />
        <label for="male-drawer">Мужская</label>
      </div>
      <div class="category-buttons__button">
        <input
          id="female-drawer"
          class="category-buttons__radio"
          name="category"
          value="female"
          type="radio"
          <?=$womencheck;?> onclick="(function($){$('#check').submit();})(jQuery);"
        />
        <label for="female-drawer">Женская</label>
      </div>
    </div>
    <?php
                if ($womencheck!='') {
			wp_nav_menu( [
				'theme_location'  => 'primary',
				'menu'            => 'Women menu',
				'container'       => 'div',
				'container_class' => 'category-list',
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
            } else {
			wp_nav_menu( [
				'theme_location'  => 'primary',
				'menu'            => 'Men menu',
				'container'       => 'div',
				'container_class' => 'category-list',
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
            }
		  ?>
  </div>
  <div class="drawer__void hidden"></div>
</div>
 <div class="popup-search hidden-top">
  <div class="popup-search__content">
    <input type="text" id="srch" name="search" placeholder="Поиск по сайту" />
    <div class="popup-search__icon-search" onclick="(function($){location.href='http://<?=$_SERVER['HTTP_HOST'];?>/?s='+$('#srch').val();})(jQuery);"></div>
    <div class="popup-search__button-close">
      <span></span>
      <span></span>
    </div>
  </div>
</div>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"
></script>
<script
  type="text/javascript"
  src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
></script>
<script src="<? echo get_template_directory_uri().'/js/script.js';?>"></script>
<?php wp_footer();?>
<script>
(function($){
$('.woocommerce').wrapAll('<form name="checkout" method="post" class="checkout woocommerce-checkout" action="https://tamaka.ru/checkout/" enctype="multipart/form-data" novalidate="novalidate"></form>');
$( ".category-list a" ).each(function() {
  if ( $(this).parent().is( "li" ) ) {
    $(this).addClass('category-list__item');
    $(this).unwrap();
  }
});
$('.category-buttons__button label').click(function(){
	$('.category-buttons__button label').removeClass('checked');
    $(this).addClass('checked');
});
})(jQuery);
</script>
</body>
</html>