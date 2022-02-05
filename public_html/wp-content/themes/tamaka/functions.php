<?php
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    remove_filter( 'the_content', 'wpautop' );
function the_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&nbsp;|'; // delimiter between crumbs
    $home = 'Назад'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<ul class="nav__list"><li class="nav__item"><a href="' . $homeLink . '">' . $home . '</a></li></ul>';
        }
    } else {
        echo '<ul class="nav__list"><li class="nav__item"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</ul>';
    }
} // end the_breadcrumb()

function my_pagination($pag){
    global $wp_query;

    if (is_front_page()) {
        $currentPage = (get_query_var('page')) ? get_query_var('page') : 1;
    } else {
        $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
    }

    $pagination = paginate_links([
    'base'    => str_replace(999999999, '%#%', get_pagenum_link(999999999)),
    'format'  => '',
    'current' => max(1, $currentPage),
    'total'   => $posts_Query->max_num_pages,
        'prev_text' => '«',
        'next_text' => '»',
    ]);

    echo "<div class='pagination ".$pag."'><div class='pagination__container'>" . $pagination . "</div>";
}
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function insert_attachment($file_handler,$post_id,$setthumb='false') {
if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK){ return __return_false(); 
} 
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

echo $attach_id = media_handle_upload( $file_handler, $post_id );
//set post thumbnail if setthumb is 1
if ($setthumb == 1) update_post_meta($post_id,'_thumbnail_id',$attach_id);
return $attach_id;
    }


//add_action( 'woocommerce_before_calculate_totals', 'change_price_of_product' );


function change_price_of_product($pid,$qty) {
    $items = WC()->cart->get_cart();
    //$coupons = WC()->cart->applied_coupons;
    
    $only_one_gift = 0;
    
    //if (in_array('getmygift', $coupons)) {
        
         foreach($items as $cart_item_key => $item) {
                if (isset($item['product_id'])) {
                    
                    if ($only_one_gift > 0) {
                        break;
                    }
                    
                    
                    if (($item['product_id']) == $pid) {
                        $only_one_gift++;
                        $item['data']->set_price( 0 );
                        WC()->cart->set_quantity( $cart_item_key, $qty );
                    }
                }
            }
    //}
}
add_filter( 'woocommerce_states' , 'keep_specific_country_states', 10, 1 );
function keep_specific_country_states( $states ) {
    // HERE define the countries where you want to keep
    $countries = array('US', 'AU', 'CA');
    $new_country_states = array();

    // Loop though all country states
    foreach( $states as $country_code => $country_states ){
        if( ! in_array( $country_code, $countries ) ){
            // Remove states from all countries except the defined ones
            $states[$country_code] = array();
        }
    }
    return $states;
}

?>