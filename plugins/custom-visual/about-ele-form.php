<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'About element form', 'crismaster'),
            'base' => 'about_ele_form',
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
add_shortcode('about_ele_form','about_ele_form_func');
function about_ele_form_func($atts,$content = null){
    extract(shortcode_atts(array(
        'des' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-widget mb-30px">
        <div class="container-fluiddd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="heading" style="margin-bottom: 30px; font-size: 20px;">
                        <?= esc_html__('LIÊN HỆ VỚI CHÚNG TÔI','crismaster') ?>
                    </h3>
                </div>
            </div>
            <div class="row form-contact-us mt-30">
                <div class="col-12" style="padding: 0;">
                    <div class="form-box">
                        <?= do_shortcode('[contact-form-7 id="143273b" title="Form Contact"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>