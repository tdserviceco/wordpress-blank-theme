<?php get_header(); ?>
<main> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php if( !empty( get_the_content() ) ): ?>
    <?php echo get_the_content() ?>
  <?php endif; endwhile; ?>
<?php endif; ?>
</main>
<?php get_footer(); ?>