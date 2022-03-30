<?php
function mc_menus_theme() {
	register_nav_menus(
		array(
			'principal' => 'Menu principal',
			'pied' => 'Pied de page', 
            'aside' =>'Sidebar de page'
			)
		);
}
add_action( 'after_setup_theme' , 'mc_menus_theme' );


function mk_css(){  
    echo
    '<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Neucha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="'.get_template_directory_uri().'/style.css">';
}
add_action('wp_head', 'mk_css');


/* #### Gestion des images à la une */
add_theme_support('post-thumbnails');

