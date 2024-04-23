<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection List Danh mục', 'crismaster'),
            'base' => 'collection_list_taxonomy',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
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
add_shortcode('collection_list_taxonomy','collection_list_taxonomy_func');
function collection_list_taxonomy_func($atts,$content = null){
    extract(shortcode_atts(array(
        'number' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-widget section-grid-collection section-bgr" style="margin-top: 30px;">
        <div class="container-fluiddd">
            <div class="row wrap-grid-fields grid-collection">
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'collection_type',
                    'hide_empty' => false,
                ));
                if (!empty($terms) && !is_wp_error($terms)) {
                    $t = 1;
                    foreach ($terms as $term) {
                        $term_link = get_term_link($term);
                        $image_id = get_term_meta($term->term_id, 'collection_type_image', true);
                        $image_url = wp_get_attachment_url($image_id);
                        if($t <= $number){ ?>
                            <div class="col-12 col-sm-6">
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