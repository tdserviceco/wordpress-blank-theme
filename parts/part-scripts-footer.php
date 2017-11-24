<?php // check if the repeater field has rows of data
  if( have_rows('scripts-repeater-footer', 'option') ):
    // loop through the rows of data
      while ( have_rows('scripts-repeater-footer','option') ) : the_row();
          $script = get_sub_field('script', 'option');
          echo $script;
      endwhile;
  endif; ?>