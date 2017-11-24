<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
} 

$image = get_field('image');
$text = get_field('text');
?>

<?php if( !empty($image) ): ?>
  <div class="hero hero-big" style="background-image: url( <?php echo $image['sizes']['hero'] ?> )">
    <?php if ( !empty($text) ): ?>
    <div class="hero-content">
      <p><?php echo $text ?></p>
    </div>
    <?php endif ?> 
  </div>
<?php endif ?>