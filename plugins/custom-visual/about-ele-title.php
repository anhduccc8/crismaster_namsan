<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'About element title', 'crismaster'),
            'base' => 'about_ele_title',
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
add_shortcode('about_ele_title','about_ele_title_func');
function about_ele_title_func($atts,$content = null){
    extract(shortcode_atts(array(
        'des' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-widget">
        <div class="container-fluiddd">
            <div class="row">
                <div class="col-12 text-center">
                    <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>