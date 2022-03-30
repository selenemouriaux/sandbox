<?php

function cooking_theme_support()
{

  /* #### Gestion des images à la une */
  add_theme_support('post-thumbnails');

  // Activer le support HTML
  add_theme_support(
    'html5',
    [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style',
      'navigation-widgets'
    ],
  );
  // gestion du title
  add_theme_support('title-tag');

  // Image d'en-tête personnalisée
  add_theme_support(
    'custom-header',
  [
    'flex-width' => true,
    'flex-height' => true,
    'width' => 1920,
    'height' => 1280,
    'default' => get_template_directory_uri().'/assets/img/fond-header.jpg',
  ]);

  add_theme_support(
    'custom-logo',
    [
      'width' => 237,
      'height' => 234,
      'flex-width' => true,
      'flex-height' => true,
      'header-text' => [
        'site-title',
      ]
//      'default' => get_template_directory_uri().'/assets/img/fond-header.jpg',
    ]
  );

}
add_action('after_setup_theme', 'cooking_theme_support');
