<?php get_header(); ?>
<?php
$module_class = '';
if( !is_active_sidebar('epcl_sidebar_home') ){
    $module_class .= ' no-active-sidebar';
}
?>

<!-- start: #archives-->
<main id="archives" class="main grid">

    <!-- start: .content-wrapper -->
    <div class="content-wrapper <?php echo esc_attr($module_class); ?>">

        <div class="grid-container">
            <?php get_template_part('partials/author-box'); ?>
        </div>

        <div id="post-list">
            <?php if( empty($epcl_theme) || !isset($epcl_theme['author_layout']) || $epcl_theme['author_layout'] == 'classic_sidebar' ): ?>
                <?php get_template_part('partials/home-blocks/classic-posts-sidebar'); ?>
            <?php elseif( $epcl_theme['author_layout'] == 'classic'  ): ?>
                <?php get_template_part('partials/home-blocks/classic-posts'); ?>
            <?php elseif( $epcl_theme['author_layout'] == 'grid_3_cols' || $epcl_theme['author_layout'] == 'grid_4_cols' ):  ?>
                <?php get_template_part('partials/home-blocks/grid-posts'); ?>
            <?php elseif( $epcl_theme['author_layout'] == 'grid_sidebar'  ): ?>
                <?php get_template_part('partials/home-blocks/grid-sidebar'); ?>
            <?php endif; ?>
        </div>

    </div>
    <!-- end: .content-wrapper -->

</main>
<!-- end: #archives -->

<?php get_footer(); ?>
