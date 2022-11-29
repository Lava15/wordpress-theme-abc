<?php get_header(); ?>

<?php while (have_posts()):
    the_post(); ?>
    <section class="page">
        <?php $parentID = wp_get_post_parent_id(get_the_ID()); ?>
        <?php if ($parentID): ?>
            <div class="page__breadcrumbs">
                <a href="<?= get_permalink($parentID) ?>"><i class="fa fa-home" aria-hidden="true"></i>Back
                    to <?= get_the_title($parentID) ?> </a>
                <span><?php the_title() ?></span>
            </div>
        <?php endif; ?>

        <div class="page-wrapper">
            <div class="page-wrapper__banner"> PAGE'S BANNER</div>
            <div class="page-wrapper__content">
                <?php the_content() ?>
            </div>
        </div>

        <?php if ($parentID): ?>
            <?php $currentPage = $parentID; ?>
            <?php $findPage = get_pages([
                'child_of' => get_the_ID()
            ]); ?>
            <div class="page__links">
            <h2><a href="<?= get_permalink($parentID); ?>"><?= get_the_title($parentID) ?></a></h2>
            <ul>
        <?php else: ?>
            <?php $currentPage = get_the_ID(); ?>

            <?php wp_list_pages([
                'title_li' => NULL,
                'child_of' => $currentPage
            ]); ?>
            </ul>
            </div>
        <?php endif; ?>

    </section>
<?php endwhile; ?>

<?php get_footer() ?>


