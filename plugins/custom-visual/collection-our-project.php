<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Our Project - Home', 'crismaster'),
            'base' => 'collection_our_project',
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
                    'type' => 'param_group',
                    'heading' => esc_html__('Thêm các project/collection','crismaster'),
                    'param_name' => 'details',
                    'value' => '',
                    'description' => esc_html__('','crismaster'),
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Hình Ảnh','crismaster'),
                            'param_name' => 'simage',
                            'value' => '',
                            'description' => esc_html__('Nên nhập ảnh vuông 800 x 800',"crismaster")
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Text chính','crismaster'),
                            'param_name' => 'stitle1',
                            'value' => '',
                            'description' => esc_html__('',"crismaster")
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Text phụ','crismaster'),
                            'param_name' => 'stitle2',
                            'value' => '',
                            'description' => esc_html__('',"crismaster")
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Đi đến Link','crismaster'),
                            'param_name' => 'slink',
                            'value' => '',
                            'description' => esc_html__('',"crismaster")
                        ),
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link view all','crismaster'),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__('',"crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_our_project','collection_our_project_func');
function collection_our_project_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'details' => '',
        'link' => '',
    ),$atts));
    ob_start();
    ?>

    <section class="section-widget section-bgr-grid" style="background-image: url('assets/image/bgr-section-01.png');">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="heading" style="margin-bottom: 40px;">
                        <?= isset($title) ? urldecode(base64_decode($title)) : ''; ?>
                    </h3>
                </div>
            </div>
            <div class="row wrap-grid-fields text-center">
            <?php if(isset($details) && $details != ''){
                $detailss = vc_param_group_parse_atts($details,'');
                foreach ($detailss as $dca ) {
                    if(isset($dca['simage']) && $dca['simage']!='') {
                        $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                    }
                    ?>
                    <div class="col-12 col-sm-6 col-lg-4 item">
                        <a href="<?= esc_url($dca['slink']) ?>" class="wrap-item-box">
                            <div class="wrap-img">
                                <img src="<?= esc_url($dca['simage'][0]) ?>" style="width: 100%;">
                            </div>
                            <h3 class="heading">
                                <?= esc_attr($dca['stitle1']) ?> <br><?= esc_attr($dca['stitle2']) ?>
                            </h3>
                        </a>
                    </div>
                <?php  } } ?>

                <div class="col-12 button-cms" style="margin-top: 10px;">
                    <a href="<?= $link ?>" class="btn-main"><?= esc_html__('VIEW ALL PROJECTS','crismaster') ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>