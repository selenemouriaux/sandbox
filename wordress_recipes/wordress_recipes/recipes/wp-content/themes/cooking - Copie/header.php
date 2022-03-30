<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super title farci de mots clés pertinents et sans equivoque</title>
    <meta name="description" content="Ma super description farcie de mots clés pertinents et sans equivoque">
    <?php if( is_home() ) : ?>
    
    <?php else : ?>
    <?php endif; ?>
   
<?php wp_head(); ?>
</head>
<body class="">
    <header class="Header">
        <div class="layout">
            <nav class="Header-nav">
                
            <?php wp_nav_menu(array('sort_column'=>'menu_order','theme_location'=>'principal')); ?>
            
                <figure class="Header-logoBox">
                    <img class="Header-logoBox-logo" src="assets/img/logo.png" alt="Logo Cookin'mama">
                </figure>
                <div class="Header-titles">
                    <h1 class="Header-titles">Astuces des chefs</h1>
                </div>
                
            </nav>

        </div>
        
    </header>
