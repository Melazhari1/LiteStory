<?php
    get_header();
    include_once 'blogs.php';
    $title_home = get_theme_mod('title_home', '');
    $description_home = get_theme_mod('description_home', '');
?>
<div class="hero">
    <h1><?= $title_home ?></h1>
    <p><?= $description_home ?></p>
</div>
<?php display_blogs(); ?>
<?php get_footer(); ?>
