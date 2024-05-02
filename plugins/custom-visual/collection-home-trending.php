<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Trending - Home', 'crismaster'),
            'base' => 'collection_home_trending',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 1060 x 703', "crismaster")
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
add_shortcode('collection_home_trending','collection_home_trending_func');
function collection_home_trending_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'des' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>

    <section class="section-widget space-section section-bgr section-bgr-01" style="background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
        <div class="container-fluiddd">
            <div class="row align-center">
                <div class="col-12 col-md-4 respon-order-2">
                    <div class="qr-image text-center">
                        <img class="" style="max-width: 135px" src="<?= get_template_directory_uri() ?>/assets/image/qr_trending.png" alt="">
                    </div>
                    <div class="column-content-bgr mw-400">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="column-img-bgr">
                        <img src="<?= esc_url($image_link[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>