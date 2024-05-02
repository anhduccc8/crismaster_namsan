<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Video', 'crismaster'),
            'base' => 'co_video_bg',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link', 'crismaster'),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__('Không cần nhập gì ở đây cả', "crismaster")
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('co_video_bg','co_video_bg_func');
function co_video_bg_func($atts,$content = null){
    extract(shortcode_atts(array(
        'link' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-slide">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-12">
                    <div class="main-slide">
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe src="https://player.vimeo.com/video/938117782?badge=0&amp;autoplay=1&amp;muted=1&amp;loop=1&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Leading beyond Possible">
                            </iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>