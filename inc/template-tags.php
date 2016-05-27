<?php

/**
 * Outputs site info for display on non-single pages
 *
 * @since Independent Publisher 1.0
 */
function independent_publisher_site_info()
{
    if (get_header_image()) :
        ?>
        <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name',
                        'display')); ?>" rel="home">
            <img class="no-grav" src="<?php echo esc_url(get_header_image()); ?>" height="<?php echo absint(get_custom_header()->height); ?>" width="<?php echo absint(get_custom_header()->width); ?>" alt="<?php echo esc_attr(get_bloginfo('name',
                        'display')); ?>" />
        </a>
        <?php
    endif; ?>
    <h1 class="site-title">
        <?php
        $siteName = trim(get_bloginfo('name'));
        $exploded = preg_split('/\s+/', $siteName);
        $i = 0;
        $spannedNameArray = array_map(function($word) use ($i) {
            return sprintf('<span>%s</span>', $word);
        }, $exploded);
        $spannedName = implode('', $spannedNameArray);
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?= $spannedName ?></a>
    </h1>
    <h2 class="site-description"><?php bloginfo('description'); ?></h2>
    <?php
    get_template_part('menu', 'social');
}
