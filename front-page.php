<?php get_header(); ?>
<main>
  <?php if ( have_posts() ): ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="front-page">
        <?php the_content(); ?>
      </div>
    <?php endwhile; // end of the loop. ?>    
  <?php endif; ?>
</main>
<?php get_footer(); ?>