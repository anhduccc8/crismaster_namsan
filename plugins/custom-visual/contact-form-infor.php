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
    ?>

    <section class="section-widget" style="background-color: #f0f0f0; padding: 80px 0;">
        <div class="container-fluiddd">
            <div class="row align-center">
                <div class="col-12 col-lg-8">
                    <div class="form-contact-us-02">
                        <h3 class="heading" style="margin-bottom: 30px; font-size: 20px;">
                            GET IN TOUCH!
                        </h3>
                        <div class="form-box">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-input mb-40">
                                            <input type="text" class="form-control" placeholder="First Name*">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-input mb-40">
                                            <input type="text" class="form-control" placeholder="Last Name*">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input mb-40">
                                    <input type="email" class="form-control" placeholder="Email*">
                                </div>
                                <div class="form-input mb-40">
                                    <input type="number" class="form-control" placeholder="Phone*">
                                </div>
                                <div class="form-input mb-40">
                                    <input type="text" class="form-control" placeholder="Company*">
                                </div>
                                <div class="dropdown-section">
                                    <select id="dropdownAddress" onchange="handleSelectionChange()">
                                        <option value="option1">Địa điểm</option>
                                        <option value="option2">Thành phố Hà Nội</option>
                                        <option value="option3">Thành phố Bắc Giang</option>
                                        <option value="option3">Thành phố Bắc Ninh</option>
                                        <option value="option3">Thành phố Hòa Bình</option>
                                        <option value="option3">Thành phố Thái Bình</option>
                                        <option value="option3">Thành phố Đà Nẵng</option>
                                        <option value="option3">Thành phố Cà Mau editttt</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="form-input mb-40">
                                    <label class="label-textarea" for="">Message</label>
                                    <textarea type="text" class="form-control"></textarea>
                                </div>
                                <div class="check-box mt-40">
                                    <input name="gender" type="radio" value="Nam" />
                                    <span>Yes, I want to subscribe to the newsletter.</span>
                                </div>
                                <button type="submit" class="btn-main btn-form-contact" style="width: 100%;">SUBMIT</button>
                            </form>
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