<?php get_header(); ?>
<?php
$obj = get_queried_object();
$category_meta = get_term_meta( $obj->term_id, 'epcl_post_categories', true );
$image_url = '';
if( !empty($category_meta) && !empty($category_meta['archives_image']) ){
    $thumb = wp_get_attachment_image_src( $category_meta['archives_image']['id'], 'epcl_classic' );
    $image_url = '';
    if( !empty($thumb) ){
        $image_url = $thumb[0];
    }    
}
?>
<!-- start: #archives-->
<main id="archives" class="main">

    <div class="grid-container grid-medium">
        <div class="tag-description bg-box <?php if( !$image_url) echo 'no-image'; ?>">
            <div class="left grid-60 tablet-grid-60 np-mobile">
                <h1 class="title bordered no-margin"><?php single_cat_title(); ?><svg class="decoration"><use xlink:href="<?php echo EPCL_THEMEPATH; ?>/assets/images/svg-icons.svg#title-decoration"></use></svg></h1>
                <div class="total"><?php esc_html( printf( _n( '%1$s <span class="dot"></span> Article in this Category', '%1$s &nbsp;<span class="dot"></span> Articles in this Category', $obj->count, 'wavy'), number_format_i18n( $obj->count ) ) ); ?></div>
                <?php if( term_description() ): ?>
                    <div class="tag-descripcion">
                        <?php echo term_description(); ?>
                    </div>
                <?php endif; ?>
                <a href="#post-list" class="epcl-button gradient-button icon wave-button scrollto">
                    <svg><use xlink:href="<?php echo EPCL_THEMEPATH; ?>/assets/images/svg-icons.svg#double-arrow-icon"></use></svg>
                    <?php echo esc_html__('Explore', 'wavy'); ?>
                </a>
            </div>

            <?php if( $image_url ): ?>
                <div class="right grid-40 tablet-grid-40 hide-on-mobile np-tablet np-mobile">
                    <img class="fullwidth" loading="lazy" src="<?php echo esc_url($image_url); ?>" alt="<?php single_cat_title(); ?>">
                </div>
            <?php endif; ?>

            <div class="clear"></div>
            <svg class="bg-decoration" width="327" height="265" viewBox="0 0 327 265" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_872_366)">
                <path d="M327 114.469C291.048 114.469 272.813 100.796 255.183 87.5686C238.744 75.2314 223.208 63.5938 191.333 63.5938C159.458 63.5938 143.923 75.2473 127.477 87.5686C109.847 100.796 91.6183 114.469 55.66 114.469C19.7017 114.469 1.47981 100.796 -16.1502 87.5686C-32.5898 75.2314 -48.125 63.5938 -80 63.5938V0C-44.0483 0 -25.8198 13.6727 -8.18977 26.9002C8.24984 39.2373 23.785 50.875 55.66 50.875C87.535 50.875 103.07 39.2214 119.51 26.9002C137.146 13.6727 155.375 0 191.333 0C227.292 0 245.52 13.6727 263.15 26.9002C279.59 39.2373 295.125 50.875 327.007 50.875V114.469H327Z"/>
                </g>
                <g clip-path="url(#clip1_872_366)">
                <path d="M327 228.938C291.048 228.938 272.813 215.265 255.183 202.037C238.744 189.7 223.208 178.062 191.333 178.062C159.458 178.062 143.923 189.716 127.477 202.037C109.847 215.265 91.6183 228.938 55.66 228.938C19.7017 228.938 1.47981 215.265 -16.1502 202.037C-32.5898 189.7 -48.125 178.062 -80 178.062V114.469C-44.0483 114.469 -25.8198 128.141 -8.18977 141.369C8.24984 153.706 23.785 165.344 55.66 165.344C87.535 165.344 103.07 153.69 119.51 141.369C137.146 128.141 155.375 114.469 191.333 114.469C227.292 114.469 245.52 128.141 263.15 141.369C279.59 153.706 295.125 165.344 327.007 165.344V228.938H327Z"/>
                </g>
                <g clip-path="url(#clip2_872_366)">
                <path d="M327 343.406C291.048 343.406 272.813 329.734 255.183 316.506C238.744 304.169 223.208 292.531 191.333 292.531C159.458 292.531 143.923 304.185 127.477 316.506C109.847 329.734 91.6183 343.406 55.66 343.406C19.7017 343.406 1.47981 329.734 -16.1502 316.506C-32.5898 304.169 -48.125 292.531 -80 292.531V228.938C-44.0483 228.938 -25.8198 242.61 -8.18977 255.838C8.24984 268.175 23.785 279.812 55.66 279.812C87.535 279.812 103.07 268.159 119.51 255.838C137.146 242.61 155.375 228.938 191.333 228.938C227.292 228.938 245.52 242.61 263.15 255.838C279.59 268.175 295.125 279.812 327.007 279.812V343.406H327Z"/>
                </g>
            </svg>
        </div>

    </div>

    <div id="post-list">
        <?php if( empty($epcl_theme) || !$epcl_theme['archive_layout'] || $epcl_theme['archive_layout'] == 'classic' ): ?>
            <?php get_template_part('partials/home-blocks/classic-posts'); ?>
        <?php elseif( $epcl_theme['archive_layout'] == 'classic_sidebar'  ): ?>
            <?php get_template_part('partials/home-blocks/classic-posts-sidebar'); ?>
        <?php elseif( $epcl_theme['archive_layout'] == 'grid_3_cols' || $epcl_theme['archive_layout'] == 'grid_4_cols' ):  ?>
            <?php get_template_part('partials/home-blocks/grid-posts'); ?>
        <?php elseif( $epcl_theme['archive_layout'] == 'grid_sidebar'  ): ?>
            <?php get_template_part('partials/home-blocks/grid-sidebar'); ?>
        <?php endif; ?>
    </div>

</main>
<!-- end: #archives -->

<?php get_footer(); ?>
