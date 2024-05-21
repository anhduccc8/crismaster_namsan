<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Showroom - 2 ảnh tròn bé', 'crismaster'),
            'base' => 'showroom_2_image_small',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'attach_images',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'images',
                    'value' => '',
                    'description' => esc_html__('Nhập 2 Hình ảnh có kích thước vuông 720 x 720', "crismaster")
                ),

            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('showroom_2_image_small','showroom_2_image_small_func');
function showroom_2_image_small_func($atts,$content = null){
    extract(shortcode_atts(array(
        'images' => '',
    ),$atts));
    ob_start();
    ?>

    <section class="section-widget" style="margin-top: 100px;">
        <div class="container-fluidd">
            <div class="row" style="margin-top: 10px;">
                <div class="col-12 text-center">
                    <div class="buton-scroll-section">
                        <?php  if (isset($images) && $images != '') {
                            $imagess = explode(',', $images);
                            foreach ($imagess as $img) {
                                $imgs = wp_get_attachment_image_src($img, '');
                                $caption = wp_get_attachment_caption($img); ?>
                                <a class="btn-scroll" href="#abstract">
                                    <img src="<?= esc_url($imgs[0]) ?>" style="max-width: 88px;">
                                    <span class="title-btn-scroll btn-hover-line"><?= esc_attr($caption) ?></span>
                                </a>
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