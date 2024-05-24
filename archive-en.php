<?php
$page_title = '';
switch( true ){
    case is_day():
        $page_title = esc_html__( 'Ngày: ', 'crismaster' ) . get_the_date();
        break;
    case is_month():
        $page_title = esc_html__( 'Tháng: ', 'crismaster' ) . get_the_date( esc_html_x( 'F Y', 'hàng tháng', 'crismaster' ) );
        break;
    case is_year():
        $page_title = esc_html__( 'Năm: ', 'crismaster' ) . get_the_date( esc_html_x( 'Y', 'hàng năm', 'crismaster' ) );
        break;
    case is_search():
        $page_title = esc_html__( 'Kết quả cho : ', 'crismaster' ) . get_search_query();
        break;
    case is_tag():
        $page_title = esc_html__( 'Tag: ', 'crismaster' ) . single_tag_title( '', false );
        break;
    case is_category():
        $page_title = esc_html__( 'Category: ', 'crismaster' ) . single_cat_title( '', false );
        break;
    case is_404():
        $page_title = esc_html__( 'OOPS! FILE NOT FOUND', 'crismaster' );
        break;
    default:
        $page_title = single_term_title( '', false );
        break;
}
get_header();
?>
<!--đang đóng cái này, hiển thị taxonomy và list taxonomy đó-->
<main class="hide site-content collection-page">
    <section class="section-widget section-grid-collection section-bgr" style="margin-top: 50px; padding: 70px 0 50px; background-image: url('<?= get_template_directory_uri() ?>/<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
        <div class="container-fluiddd">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class ="heading">
                        <?= $page_title; ?>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    <section class="section-widget" style="margin-top: 70px;">
        <div class="container-fluidd">
            <div class="row wrap-grid-fields grid-product text-center">
                <?php
                    if(have_posts()):
                    while ( have_posts() ) : the_post();
                        $single_image = get_the_post_thumbnail_url(get_the_ID(), 'large');?>
                    <div class="col-12 col-sm-6 col-lg-3 item">
                        <div  class="wrap-item-product">
                            <div class="item-img">
                                <img src="<?= esc_url($single_image) ?>" style="width: 100%;">
                            </div>
                            <div class="item-content">
                                <a href="<?= get_the_permalink() ?>" class="btn-main btn-white btn-add-wishlist">
                                    <i class="fa-solid fa-eye"></i>
                                    <?= esc_html__('Xem chi tiết','crismaster') ?>
                                </a>
                            </div>
                        </div>
                        <h5 class="heading-product">
                            <?= the_title() ?>
                        </h5>
                    </div>
                    <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
    </section>
    <?= get_template_part('template-parts/email-register');?>
</main>

<main class="site-content">
    <section class="section-widget section-bgr-04 mt-70">
        <div class="container-fluiddd">
            <div class="row align-center">
                <div class="col-lg-4 col-md-6 col-sm-12 respon-order-2">
                    <div class="column-content-bgr content-center">
                        <h3 class="heading style-03">
                            <span style="font-size: 30px; font-weight: 300; display: inline-block; margin-bottom: 8px;">MASCOT </span> <br> DESIGN <br> PRODUCE
                        </h3>
                        <div class="description bold">
                            55 Van Mieu, Van Mieu Ward,<br>Dong Da Dist, Hanoi, Vietnam
                        </div>
                        <div class="description" style="margin-top: 13px;">
                            And many more!<br>Contact us to book a visit
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="column-img-bgr">
                        <img src="<?= get_template_directory_uri() ?>/assets/image/anh6_cus4.png" style="width: 100%;transform: translateX(15px);">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-widget" style="margin-top: 100px;">
        <div class="container-fluidd">
            <div class="row" style="margin-top: 10px;">
                <div class="col-12 text-center">
                    <div class="buton-scroll-section">
                        <a class="btn-scroll" href="">
                            <img src="<?= get_template_directory_uri() ?>/assets/image/img-btn-scroll-01.png" style="max-width: 88px;">
                            <span class="title-btn-scroll btn-hover-line">RAW PRODUCT</span>
                        </a>
                        <a class="btn-scroll" href="">
                            <img src="<?= get_template_directory_uri() ?>/assets/image/img-btn-scroll-02.png" style="max-width: 88px;">
                            <span class="title-btn-scroll btn-hover-line">FINAL PRODUCT</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-widget section-bgr-05" style="margin-top: 60px; background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
        <div class="container-fluidd">
            <div class="row row-custom align-center space-between">
                <div class="row col-md-8">
                    <div class="col-12 col-md-7">
                        <div class="column-img pr-20">
                            <img src="<?= get_template_directory_uri() ?>/assets/image/img-column-figured-02.png" style="width: 100%;" alt="img-slide">
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="column-content content-center text-left-sm">
                            <h3 class="heading style-04">
                                <span style="font-size: 20px; font-weight: 300; display: inline-block; margin-bottom: 0px;">KAWS </span> <br> COLLECTION<br> PRODUCE
                            </h3>
                            <div class="description" style="margin-top: -10px;">
                                And many more!<br>Contact us to book a visit
                            </div>
                            <img src="<?= get_template_directory_uri() ?>/assets/image/img-column-figured-03.png" style="width: 100%; margin-top: 15px;" alt="img-slide">
                        </div>
                    </div>
                    <div class="row-content col-12" style="margin-top: 40px;">
                        <h3 class="heading style-04">
                            <span style="font-size: 20px; font-weight: 300; display: inline-block; margin-bottom: 0px;">KAWS </span> <br> SIZE 600 mm/ 900 mm/ 1200 mm<br>PRODUCE
                        </h3>
                        <div class="description" style="margin-top: -10px;">
                            And many more!<br>Contact us to book a visit
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="img-column-figured">
                        <img src="<?= get_template_directory_uri() ?>/assets/image/img-column-figured.png" style="width: 100%;" alt="img-slide">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>
