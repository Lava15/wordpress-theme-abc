<?php get_header(); ?>

<main class="main">
    <div class="main__heading">
        <div class="main__heading-title">
            Newspaper
        </div>
    </div>

    <div class="main__news">
        <?php $recentNews = new WP_Query([
            'posts_per_page' => 2
        ]) ?>

        <?php while ($recentNews->have_posts()):
            $recentNews->the_post();
            ?>
            <a href="<?php the_permalink() ?>">
                <span> <?php the_time('M') ?></span>
                <span><?php the_time('d') ?> </span>
            </a>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <?= wp_trim_words(get_the_content(), 18) ?>
            <hr>
            <h2><a href="<?php the_permalink() ?>">Read More</a></h2>
        <?php endwhile; ?>
        <a href="<?= site_url('/blog') ?>">View all news</a>
        <?php wp_reset_postdata() ?>
    </div>


</main>


<?php get_footer() ?>
