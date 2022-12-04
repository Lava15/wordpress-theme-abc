<?php get_header(); ?>

<?php while (have_posts()):
    the_post();
    ?>
    <h2><?php the_title() ?></h2>

    <div class="page__breadcrumbs">
        <a href="<?= site_url('/blog') ?>"><i class="fa fa-home" aria-hidden="true"></i>Blog Home <?= get_the_title() ?>
        </a>
        <span>Posted By: <?php the_author_posts_link() ?> on <?php the_time('j.n.y') ?> in <?= get_the_category_list(', ') ?></span>
    </div>

    <?php the_content() ?>
<?php endwhile; ?>

<?php get_footer() ?>

