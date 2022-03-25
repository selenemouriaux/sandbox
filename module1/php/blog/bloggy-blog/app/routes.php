<?php

$aRoutes = [];

// DefaultController
$aRoutes ['home'] = '\App\Controller\DefaultController::genHome';
$aRoutes ['article'] = '\App\Controller\DefaultController::genArticle';
$aRoutes ['contact'] = '\App\Controller\DefaultController::genContact';
$aRoutes ['mentions'] = '\App\Controller\DefaultController::genMentions';

// UserController
$aRoutes ['signup'] = '\App\Controller\UserController::genSignUp';
$aRoutes ['login'] = '\App\Controller\UserController::genLogin';
$aRoutes ['logout'] = '\App\Controller\UserController::genLogout';

// AdminController
$aRoutes ['admin'] = '\App\Controller\AdminController::genDashboard';
$aRoutes ['admin_article_add'] = '\App\Controller\AdminController::genAddArticle';
$aRoutes ['admin_article_edit'] = '\App\Controller\AdminController::genEditArticle';
$aRoutes ['admin_article_delete'] = '\App\Controller\AdminController::genDeleteArticle';
