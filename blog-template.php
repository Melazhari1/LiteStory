<?php
/*
Template Name: Blog
*/
get_header();
include_once 'blogs.php';
?>
<div class="hero">
    <h1>Blog</h1>
</div>
<?php display_blogs(6); ?>

<?php
get_footer();
?>