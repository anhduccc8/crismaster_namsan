<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Partner - Home', 'crismaster'),
            'base' => 'collection_partner',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Title','crismaster'),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
                array(
                    'type' => 'attach_images',
                    'heading' => esc_html__('Hình Ảnh','crismaster'),
                    'param_name' => 'images',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập nhiều ảnh vuông 500 x 500',"crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_partner','collection_partner_func');
function collection_partner_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'images' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-product space-section">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="heading" style="margin-bottom: 50px;">
                        <?= isset($title) ? urldecode(base64_decode($title)) : ''; ?>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 owl-carousel-section">
                    <div class="partner owl-carousel owl-theme">
                        <?php
                        $t = 1;
                        $is_mobile = wp_is_mobile();
                        if (isset($images) && $images != '') {
                            $imagess = explode(',', $images);
                            $count = count($imagess);
                            foreach ($imagess as $img) {
                                $imgs = wp_get_attachment_image_src($img, '');
                                if ($is_mobile){ ?>
                                    <div class="item none-desktop">
                                        <div class="wrap-item relative">
                                            <a href="#" class="link-box"></a>
                                            <div class="wrap-image">
                                                <img class="item-icon-svg" src="<?= esc_url($imgs[0]) ?>" style="max-width: 110px" alt="Svg icon">
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{
                                    if ($t%2 == 1){ ?>
                                        <div class="item none-mobile">
                                    <?php } ?>
                                    <div class="wrap-item relative">
                                        <a href="#" class="link-box"></a>
                                        <div class="wrap-image">
                                            <img class="item-icon-svg" src="<?= esc_url($imgs[0]) ?>" style="max-width: 110px" alt="Svg icon">
                                        </div>
                                    </div>
                                    <?php if ($t%2 == 0){ ?>
                                        </div>
                                    <?php }
                                } $t++; }
                        if ($count%2==1){ ?>
                            </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
?>