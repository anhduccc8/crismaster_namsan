<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Showroom - 1 ảnh', 'crismaster'),
            'base' => 'showroom_1image',
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
                    'heading' => esc_html__('Hình Ảnh 1', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('showroom_1image','showroom_1image_func');
function showroom_1image_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'des' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image = wp_get_attachment_image_src($image, '');
    }else{
        $image = '';
    }
    ?>
    <section class="section-widget" style="margin-top: 70px;">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="column-img-update">
                        <img src="<?= esc_url($image[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="col-12 col-md-4" style="background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
                    <div class="column-content-update">
                        <h3 class="heading" style="font-size: 22px;">
                            <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>

                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>