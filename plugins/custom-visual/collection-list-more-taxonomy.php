<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection List Danh mục More', 'crismaster'),
            'base' => 'collection_list_more_taxonomy',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Title','crismaster'),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Nhập id các danh mục muốn show', 'crismaster'),
                    'param_name' => 'ids',
                    'value' => '',
                    'description' => esc_html__('Ngăn cách với nhau bằng dấu "," or không nhập sẽ show all theo số lượng phía dưới', "crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Số lượng danh mục muốn show', 'crismaster'),
                    'param_name' => 'number',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_list_more_taxonomy','collection_list_more_taxonomy_func');
function collection_list_more_taxonomy_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'ids' => '',
        'number' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-widget" style="margin-top: 60px;">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="heading">
                        <?= isset($title) ? urldecode(base64_decode($title)) : ''; ?>
                    </h3>
                </div>
                <?php
                if (isset($ids) && $ids != ''){
                    $idss = explode(',', $ids);
                }else{
                    $idss = array();
                }
                if (!empty($idss)){
                    $terms = get_terms(array(
                        'taxonomy' => 'collection_type',
                        'hide_empty' => false,
                        'include'    => $idss,
                    ));
                    $number = 12;
                }else{
                    $terms = get_terms(array(
                        'taxonomy' => 'collection_type',
                        'hide_empty' => false,
                    ));
                }

                if (!empty($terms) && !is_wp_error($terms)) {
                    $t = 1;
                    foreach ($terms as $term) {
                        $term_link = get_term_link($term);
                        $image_id = get_term_meta($term->term_id, 'collection_type_image', true);
                        $image_url = wp_get_attachment_url($image_id);
                        if($t <= $number){ ?>
                            <div class="col-12 col-sm-6 col-lg-4 mt-10">
                                <div class="wrap-content-collection">
                                    <?php if (!empty($image_id)) { ?>
                                        <img src="<?= esc_url($image_url) ?>" style="width: 100%;">
                                    <?php } ?>
                                    <a href="<?= esc_attr($term_link) ?>" class="btn-main btn-item-grid text-uppercase">
                                        <?= esc_attr($term->name) ?>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php $t++; }
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>