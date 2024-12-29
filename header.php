<?php
$menu_name = 'main-menu';
$menu = wp_get_nav_menu_object($menu_name);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <header class="header">
            <div class="logo">
                <a href="<?php echo home_url(); ?>">
                    <?= get_bloginfo('name'); ?>
                </a>
            </div>
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
        </header>