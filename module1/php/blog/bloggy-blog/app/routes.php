<?php

$aRoutes = [];

// DefaultController
$aRoutes ['home'] = 'DefaultController::genHome';
$aRoutes ['article'] = 'DefaultController::genArticle';
$aRoutes ['contact'] = 'DefaultController::genContact';
$aRoutes ['mentions'] = 'DefaultController::genMentions';

// UserController
$aRoutes ['signup'] = 'UserController::genSignUp';
$aRoutes ['login'] = 'UserController::genLogin';
$aRoutes ['logout'] = 'UserController::genLogout';

// AdminController
$aRoutes ['admin'] = 'AdminController::genDashboard';
$aRoutes ['admin_article_add'] = 'AdminController::genAddArticle';
$aRoutes ['admin_article_edit'] = 'AdminController::genEditArticle';
$aRoutes ['admin_article_delete'] = 'AdminController::genDeleteArticle';
