<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Showroom Our Process - 4 image', 'crismaster'),
            'base' => 'showroom_4_image',
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
                    'description' => esc_html__('Nhập 4 Hình ảnh có kích thước 500 x 500', "crismaster")
                ),

            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('showroom_4_image','showroom_4_image_func');
function showroom_4_image_func($atts,$content = null){
    extract(shortcode_atts(array(
        'images' => '',
        'des' => '',
    ),$atts));
    ob_start();
    ?>

    <section class="section-widget" style="padding: 60px 0 70px;">
        <div class="container-fluiddd">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="mw-1000 m-auto">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-50">
            <?php  if (isset($images) && $images != '') {
                $imagess = explode(',', $images);
                foreach ($imagess as $img) {
                    $imgs = wp_get_attachment_image_src($img, ''); ?>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="item-carousel-content text-center">
                            <img src="<?= esc_url($imgs[0]) ?>" style="width: 100%;">
                        </div>
                    </div>
            <?php }  } ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>