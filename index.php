<?php get_header(); ?>

<main class="blog">
    <div class="blog__wrapper">
        <h1><?php the_title() ?></h1>

        <?php while (have_posts()):
            the_post();
            ?>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <div>
                <p>Posted By: <?php the_author_posts_link() ?> on <?php the_time('j.n.y') ?>
                    in <?= get_the_category_list(', ') ?></p>
            </div>

            <div>
                <?php the_excerpt() ?>
                <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
            </div>
            <div class="blog__wrapper-pagination">
                <?= paginate_links() ?>
            </div>
            <hr>
        <?php endwhile; ?>
    </div>
</main>


<?php get_footer() ?>
