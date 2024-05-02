<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Showroom in Collect', 'crismaster'),
            'base' => 'collection_showroom_in_collect',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(

                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Title 1','crismaster'),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 1660 x 800', "crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title 2', 'crismaster'),
                    'param_name' => 'title2',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link', 'crismaster'),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_showroom_in_collect','collection_showroom_in_collect_func');
function collection_showroom_in_collect_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'image' => '',
        'link' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>
    <section class="section-widget" style="margin-top: 40px;">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="heading">
                        <?= isset($title) ? urldecode(base64_decode($title)) : ''; ?>
                    </h3>
                </div>
                <div class="col-12 mt-20">
                    <div class="wrap-content-collection">
                        <img src="<?= esc_url($image_link[0]) ?>" style="width: 100%;">
                        <a href="<?= esc_url($link) ?>" class="btn-main btn-item-grid">
                            <?= esc_attr($title2) ?>
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
?>