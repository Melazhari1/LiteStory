<?php
function display_blogs($count = 2)
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
?>
        <div class="blogs">
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <div class="blog">
                    <div class="content">
                        <div class="img">
                            <?php if (has_post_thumbnail()) { ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php } ?>
                        </div>
                        <span class="category"><?php the_category(', '); ?></span>
                        <h2 class="title"><?php the_title(); ?></h2>
                        <p class="date"><?php echo get_the_date(); ?></p>
                        <div class="description"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="author">
                            <?php echo get_avatar(get_the_author_meta('ID')); ?>
                            <span class="name"><?php the_author(); ?></span>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
<?php
        // Pagination
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        $pagination_links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $query->max_num_pages,
            'type' => 'array',
            'prev_next' => false, // Remove previous and next links
        ));

        if (!empty($pagination_links)) {
            echo '<div class="pagination"><ul>';
            foreach ($pagination_links as $link) {
                echo '<li class="page-item">' . $link . '</li>';
            }
            echo '</ul></div>';
        }
        wp_reset_postdata();
    else:
        echo 'No posts found.';
    endif;
}
?>