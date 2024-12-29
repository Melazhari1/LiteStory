<?php
get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="container-content">
            <div class="hero text-left mb-1">
                <span class="category"><?php the_category(', '); ?></span>
                <h1><?php the_title() ?></h1>
                <p class="date"><?php echo get_the_date(); ?></p>
                <div class="img">
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php } ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="author">
                    <?php echo get_avatar(get_the_author_meta('ID')); ?>
                    <span class="name"><?php the_author(); ?></span>
                </a>
            </div>
            <?php the_content() ?>
            <div class="keep-reading">
                <h3>Keep Reading</h3>
                <?php
                $categories = wp_get_post_categories(get_the_ID());
                $args = array(
                    'category__in' => $categories,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 2,
                    'orderby' => 'rand'
                );
                $related_posts = new WP_Query($args);
                if ($related_posts->have_posts()) {
                    while ($related_posts->have_posts()) {
                        $related_posts->the_post();
                ?>
                        <div class="related-post">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div>
                                        <div class="img-container">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                    </div>
                                <?php } ?>
                                <div>
                                    <h4><?php the_title(); ?></h4>
                                    <p><?= wp_trim_words(get_the_excerpt(), 15, '...');  ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    $args = array(
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 2,
                        'orderby' => 'rand',
                        's' => get_the_title()
                    );
                    $random_posts = new WP_Query($args);
                    if ($random_posts->have_posts()) {
                        while ($random_posts->have_posts()) {
                            $random_posts->the_post();
                        ?>
                            <div class="related-post">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div>
                                            <div class="img-container">
                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?= wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                                    </div>
                                </a>
                            </div>
                <?php
                        }
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="written-by">
                <div class="author-info">
                    <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                    <div class="author-details">
                        <h3 class="author-name">Written by <?php the_author(); ?></h3>
                        <p class="author-description"><?php the_author_meta('description'); ?></p>
                    </div>
                </div>
            </div>
        </div>
<?php endwhile;
endif; ?>
<?php
get_footer();
?>