<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Product Solution - Home', 'crismaster'),
            'base' => 'collection_product_solution',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Title chính','crismaster'),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Tilte phụ', 'crismaster'),
                    'param_name' => 'title2',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Subtitle', 'crismaster'),
                    'param_name' => 'subtitle',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Mô tả', 'crismaster'),
                    'param_name' => 'des',
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
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 813 x 635', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_product_solution','collection_product_solution_func');
function collection_product_solution_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'link' => '',
        'subtitle' => '',
        'image' => '',
        'des' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>

    <section class="section-widget" style="padding: 60px 0 50px; background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="heading" style="margin-bottom: 20px;">
                        <?= isset($title) ? urldecode(base64_decode($title)) : ''; ?>
                    </h3>
                </div>
            </div>
            <div class="row align-center">
                <div class="col-12 col-md-6">
                    <div class="column-img-style">
                        <img src="<?= esc_url($image_link[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="column-content mw-400 content-center">
                        <div class="sub-heading"><?= esc_attr($subtitle) ?></div>
                        <h3 class="heading">
                            <span><?= esc_attr($title2) ?></span>
                        </h3>
                        <div class="description">
                            <?= esc_attr($des) ?>
                        </div>
                        <div class="button-cms" style="margin-top: 20px;">
                            <a href="<?= esc_url($link) ?>" class="btn-main"><?= esc_html__('CHI TIẾT','crismaster') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>