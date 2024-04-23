<?php
get_header('short');

if(have_posts()):
    while ( have_posts() ) : the_post();
        $single_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
    ?>
        <main class="site-content">
            <section class="section-widget section-product-single">
                <div class="container-fluidd">
                    <div class="row">
                        <div class="col-12 col-lg-8 pr-70" >
                            <div class="column-img-style text-center" style="background-color: #f0f0f0;">
                                <img src="<?= esc_url($single_image) ?>" style="" alt="<?= the_title() ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="column-content-product mw-400" style="padding-top: 30px;">
                                <h3 class="heading title-product" style="margin-bottom: 3px;">
                                    <span style="font-weight: 300;"><?= the_title() ?></span>
                                </h3>
                                <div class="sub-heading product-category" style="font-weight: 700; font-size: 14px;">
                                    <?php
                                    $post_categories = get_the_terms(get_the_ID(), 'collection_type');
                                    if ($post_categories && !is_wp_error($post_categories)) {
                                        $category_names = array();
                                        foreach ($post_categories as $category) {
                                            $category_names[] = $category->name;
                                        }
                                        $category_list = implode(', ', $category_names);
                                        echo $category_list;
                                    }
                                    ?>
                                </div>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?= get_template_part('template-parts/email-register');?>
        </main>
    <?php
    endwhile;
endif;
get_footer();
?>