<?php
/*
*Template Name: Page Contact
*
*/
get_header();

$theme_option = get_option('theme_option');
?>
<?php
$page_id = get_queried_object_id();
if(have_posts()):
    while ( have_posts() ) : the_post(); ?>
        <main class="site-content <?php if ($page_id == '21'){ echo 'collection-page'; } ?>">
            <?php the_content(); ?>
        </main>
    <?php
    endwhile;
endif; ?>
<?php
get_footer();
?>
