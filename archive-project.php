<?php get_header(); ?>

<main class="w-100 pb-5">
  <article>
    <h2 class="text-center mt-3 mt-md-5 mb-3"><?php echo get_option('project_archive_title'); ?></h2>
    <p class="text-center mb-5"><?php echo get_option('project_archive_description') ?? ''; ?></p>
    <div class="bezimeni-archive">
    <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();

          get_template_part('loop-templates/archive', 'project', [
            'title'          => get_the_title(),
            'excerpt'        => get_the_excerpt(),
            'permalink'      => get_permalink(),
            'featured_image' => get_the_post_thumbnail(null, 'large', ['class' => 'object-fit-cover w-100 rounded-3'])
          ]);
        }
      }
    ?>
    </div>
  </article>
</main>


<?php get_footer();