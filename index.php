<?php get_header(); ?>

<main class="main">
    <h1 class="main__title">Newspaper</h1>
</main>

<?php while (have_posts()):
    the_post();
    ?>
    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    <?php the_content() ?>
    <hr>
<?php endwhile; ?>

<?php get_footer() ?>
