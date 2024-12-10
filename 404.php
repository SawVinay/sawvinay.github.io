<?php get_header(); ?>

<!-- start: #page-404 -->
<main id="page-404" class="main epcl-flex epcl-fullheight">

    <!-- start: .center -->
    <div class="grid-container flex-align-middle">
        
        <div class="not-found grid-55">
            <h1 class="title ularge"><span><?php esc_html_e("404", 'wavy'); ?></span><br><?php esc_html_e("Page not found", 'wavy'); ?></h1>
            <p><?php esc_html_e("Unfortunately the page you are looking for is not available.", 'wavy'); ?></p>
            <div class="buttons">
                <a href="<?php echo home_url('/'); ?>" class="epcl-button red-gradient wave-button"><?php esc_html_e("Go back to home", 'wavy'); ?></a>
            </div>
        </div>   

        <?php
        $args = array(
            'post_type' => 'post',
            'showposts' => 3,
            'suppress_filters' => false,
            'meta_key' => '_thumbnail_id'
        );
        $recent_articles = get_posts($args);
        ?>

        <?php if( !empty($recent_articles) ): ?>
            <aside class="grid-40 prefix-5 hide-on-mobile hide-on-tablet">
                <div class="widget widget_epcl_posts_thumbs">
                    <h2 class="title widget-title small fw-normal"><?php esc_html_e("Or check our latest articles...", 'wavy'); ?></h2>
                    <?php foreach($recent_articles as $post): setup_postdata($post); ?>
                        <article <?php post_class('item'); ?>>
                            <div class="info">                    
                                <?php if( has_post_thumbnail() ): ?>
                                    <a href="<?php the_permalink(); ?>" class="thumb translate-effect epcl-loader">
                                        <img class="fullimage cover lazy" src="<?php echo epcl_placeholder(); ?>" data-src="<?php echo get_the_post_thumbnail_url($post, 'medium'); ?>">
                                        <span class="screen-reader-text"><?php the_title(); ?></span>
                                    </a>
                                <?php endif; ?>
                                <div class="right">
                                    <h4 class="title usmall underline-effect"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
                                    <time class="meta-info" datetime="<?php the_time('Y-m-d'); ?>">
                                        <span class="dot small"></span>
                                        <?php the_time( get_option('date_format') ); ?>
                                    </time>	
                                </div>				
                            </div>
                            <div class="clear"></div>
                        </article>
                    <?php endforeach; wp_reset_postdata(); ?>   
                </div>                 
            </aside>          
        <?php endif; ?>
        
        <div class="clear"></div>

    </div>
    <!-- end: .center -->

    <?php get_template_part('partials/footer-fullscreen'); ?>

</main>
<!-- end: #page-404 -->

<?php get_footer(); ?>
