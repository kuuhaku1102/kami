<?php get_header(); ?>
<main style="max-width:700px; margin:40px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php if (has_post_thumbnail()) : ?>
      <div style="margin-bottom:20px;"> <?php the_post_thumbnail('large'); ?> </div>
    <?php endif; ?>
    <div><?php the_content(); ?></div>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>