<?php

function custom_post_types()
{
    // Danh mục Bài viết: Collection
    $labels_collection = array(
        'name' => _x('Collection', 'Tên Danh mục bài viết', 'crismaster'),
        'singular_name' => _x('Collection', 'Tên Danh mục bài viết', 'crismaster'),
        'menu_name' => _x('Collection', 'Tên menu', 'crismaster'),
        'name_admin_bar' => _x('Collection', 'Thêm mới trên thanh admin', 'crismaster'),
        'add_new' => _x('Thêm mới', 'Collection', 'crismaster'),
        'add_new_item' => __('Thêm mới Collection', 'crismaster'),
        'new_item' => __('Collection mới', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Collection', 'crismaster'),
        'view_item' => __('Xem Collection', 'crismaster'),
        'all_items' => __('Tất cả Collection', 'crismaster'),
        'search_items' => __('Tìm kiếm Collection', 'crismaster'),
        'parent_item_colon' => __('Collection cha:', 'crismaster'),
        'not_found' => __('Không tìm thấy Collection.', 'crismaster'),
        'not_found_in_trash' => __('Không tìm thấy Collection trong thùng rác.', 'crismaster'),
    );

    $args_collection = array(
        'labels' => $labels_collection,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'collection'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag')
    );

    register_post_type('collection', $args_collection);

    // Taxonomy: Danh mục Collection
    $labels_loai_collection = array(
        'name' => _x('Danh mục Collection', 'Tên taxonomy', 'crismaster'),
        'singular_name' => _x('Danh mục Collection', 'Tên taxonomy', 'crismaster'),
        'search_items' => __('Tìm kiếm Danh mục Collection', 'crismaster'),
        'all_items' => __('Tất cả Danh mục Collection', 'crismaster'),
        'parent_item' => __('Danh mục Collection cha', 'crismaster'),
        'parent_item_colon' => __('Danh mục Collection cha:', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Danh mục Collection', 'crismaster'),
        'update_item' => __('Cập nhật Danh mục Collection', 'crismaster'),
        'add_new_item' => __('Thêm mới Danh mục Collection', 'crismaster'),
        'new_item_name' => __('Tên mới của Danh mục Collection', 'crismaster'),
        'menu_name' => __('Danh mục Collection', 'crismaster'),
    );

    $args_loai_collection = array(
        'hierarchical' => true,
        'labels' => $labels_loai_collection,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'collection_type'),
    );
    register_taxonomy('collection_type', array('collection'), $args_loai_collection);

}
add_action( 'init', 'custom_post_types' );
