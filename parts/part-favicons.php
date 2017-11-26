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