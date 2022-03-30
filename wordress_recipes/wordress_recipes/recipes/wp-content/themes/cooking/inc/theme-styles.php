<?php

function cooking_register_styles()
{

  /**
   * TDWM : Déclarer des feuilles de styles
   * https://developer.wordpress.org/reference/functions/wp_register_style/
   * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
   *
   * @package Cooking
   */

  /*
  echo
    '<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Neucha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="'.get_template_directory_uri().'/style.css">';
*/
  wp_register_style(
    'google',
    '//fonts.googleapis.com/css2?family=Cookie&family=Neucha&display=swap'
  );

  wp_style_add_data('google', 'rel', 'preconnect');

  wp_register_style(
    'main',
    get_template_directory_uri() . '../css/main.css',
    [],
    '1.0',
  );
  wp_enqueue_style('google');
  wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'cooking_register_styles');

/**
 * Rajouter le custom header en CSS
 * avec une balise style insérée dans head
 * @return void
 */
function cooking_styles()
{
  $custom_header = get_custom_header();
  if (empty($custom_header->attachment_id)) {
    return;
  }
  $url_mobile = wp_get_attachment_image_url(
    $custom_header->attachment_id,
    'medium-large'
  );
  $url_tablet = wp_get_attachment_image_url(
    $custom_header->attachment_id,
    'large'
  );
  $url_desktop = wp_get_attachment_image_url(
    $custom_header->attachment_id,
    'full'
  );

  // Générer le code CSS dans une balise style insérée dans le head
  // Sortir de PHP
  ?>
  <style>
      .Header {
          background-image: url(<?=esc_url($url_mobile)?>);
      }

      @media screen and (min-width: 768px) {
          .Header {
              background-image: url(<?=esc_url($url_tablet)?>);
          }
      }

      @media screen and (min-width: 1024px) {
          .Header {
              background-image: url(<?=esc_url($url_desktop)?>);
          }
      }
  </style>
  <?php
}

add_action('wp_head', 'cooking_styles');