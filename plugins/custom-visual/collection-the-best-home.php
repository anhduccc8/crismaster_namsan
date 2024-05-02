<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Nổi bật - Home', 'crismaster'),
            'base' => 'collection_the_best_home',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 1960 x 644', "crismaster")
                ),
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Nội dung chính','crismaster'),
                    'param_name' => 'des',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_the_best_home','collection_the_best_home_func');
function collection_the_best_home_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'des' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>

    <section class="section-widget space-section">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="column-img">
                        <img src="<?= esc_url($image_link[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="column-content mw-400 content-center">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>