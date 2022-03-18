<?php

/**
 * Contrôleur de la page d'accueil
 */
function genHome()
{
  // Affichage : inclusion du fichier de template
  $template = 'home';
  include TEMPLATE_DIR . '/base.phtml';
}

function genPixabay()
{
  $template = 'pixabay';
  include TEMPLATE_DIR . '/base.phtml';
}