<?php
    $menu_name = 'footer-menu';
    $menu = wp_get_nav_menu_object($menu_name);
?>
</div>
    <footer>
        <div class="site-info">
            <nav class="navbar">
                    <ul>
                        <?php if ($menu): ?>
                            <?php $menu_items = wp_get_nav_menu_items($menu->term_id); ?>
                            <?php foreach ($menu_items as $item): ?>
                                <li>
                                    <a href="<?= $item->url ?>"><?= $item->title ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
