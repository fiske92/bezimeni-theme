<?php get_header(); ?>

<main class="w-100">
  <article>
    <h1 class="pt-3 pt-md-5"><?php the_title(); ?></h1>
    <div class="bezimeni-single-project-separator bg-primary"></div>

    <?php the_post_thumbnail('full', ['class' => 'w-100 pb-3 pb-md-5']); ?>

    <?php the_content(); ?>
  </article>
</main>

<?php get_footer(); ?>