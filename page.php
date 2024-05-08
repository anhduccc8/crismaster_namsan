<?php
/*
*Template Name: Home Page
*
*/ 
get_header();

$theme_option = get_option('theme_option');
?>
<?php
$page_id = get_queried_object_id();
if(have_posts()):
    while ( have_posts() ) : the_post(); ?>
        <main class="site-content <?php if ($page_id == '21' || $page_id == '117'){ echo 'collection-page'; } ?>">
            <?php the_content(); ?>
            <?= get_template_part('template-parts/email-register');?>
        </main>
    <?php
    endwhile;
endif; ?>
<?php
get_footer();
?>
