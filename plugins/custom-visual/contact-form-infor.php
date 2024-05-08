<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    try {
        vc_map(array(
            'name' => esc_html__($pre_text . 'Collection Contact Form', 'crismaster'),
            'base' => 'collection_contact_form',
            'class' => '',
            'icon' => 'icon-st',
            'category' => 'Content',
            'params' => array(
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Thêm các Chi nhánh','crismaster'),
                    'param_name' => 'details',
                    'value' => '',
                    'description' => esc_html__('','crismaster'),
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Khu vực','crismaster'),
                            'param_name' => 'title',
                            'value' => '',
                            'description' => esc_html__('Miền Nam, Miền Bắc,...',"crismaster")
                        ),
                        array(
                            'type' => 'param_group',
                            'heading' => esc_html__('Thêm các Chi nhánh của Khu vực','crismaster'),
                            'param_name' => 'details2',
                            'value' => '',
                            'description' => esc_html__('','crismaster'),
                            'params' => array(
                                array(
                                    'type' => 'textfield',
                                    'heading' => esc_html__('Tên chi nhánh','crismaster'),
                                    'param_name' => 'stitle',
                                    'value' => '',
                                    'description' => esc_html__('Miền Nam, Miền Bắc,...',"crismaster")
                                ),
                                array(
                                    'type' => 'textfield',
                                    'heading' => esc_html__('Thông tin','crismaster'),
                                    'param_name' => 'sinfor',
                                    'value' => '',
                                    'description' => esc_html__('Có thể ngăn cách các thông tin bằng dấu ","',"crismaster")
                                ),
                            )
                        ),
                    ),
                ),
            )
        ));
    } catch (Exception $e) {
    }
}
add_shortcode('collection_contact_form','collection_contact_form_func');
function collection_contact_form_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details' => '',
    ),$atts));
    ob_start();
    if (isset($details) && $details != '') {
        $detailss = vc_param_group_parse_atts($details, '');
    }
    $flag = false;
    if (isset($_GET['form_submit']) && $_GET['form_submit'] == 'success'){
        $flag = true;
    }
    ?>

    <section class="section-widget" style="background-color: #f0f0f0; padding: 80px 0;">
        <div class="container-fluiddd">
            <div class="row align-center">
                <div class="col-12 col-lg-8">
                    <div class="form-contact-us-02">
                        <h3 class="heading" style="margin-bottom: 30px; font-size: 20px;">
                            <?= esc_html__('LIÊN HỆ VỚI CHÚNG TÔI','crismaster') ?>
                        </h3>
                        <?php if ($flag){ ?>
                            <span class="text-success" role="alert">
                                <?= esc_html__('Gửi yêu cầu thành công !','crismaster') ?>
                            </span>
                        <?php } ?>
                        <div class="form-box">
                            <?= do_shortcode('[contact-form-7 id="143273b" title="Form Contact"]') ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 column-info-form">
                    <div class="list-info-form">
                        <h3 class="heading"><?= esc_html__('CÁC SHOWROOMS CỦA CHÚNG TÔI','crismaster')?></h3>
                        <div class="sub-heading-bottom">
                            NAM SAN WORLDWIDE
                        </div>
                        <ul class="list-area-form">
                            <?php
                            if (!empty($detailss)){
                                foreach ($detailss as $de) { ?>
                                    <li><a class="smooth-scroll" data-value="#<?= str_replace(' ', '_', strtolower(_convertToSMS($de['title']))); ?>"><?= $de['title'] ?></a></li>
                                <?php }
                            }
                             ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $count = 1;
    if (!empty($detailss)){
        foreach ($detailss as $de) { ?>
            <section class="section-widget <?php if ($count == 1){ echo 'space-section'; } ?>" id="<?= str_replace(' ', '_', strtolower(_convertToSMS($de['title']))); ?>">
                <div class="container-fluidd">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="heading style-02">
                                <?= esc_attr($de['title']) ?>
                            </h3>
                        </div>
                    </div>
                    <?php if (isset($de['details2']) && $de['details2'] != '') {
                        $detailsss = vc_param_group_parse_atts($de['details2'], '');
                        if (!empty($detailsss)){ ?>
                            <div class="row">
                                <?php foreach ($detailsss as $de2){ ?>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="wrap-item-contact">
                                            <h5 class="heading-contact-grid"><?= esc_attr($de2['stitle']) ?></h5>
                                            <?php if (strpos($de2['sinfor'], ',') !== false){
                                                $infor_arr = explode(',',$de2['sinfor'] );
                                            }
                                            if (!empty($infor_arr)){
                                                ?>
                                                <div class="list-item-contact">
                                                <?php
                                                foreach ($infor_arr as $infor){
                                                    if (strpos($infor,'|')){
                                                        $infor2 = explode('|',$infor); ?>
                                                        <a href="<?= esc_attr($infor2[1]) ?>" class="phone"><?= esc_attr($infor2[0]) ?></a>
                                                        <?php
                                                    }else{ ?>
                                                        <a class="phone"><?= esc_attr($infor) ?></a>
                                                    <?php }
                                                } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </section>
        <?php $count++; }
    }
    ?>

    <?php
    return ob_get_clean();
}
?>