<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php // check if the repeater field has rows of data
  if( have_rows('favicon-repeater', 'option') ):
    // loop through the rows of data
      while ( have_rows('favicon-repeater','option') ) : the_row();
          $image = get_sub_field('image','option');
          $size = get_sub_field('image-size', 'option');
          // display a sub field value
          if( $size === '180x180' ) {
            ?>
            <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $image['sizes']['favicon-large'] ?>">
            <?php
          }
          if( $size === '32x32' ) {
            ?>
            <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $image['sizes']['favicon-medium'] ?>">
            <?php
          }
          if( $size === '16x16' ) {
            ?>
            <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $image['sizes']['favicon-small'] ?>">
            <?php
          }
      endwhile;
  endif; ?>
  <link rel="manifest" href="<?php echo get_template_directory_uri(). '/img/manifest.json'?>">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(). '/img/safari-pinned-tab.svg'?>" color="<?php echo get_field('mobile-theme-color', 'option') ?>">
  <meta name="theme-color" content="<?php echo get_field('mobile-theme-color', 'option') ?>">
  <?php wp_head() ?>
  <?php // check if the repeater field has rows of data
  if( have_rows('scripts-repeater-header', 'option') ):
    // loop through the rows of data
      while ( have_rows('scripts-repeater-header','option') ) : the_row();
          $script = get_sub_field('script', 'option');
          echo $script;
      endwhile;
  endif; ?>
</head>
<body <?php body_class() ?>>
<header>
  <?php wp_nav_menu( array( 'theme_location' => 'header' ) ); ?>
</header>
<?php get_template_part('templates/content','hero');?>