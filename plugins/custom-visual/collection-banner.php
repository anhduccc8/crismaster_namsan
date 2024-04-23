<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Banner', 'crismaster'),
            'base' => 'co_banner',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh Desktop', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 1500 x 695', "crismaster")
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh Mobile', 'crismaster'),
                    'param_name' => 'image2',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 480 x 555', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('co_banner','co_banner_func');
function co_banner_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'image2' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image = wp_get_attachment_image_src($image, '');
    }else{
        $image = '';
    }
    if(isset($image2) && $image2!='') {
        $image2 = wp_get_attachment_image_src($image2, '');
    }else{
        $image2 = '';
    }
    ?>
    <section class="section-slide">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12">
                    <div class="main-slide">
                        <img src="<?= esc_url($image[0]) ?>" style="width: 100%;" alt="img-slide" class="img-desktop">
                        <img src="<?= esc_url($image2[0]) ?>" style="width: 100%;" alt="img-slide" class="img-mobile">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>