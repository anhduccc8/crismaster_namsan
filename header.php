<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $theme_option = get_option('theme_option');
if (isset($theme_option['header_logo']['url'])){
    $header_logo = $theme_option['header_logo']['url'];
}
if (isset($theme_option['header_logo_m']['url'])){
    $header_logo_m = $theme_option['header_logo_m']['url'];
}
$current_language = function_exists('pll_current_language') ? pll_current_language() : '';
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?= get_template_directory_uri() ?>/assets/image/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/image/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class('body-main'); ?> >

<header>
    <div id="site-header-wrap" class="header-layout">
        <div class="container-fluidd">
            <div class="row row-header align-center space-between">
                <div class="site-branding header-left d-flex align-center">
                    <a class="logo logo-desktop" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Nam San">
                        <?php if (isset($header_logo) && $header_logo != '') { ?>
                            <img src="<?php  echo esc_url($header_logo) ?>" alt="">
                        <?php } ?>
                    </a>
                    <div id="menu-reponsive" class="site-navigation header-menu">
                        <div onclick="navClose()" class="nav-close"><i class="fa-solid fa-plus"></i></div>
                        <div class="logo-menu-dropdown">
                            <a class="logo logo-desktop" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Nam San">
                                <?php if (isset($header_logo_m) && $header_logo_m != '') { ?>
                                    <img src="<?php  echo esc_url($header_logo_m) ?>" alt="">
                                <?php } ?>
                            </a>
                        </div>
                        <ul class="main-menu">
                            <?php if ($current_language == 'en'){
                                $menu_items = wp_get_menu_array('16');
                            }else{
                                $menu_items = wp_get_menu_array('15');
                            }
                            $object = get_queried_object();
                            if (!empty($menu_items)){
                                foreach ($menu_items as $menu) { ?>
                                    <li>
                                        <a class="<?php if ($menu['object_id'] == $object->ID){ echo 'active'; } ?>" href="<?= $menu['url'] ?>"><?php esc_attr_e( trim($menu['title']), 'crismaster'); ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <li>
                                <form class="form-search-respon" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                                    <input type="text" name="s" placeholder="Search">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="info-right d-flex align-center">
                    <div class="icon-heart">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="cms-lang-curentcy">
                        <div class="cms-lang">
                            <?= do_shortcode('[polylang_langswitcher]') ?>
                        </div>
                    </div>
                    <form class="form-search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                        <input type="text" name="s" placeholder="Search">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <div id="menu-sidebar" class="menu-sidebar">
                        <span class="btn-nav-icon open-menu" onclick="navOpen()"><span></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $page_id = get_queried_object_id();
    if (is_archive() || $page_id == '21') { ?>
        <div class="header-above">
            <div class="container-fluidd">
                <div class="row row-header-above space-between">
                    <div id="menu-above-reponsive" class="menu-above">
                        <div id="menu-collection" class="text-center menu-collection">
                            <div id="btn-active-collection" class="btn-nav-icon open-menu">
                                <i class="fa-solid fa-list"></i>
                                Menu
                            </div>
                        </div>
                        <ul class="main-menu menu-collection-res">
                            <li>
                                <a href="<?= get_permalink(21); ?>"><?= esc_html__('Tất cả danh mục','crismaster') ?></a>
                            </li>
                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'collection_type',
                                'hide_empty' => false,
                            ));
                            if (!empty($terms) && !is_wp_error($terms)) {
                                $t = 1;
                                foreach ($terms as $term) {
                                    $term_link = get_term_link($term);
                                    if($t <= 5){ ?>
                                        <li>
                                            <a href="<?= esc_attr($term_link) ?>"><?= esc_attr($term->name) ?></a>
                                        </li>
                                    <?php $t++; }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</header>

