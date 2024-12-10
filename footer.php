
        <?php get_template_part('partials/footer'); ?>

        <div class="clear"></div>
    </div>
    <!-- end: #wrapper --> 

    <!-- W3TC-include-css -->
    <!-- W3TC-include-js-head -->

    <?php wp_footer(); ?>     
    
    <?php if( epcl_get_option('enable_wave_effect', true ) ): ?>
        <?php get_template_part('partials/svg-waves'); ?>
    <?php endif; ?>

    <?php epcl_render_demo_button(); ?>
    
    </body>
</html>
