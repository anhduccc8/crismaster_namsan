<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Showroom banner', 'crismaster'),
            'base' => 'showroom_banner',
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
                    'description' => esc_html__('Nhập Hình ảnh có kích thước vuông', "crismaster")
                ),

            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('showroom_banner','showroom_banner_func');
function showroom_banner_func($atts,$content = null){
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

    <section class="section-slide">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12">
                    <div class="main-slide-update">
                        <!-- <img src="assets/image/img-section-collection.jpg" style="width: 100%;" alt="img-slide" class="img-desktop">
                        <img src="assets/image/img-section-collection-mobile.jpg" style="width: 100%;" alt="img-slide" class="img-mobile"> -->

                        <div class="content-slide-column">
                            <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
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