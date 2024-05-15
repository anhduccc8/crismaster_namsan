<?php

require_once get_template_directory() . '/plugins/redux/ReduxCore/framework.php';
require_once get_template_directory() . '/plugins/redux/sample/sample-config.php';
require_once get_template_directory() . '/plugins/custom-post-type/crismaster_post_type.php';
//require_once get_template_directory() . '/plugins/cmb2/init.php';
//require_once get_template_directory() . '/plugins/cmb2/example-functions.php';
//require_once get_template_directory() . '/plugins/widget/widgets.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-banner.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-title.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-list-taxonomy.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-the-best.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-video-bg.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-the-best-home.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-home-trending.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-home-signup.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-the-best-video.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-how-we-work.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-our-project.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-showroom-home.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-partner.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-showroom-collect-list.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-list-more-taxonomy.php';
require_once get_template_directory() . '/plugins/custom-visual/collection-product-solution.php';
require_once get_template_directory() . '/plugins/custom-visual/contact-form-infor.php';
require_once get_template_directory() . '/plugins/custom-visual/showroom-4-image.php';
require_once get_template_directory() . '/plugins/custom-visual/showroom-2-image.php';
require_once get_template_directory() . '/plugins/custom-visual/about-ele-1.php';
require_once get_template_directory() . '/plugins/custom-visual/about-ele-2.php';
require_once get_template_directory() . '/plugins/custom-visual/about-ele-3.php';
require_once get_template_directory() . '/plugins/custom-visual/about-ele-title.php';
require_once get_template_directory() . '/plugins/custom-visual/about-ele-form.php';
// @ini_set( 'upload_max_size' , '64M' );
// @ini_set( 'post_max_size', '64M');
// @ini_set( 'max_execution_time', '300' );
//Theme Set up:
function crismaster_theme_setup() {
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
//	add_theme_support ('title-tag');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list','gallery', ) );

//	register_nav_menus( array(
//		'primary' => esc_html__('Menu sử dụng cho tất cả các page','crismaster'),
//		'second' => esc_html__('Second Navigation Menu (Menu For Home Page With Scroll menu)','crismaster'),
//    ) );
//    add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'crismaster_theme_setup' );

function crismaster_theme_scripts_styles(){
    $mobile = wp_is_mobile();
    /**** Theme Specific CSS ****/
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/assets/css/bootstrap.css',array());
    wp_enqueue_style( 'font-css-3', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',array());
    wp_enqueue_style( 'font-css', get_template_directory_uri() .'/assets/font/fontawesome-free-6.0.0-web/css/all.min.css',array());
    wp_enqueue_style( 'font-css-2', get_template_directory_uri() .'/assets/css/font-family.css',array(),'1.0.0');

    wp_enqueue_style( 'main-css', get_template_directory_uri() .'/assets/css/main.css',array(),'1.0.0');
    wp_enqueue_style( 'header-css', get_template_directory_uri() .'/assets/css/header.css',array());
    wp_enqueue_style( 'footer-css', get_template_directory_uri() .'/assets/css/footer.css',array(),'1.0.1');
    wp_enqueue_style( 'language-css', get_template_directory_uri() .'/assets/css/language.css',array(),'1.0.1');
    wp_enqueue_style( 'response-css', get_template_directory_uri() .'/assets/css/responsive.css',array(),'1.0.1');
    wp_enqueue_style( 'form-css', get_template_directory_uri() .'/assets/css/form.css',array(),'1.0.1');
    wp_enqueue_style( 'grid-css', get_template_directory_uri() .'/assets/css/grid.css',array(),'1.0.1');
    wp_enqueue_style( '2-css', get_template_directory_uri() .'/assets/css/owl.carousel.css',array());
    wp_enqueue_style( '3-css', get_template_directory_uri() .'/assets/css/owl.theme.css',array());
    wp_enqueue_style( '4-css', get_template_directory_uri() .'/assets/css/owl.transitions.css',array());
    wp_enqueue_style( 'mystyle', get_template_directory_uri() .'/style.css',array(),'1.0.3');
    /**** Start Jquery ****/
    wp_enqueue_script("jquery-min", get_template_directory_uri()."/assets/js/jquery.min.js",array(),true,false);
//    wp_enqueue_script("jquery-min", "https://code.jquery.com/jquery-3.6.0.min.js",array(),true,false);
    wp_enqueue_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js",array(),true,false);
    wp_enqueue_script("select2-js", "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js",array(),true,false);
    wp_enqueue_script("owl-carousel-js", get_template_directory_uri()."/assets/js/owl.carousel.min.js",array(),true,false);
    wp_enqueue_script("custom-js", get_template_directory_uri()."/assets/js/main.js",array(),'1.0.2',false);
    wp_localize_script('custom-js', 'themeData', array(
        'direc_url' => get_template_directory_uri().'/assets/'
    ));


}
add_action( 'wp_enqueue_scripts', 'crismaster_theme_scripts_styles' );


function crismaster_breadcrumbs() {
    // / === OPTIONS === /
    $text['home']     = esc_html__('Trang chủ','crismaster'); // text for the 'Home' link
    $text['category'] = esc_html__('%s','crismaster'); // text for a category page
    $text['tax']      = esc_html__('%s','crismaster'); // text for a taxonomy page
    $text['search']   = esc_html__('Tìm kiếm: %s','crismaster'); // text for a search results page
    $text['tag']      = esc_html__('Tags "%s"','crismaster'); // text for a tag page
    $text['author']   = esc_html__('Articles Posted by %s','crismaster'); // text for an author page
    $text['404']      = esc_html__('Error 404','crismaster'); // text for the 404 page

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = ''; // tag before the current crumb
    $after       = ''; // tag after the current crumb
    // / === END OF OPTIONS === /
    global $post;
    $homeLink = home_url() . '/';
    $linkBefore = '';
    $linkAfter = '';
    $linkAttr = ' rel="v:url" property="v:title"  class="link-home"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a><i class="fa-solid fa-angle-right"></i>' . $linkAfter;
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<a href="' . $homeLink . '" class="link-home">' . $text['home'] . '</a>';
    } else {
        echo '' . sprintf($link, $homeLink, $text['home']) . $delimiter;
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<span><a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a></span>' . $linkAfter, $cats);
                echo wp_specialchars_decode($cats);
            }
            echo wp_specialchars_decode($before .'<h1>'. sprintf($text['category'].'</h1>', single_cat_title('', false)) . $after);
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo wp_specialchars_decode($cats);
            }
            echo wp_specialchars_decode($before . sprintf($text['tax'], single_cat_title('', false)) . $after);
        }elseif ( is_search() ) {
            echo wp_specialchars_decode($before . sprintf($text['search'], get_search_query()) . $after);
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo wp_specialchars_decode($before . get_the_time('d') . $after);
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo wp_specialchars_decode($before . get_the_time('F') . $after);
        } elseif ( is_year() ) {
            echo wp_specialchars_decode($before . get_the_time('Y') . $after);
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', esc_attr__($post_type->labels->singular_name,'crismaster'));
                if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before .'' . $after);
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, FALSE, '');
                // $cats2 = explode(',',$cats);
                // $cats = $cats2[0];
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<span><a', $linkBefore . '<span><a' . $linkAttr, $cats);
                $cats = str_replace('</a></span>', '</a></span>' . $linkAfter, $cats);
                echo '<span class="cus-span">'.$cats.'</span>';
                if ($showCurrent == 1) echo wp_specialchars_decode($before . $after);
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo wp_specialchars_decode($before . $post_type->labels->singular_name . $after);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo wp_specialchars_decode($cats);
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before . get_the_title() . $after);
        } elseif ( is_page() && !$post->post_parent ) {

            if ($showCurrent == 1) echo wp_specialchars_decode($before . get_the_title() . $after);
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo wp_specialchars_decode($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1) echo wp_specialchars_decode($delimiter);
            }
            if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before . get_the_title() . $after);
        } elseif ( is_tag() ) {
            echo wp_specialchars_decode($before . sprintf($text['tag'], single_tag_title('', false)) . $after);
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo wp_specialchars_decode($before . sprintf($text['author'], $userdata->display_name) . $after);
        } elseif ( is_404() ) {
            echo wp_specialchars_decode($before .'<span>'. $text['404'].'</span>' . $after);
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
    }
}

function crismaster_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar ', 'crismaster' ),
        'id'            => 'sidebar-1',
        'class'         => '',
        'description'   => esc_html__( 'Sidebar', 'crismaster' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'crismaster_widgets_init' );


function crismaster_pagination() {
    if( is_singular() )
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    if ( $paged == 1 && $max > 2 )
        $links[] = $paged + 2 ;
    /** Add the pages around the current page to the array */
    if ( $paged >= 2 ) {
        $links[] = $paged - 1;
    }
    if ( ( $paged + 1 ) <= $max ) {
        $links[] = $paged + 1;
    }
    if ( $paged == $max && $max > 2 )
        $links[] = $paged - 2 ;
    /** Previous Post Link */
    $next_page_exists = get_next_posts_link(null, $wp_query->max_num_pages) !== null;
    $prev_page_exists = get_previous_posts_link(null) !== null;
    if ( $prev_page_exists )
        printf( get_previous_posts_link('&laquo;') );
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? 'active' : '';
        printf( '<a class="nav-number %s" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Next Post Link */
    if ( $next_page_exists )
//        printf( '<a class="nav-number">%s</a>' . "\n", get_next_posts_link('&raquo;') );
        printf('%s', get_next_posts_link('&raquo;'));
}

function wp_get_menu_array($current_menu='Main Menu') {

    $menu_array = wp_get_nav_menu_items($current_menu);
    $menu = array();



    foreach ($menu_array as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['object_id'] = $m->object_id;
            $menu[$m->ID]['children'] = populate_children($menu_array, $m);
        }
    }

    return $menu;

}
function populate_children($menu_array, $menu_item)
{
    $children = array();
    if (!empty($menu_array)){
        foreach ($menu_array as $k=>$m) {
            if ($m->menu_item_parent == $menu_item->ID) {
                $children[$m->ID] = array();
                $children[$m->ID]['ID'] = $m->ID;
                $children[$m->ID]['title'] = $m->title;
                $children[$m->ID]['url'] = $m->url;
                $children[$m->ID]['object_id'] = $m->object_id;
                unset($menu_array[$k]);
                $children[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    };
    return $children;
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');


function custom_next_posts_link_attributes($attr) {
    $attr .= ' class="nav-number"';
    return $attr;
}
add_filter('next_posts_link_attributes', 'custom_next_posts_link_attributes');
function custom_prev_posts_link_attributes($attr) {
    $attr .= ' class="nav-number"';
    return $attr;
}
add_filter('previous_posts_link_attributes', 'custom_prev_posts_link_attributes');


function custom_polylang_langswitcher() {
    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 0, 'raw' => 1 ) );
    $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
    if ($langs_array) :
        if ($current_language == $langs_array['vi']['slug']){ ?>
            <div class="cms-langue-active">VN</div>
            <ul>
                <li><a href="<?= $langs_array['en']['url'] ?>">EN</a></li>
            </ul>
        <?php }
        if ($current_language == $langs_array['en']['slug']){ ?>
            <div class="cms-langue-active">EN</div>
            <ul>
                <li><a href="<?= $langs_array['vi']['url'] ?>">VI</a></li>
            </ul>
        <?php } ?>
    <?php endif;
}
add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );

// Hook the custom_pll_the_languages function into the pll_the_languages filter
add_filter('pll_the_languages', 'custom_pll_the_languages', 10, 2);

add_action('wpcf7_mail_sent', 'custom_cf7_redirect');
function custom_cf7_redirect($contact_form) {
    $form_id = $contact_form->id();
    if ($form_id) {
        $redirect_url = get_permalink();
        $redirect_url = $redirect_url.'?form_submit=success';
        wp_redirect($redirect_url);
        exit();
    }
}

function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
    if (strlen($phoneNumber) === 10) {
        $formattedNumber = substr($phoneNumber, 0, 4) . '.' . substr($phoneNumber, 4, 3) . '.' . substr($phoneNumber, 7);
        return $formattedNumber;
    } else {
        return "";
    }
}

function _convertToSMS($content) {
    $utf82abc = array(
        'à' => 'a',
        'á' => 'a',
        'ả' => 'a',
        'ã' => 'a',
        'ạ' => 'a',
        'ă' => 'a',
        'ằ' => 'a',
        'ắ' => 'a',
        'ẳ' => 'a',
        'ẵ' => 'a',
        'ặ' => 'a',
        'â' => 'a',
        'ầ' => 'a',
        'ấ' => 'a',
        'ẩ' => 'a',
        'ẫ' => 'a',
        'ậ' => 'a',
        'đ' => 'd',
        'è' => 'e',
        'é' => 'e',
        'ẻ' => 'e',
        'ẽ' => 'e',
        'ẹ' => 'e',
        'ê' => 'e',
        'ề' => 'e',
        'ế' => 'e',
        'ể' => 'e',
        'ễ' => 'e',
        'ệ' => 'e',
        'ì' => 'i',
        'í' => 'i',
        'ỉ' => 'i',
        'ĩ' => 'i',
        'ị' => 'i',
        'ò' => 'o',
        'ó' => 'o',
        'ỏ' => 'o',
        'õ' => 'o',
        'ọ' => 'o',
        'ô' => 'o',
        'ồ' => 'o',
        'ố' => 'o',
        'ổ' => 'o',
        'ỗ' => 'o',
        'ộ' => 'o',
        'ơ' => 'o',
        'ờ' => 'o',
        'ớ' => 'o',
        'ở' => 'o',
        'ỡ' => 'o',
        'ợ' => 'o',
        'ù' => 'u',
        'ú' => 'u',
        'ủ' => 'u',
        'ũ' => 'u',
        'ụ' => 'u',
        'ư' => 'u',
        'ừ' => 'u',
        'ứ' => 'u',
        'ử' => 'u',
        'ữ' => 'u',
        'ự' => 'u',
        'ỳ' => 'y',
        'ý' => 'y',
        'ỷ' => 'y',
        'ỹ' => 'y',
        'ỵ' => 'y',
        'À' => 'A',
        'Á' => 'A',
        'Ả' => 'A',
        'Ã' => 'A',
        'Ạ' => 'A',
        'Ă' => 'A',
        'Ằ' => 'A',
        'Ắ' => 'A',
        'Ẳ' => 'A',
        'Ẵ' => 'A',
        'Ặ' => 'A',
        'Â' => 'A',
        'Ầ' => 'A',
        'Ấ' => 'A',
        'Ẩ' => 'A',
        'Ẫ' => 'A',
        'Ậ' => 'A',
        'Đ' => 'D',
        'È' => 'E',
        'É' => 'E',
        'Ẻ' => 'E',
        'Ẽ' => 'E',
        'Ẹ' => 'E',
        'Ê' => 'E',
        'Ề' => 'E',
        'Ế' => 'E',
        'Ể' => 'E',
        'Ễ' => 'E',
        'Ệ' => 'E',
        'Ì' => 'I',
        'Í' => 'I',
        'Ỉ' => 'I',
        'Ĩ' => 'I',
        'Ị' => 'I',
        'Ò' => 'O',
        'Ó' => 'O',
        'Ỏ' => 'O',
        'Õ' => 'O',
        'Ọ' => 'O',
        'Ô' => 'O',
        'Ồ' => 'O',
        'Ố' => 'O',
        'Ổ' => 'O',
        'Ỗ' => 'O',
        'Ộ' => 'O',
        'Ơ' => 'O',
        'Ờ' => 'O',
        'Ớ' => 'O',
        'Ở' => 'O',
        'Ỡ' => 'O',
        'Ợ' => 'O',
        'Ù' => 'U',
        'Ú' => 'U',
        'Ủ' => 'U',
        'Ũ' => 'U',
        'Ụ' => 'U',
        'Ư' => 'U',
        'Ừ' => 'U',
        'Ứ' => 'U',
        'Ử' => 'U',
        'Ữ' => 'U',
        'Ự' => 'U',
        'Ỳ' => 'Y',
        'Ý' => 'Y',
        'Ỷ' => 'Y',
        'Ỹ' => 'Y',
        'Ỵ' => 'Y',
        '̀' => '',
        '́' => '',
        '̉' => '',
        '̃' => '',
        '̣' => ''
    );
    return str_replace(array_keys($utf82abc), array_values($utf82abc), $content);
}

function tags_add_custom_types( $query ) {
    if( is_tag() && is_main_query() ) {
        $post_types = get_post_types();
        $query->query_vars['post_type'] = $post_types;
    }
}
add_filter( 'pre_get_posts', 'tags_add_custom_types' );
?>