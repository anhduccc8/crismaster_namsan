<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Nổi bật + Video', 'crismaster'),
            'base' => 'collection_the_best_video',
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
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_the_best_video','collection_the_best_video_func');
function collection_the_best_video_func($atts,$content = null){
    extract(shortcode_atts(array(
        'des' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-widget section-bgr-03" style="margin-top: 50px; background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-02.webp');">
        <div class="container-fluiddd">
            <div class="row align-center">
                <div class="col-12 col-md-8">
                    <div class="column-img">
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe src="https://player.vimeo.com/video/938136391?badge=0&amp;autoplay=1&amp;muted=1&amp;loop=1&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Leading beyond Possible">
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="column-content mw-450 content-center">
                        <div class="sub-heading"><img src="<?= get_template_directory_uri() ?>/assets/image/img-text.png" style="max-width: 365px; margin-left: -20px;" alt="img-slide"></div>
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