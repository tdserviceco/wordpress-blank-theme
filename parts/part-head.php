<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php get_template_part('parts/part', 'favicons') ?>
  <link rel="manifest" href="<?php echo get_template_directory_uri(). '/img/manifest.json'?>">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(). '/img/safari-pinned-tab.svg'?>" color="<?php echo get_field('mobile-theme-color', 'option') ?>">
  <meta name="theme-color" content="<?php echo get_field('mobile-theme-color', 'option') ?>">
  <?php wp_head() ?>
  <?php get_template_part('parts/part', 'scripts-header'); ?>
</head>
<body <?php body_class() ?>>
<header>
  <?php name_theme_custom_rules::wp_menu() ?>
</header>
<?php get_template_part('templates/content','hero');?>