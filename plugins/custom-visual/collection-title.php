<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Title', 'crismaster'),
            'base' => 'collection_title',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__('Title', 'crismaster'),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__('', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_title','collection_title_func');
function collection_title_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-widget section-grid-collection section-bgr" style="margin-top: 50px; padding: 70px 0 50px; background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
        <div class="container-fluiddd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="heading">
                        <?= isset($title) ? urldecode(base64_decode($title)) : ''; ?>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>