<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'About element 2', 'crismaster'),
            'base' => 'about_ele_2',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 772 x 724', "crismaster")
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
add_shortcode('about_ele_2','about_ele_2_func');
function about_ele_2_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'des' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>
    <section class="section-widget section-bgr style-02" style="background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
        <div class="container-fluidd">
            <div class="row align-center">
                <div class="col-12 col-md-6 respon-order-2">
                    <div class="column-content mw-450 content-center">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="column-image">
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