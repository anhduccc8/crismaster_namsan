<?php
$flag = false;
if (isset($_GET['form_submit']) && $_GET['form_submit'] == 'success'){
    $flag = true;
}
?>
<section class="section-widget space-section" id="<?php if ($flag){ echo 'form_submit_success'; } ?>">
    <div class="container-fluidd">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="heading fs-15-mo" style="margin-bottom: 30px; font-size: 20px;"><?= esc_html__('ĐĂNG KÝ ĐỂ NHẬN THÔNG TIN MỚI NHẤT','crismaster') ?></h3>
                <?= do_shortcode('[contact-form-7 id="4497419" title="Form Newsletter"]') ?>
                <?php if ($flag){ ?>
                    <span class="text-success" role="alert">
                        <?= esc_html__('Gửi yêu cầu thành công !','crismaster') ?>
                    </span>
                <?php } ?>
                <div class="description description-form" style="margin-top: 40px;">
                    <?= esc_html__('Đăng ký là bạn đã đồng ý với','crismaster') ?> <a href="#" class="link-text underline"> <?= esc_html__('điều khoản của chúng tôi.','crismaster') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>