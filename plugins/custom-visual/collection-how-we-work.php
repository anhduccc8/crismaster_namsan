<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection How We Work - Home', 'crismaster'),
            'base' => 'collection_how_we_work',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 980 x 423', "crismaster")
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
add_shortcode('collection_how_we_work','collection_how_we_work_func');
function collection_how_we_work_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'des' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>

    <section class="section-widget space-section" style="background-color: #f7f6f9; padding: 50px 0 70px; margin-top: 0;">
        <div class="container-fluidd">
            <div class="row align-center">
                <div class="col-12 col-md-8">
                    <div class="column-img">
                        <img src="<?= esc_url($image_link[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="column-content mw-450 content-center">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>