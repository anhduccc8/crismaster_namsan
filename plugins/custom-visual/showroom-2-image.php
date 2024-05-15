<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Showroom - 2 image', 'crismaster'),
            'base' => 'showroom_2_image',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Nội dung chính + title','crismaster'),
                    'param_name' => 'des',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
                array(
                    'type' => 'attach_images',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'images',
                    'value' => '',
                    'description' => esc_html__('Nhập 2 Hình ảnh có kích thước 800 x 1068', "crismaster")
                ),

            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('showroom_2_image','showroom_2_image_func');
function showroom_2_image_func($atts,$content = null){
    extract(shortcode_atts(array(
        'images' => '',
        'des' => '',
    ),$atts));
    ob_start();
    ?>

    <section class="section-widget space-section">
        <div class="container-fluidd">
            <div class="row align-center">
                <div class="col-12 col-lg-4 text-center">
                    <div class="mw-1000 m-auto">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    </div>
                </div>
                <div class="col-12 col-lg-8 mt-lg-50">
                    <div class="row">
                        <?php  if (isset($images) && $images != '') {
                            $imagess = explode(',', $images);
                            foreach ($imagess as $img) {
                                $imgs = wp_get_attachment_image_src($img, ''); ?>
                                <div class="col-6">
                                    <img src="<?= esc_url($imgs[0]) ?>" style="width: 100%;" alt="img-slide">
                                </div>
                            <?php }  } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>