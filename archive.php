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
<main class="site-content collection-page">
    <section class="section-widget section-grid-collection section-bgr" style="margin-top: 50px; padding: 70px 0 50px; background-image: url('<?= get_template_directory_uri() ?>/assets/image/bgr-section-01.png');">
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
<?php
get_footer();
?>
