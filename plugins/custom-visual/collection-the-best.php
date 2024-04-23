<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Nổi bật', 'crismaster'),
            'base' => 'collection_the_best',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Hình Ảnh', 'crismaster'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__('Hình ảnh có kích thước 2000 x 1080', "crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'crismaster'),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Nội dung chính','crismaster'),
                    'param_name' => 'des',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Collection ID','crismaster'),
                    'param_name' => 'co_id',
                    'value' => '',
                    'description' => esc_html__('Có thể nhập id collection',"crismaster")
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Hoặc nhập link đi đến collection','crismaster'),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__('',"crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_the_best','collection_the_best_func');
function collection_the_best_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'title' => '',
        'des' => '',
        'co_id' => '',
        'link' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>
    <section class="section-widget section-bgr-03" style="margin-top: 50px; background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-02.webp');">
        <div class="container-fluiddd">
            <div class="row align-center">
                <div class="col-12 col-md-8">
                    <div class="column-img">
                        <img src="<?= esc_url($image_link[0]) ?>" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="column-content mw-450 content-center">
                        <div class="sub-heading"><img src="<?= get_template_directory_uri() ?>/assets/image/img-text.webp" style="max-width: 236px;" alt="img-slide"></div>
                        <h3 class="heading" style="font-size: 22px;">
                            [ <?= $title ?> ]
                        </h3>
                        <div class="description">
                            <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                        </div>
                        <div class="button-cms" style="margin-top: 20px;">
                            <?php if (isset($link) && $link != ''){ ?>
                                <a href="<?= esc_attr($link) ?>" class="btn-main text-uppercase" style="background-color: #b8acd6 !important; border-color: #b8acd6;"><?= esc_html__('Xem chi tiết','crismaster') ?></a>
                            <?php }else{ ?>
                                <a href="<?=  get_permalink($co_id) ?>" class="btn-main text-uppercase" style="background-color: #b8acd6 !important; border-color: #b8acd6;"><?= esc_html__('Xem chi tiết','crismaster') ?></a>
                            <?php } ?>
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