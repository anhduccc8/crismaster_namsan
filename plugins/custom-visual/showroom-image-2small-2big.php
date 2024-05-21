<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Showroom - 2 ảnh bé dọc & 2 ảnh to', 'crismaster'),
            'base' => 'showroom_image_2small_2big',
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
                    'param_name' => 'image1',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh 2', 'crismaster'),
                    'param_name' => 'image2',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh 3', 'crismaster'),
                    'param_name' => 'image3',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh 4', 'crismaster'),
                    'param_name' => 'image4',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),

            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('showroom_image_2small_2big','showroom_image_2small_2big_func');
function showroom_image_2small_2big_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image1' => '',
        'image2' => '',
        'image3' => '',
        'image4' => '',
        'des' => '',
    ),$atts));
    ob_start();
    if(isset($image1) && $image1!='') {
        $image1 = wp_get_attachment_image_src($image1, '');
    }else{
        $image1 = '';
    }
    if(isset($image2) && $image2!='') {
        $image2 = wp_get_attachment_image_src($image2, '');
    }else{
        $image2 = '';
    }
    if(isset($image3) && $image3!='') {
        $image3 = wp_get_attachment_image_src($image3, '');
    }else{
        $image3 = '';
    }
    if(isset($image4) && $image4!='') {
        $image4 = wp_get_attachment_image_src($image4, '');
    }else{
        $image4 = '';
    }
    ?>
    <section class="section-widget section-bgr-06" style=" background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="column-img-update">
                        <img src="<?= esc_url($image1[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="column-img-update mt-30-sm">
                        <img src="<?= esc_url($image2[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="row-content col-12" style="margin: 22px 0 10px;">
                    <h3 class="heading" style="font-size: 22px;">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    </h3>
                </div>
                <div class="col-12 col-md-4">
                    <div class="column-img-update">
                        <img src="<?= esc_url($image3[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="col-12 col-md-8 mt-30-sm">
                    <div class="column-img-update">
                        <img src="<?= esc_url($image4[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>