<form action="<?php echo home_url('/'); ?>" method="get" class="search-form">
	<input type="text" name="s" id="s" value="<?php echo get_search_query(); ?>" class="search-field" placeholder="<?php esc_attr_e('Type to start your search', 'wavy'); ?>" aria-label="<?php esc_attr_e('Type to start your search', 'wavy'); ?>" required>
	<button type="submit" class="submit epcl-button wave-button icon" aria-label="<?php esc_attr_e('Submit', 'wavy'); ?>">
        <svg class="icon large main-color"><use xlink:href="<?php echo EPCL_THEMEPATH; ?>/assets/images/svg-icons.svg#search-icon"></use></svg> 
        <?php esc_html_e('Search', 'wavy'); ?>
    </button>
</form>