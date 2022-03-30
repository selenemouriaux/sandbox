<?php

function cooking_menus()
{
  register_nav_menus(
    array(
      'principal' => __('Menu principal', 'cooking'),
      'footer' => 'Pied de page',
      'aside' => 'Sidebar de page'
    )
  );
}

add_action('after_setup_theme', 'cooking_menus');

function cooking_widgets()
{
  register_sidebar([
    'name' => __('Barre de widgets', 'cooking'),
    'id' => 'sidebar',
    'before-widget' => '<div class="MainContent-sidebar-widgetArea %2$s">',
    'after-widget' => '</div>',
  ]);
  register_sidebar([
  'name' => __('Pied de page', 'cooking'),
  'id' => 'footer',
  'before-widget' => '<div class="Footer-links-widgetBox %2$s">',
  'after-widget' => '</div>',
]);
}

add_action('widgets_init', 'cooking_widgets');