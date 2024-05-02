<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Showroom', 'crismaster'),
            'base' => 'collection_showroom',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Nội dung chính','crismaster'),
                    'param_name' => 'des',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 1020 x 540', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_showroom','collection_showroom_func');
function collection_showroom_func($atts,$content = null){
    extract(shortcode_atts(array(
        'des' => '',
        'image' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>
    <section class="section-widget section-bgr-04 mt-70">
        <div class="container-fluiddd">
            <div class="row align-center">
                <div class="col-lg-4 col-md-6 col-sm-12 respon-order-2">
                    <div class="column-content-bgr content-center">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>

                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="column-img-bgr">
                        <img src="<?= esc_url($image_link[0]) ?>" style="width: 100%;transform: translateX(15px);">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
?>