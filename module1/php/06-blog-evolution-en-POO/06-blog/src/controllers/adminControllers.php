<?php

/**
 * @return void
 * contrôleur du dashboard administrateur
 */
function genDashboard()
{
    // Sélection des articles
    $articleModel = new ArticleModel();
    $articles = $articleModel->getAllArticles();

    // On récupère le message flash le cas échéant
    $flashMessage = getFlashMessage();
    $template = "dashboard";
    include TEMPLATE_DIR . '/admin/baseAdmin.phtml';
}

/**
 * @return void
 * generates a form in order to insert a full new article into blog DB
 */
function genArticleAdd()
{
    $list = new CategoryModel();
    $art_categories = $list->getAllCategories();
    $labels = [];
    foreach ($art_categories as $k => $v) {
        $labels[] = $v['label'];
    }
    $labels[] = "Ajouter une catégorie";

    if (empty($_POST)) {
        $art_title = '';
        $art_content = '';
        $art_image = '';
        $art_category = '';
        $template = 'admin_article_add';
        include TEMPLATE_DIR . '/admin/baseAdmin.phtml';
    } else {
        $art_title = trim($_POST['art_title']);
        $art_content = trim($_POST['art_content']);
        $art_image = trim($_POST['art_image']);
        !empty($_POST['new_category']) ?
            $art_category = trim($_POST['new_category'])
            :
            $art_category = trim($_POST['art_category']);
        $errors = validateNewArticle();

        if (empty($errors)) {
            // add category if needed
            if (!in_array($art_category, $labels)) {
                $list->addCategory($art_category);
            }
            $newArticle = new ArticleModel();
            $newArticle->addArticle([$art_title, $art_content, $list->getCategoryIdByLabel($art_category), $art_image]);
            // insert article
            addFlashMessage("votre article a bien été créé et ajouté sur votre blog");
            // redirect dashboard
            header('Location: index.php?action=admin');
            exit;
        }
    }
}

/**
 * @return void
 * Contrôleur de l'édition d'article existant
 */
function genArticleEdit(int $idArticle)
{
    $article = new ArticleModel();
    $currentArticle = $article->getOneArticle($idArticle);

    $list = new CategoryModel();
    $art_categories = $list->getAllCategories();
    $labels = [];
    foreach ($art_categories as $k => $v) {
        $labels[] = $v['label'];
    }
    $labels[] = "Ajouter une catégorie";

    if (empty($_POST)) {
        $art_title = $currentArticle['title'];
        $art_content = $currentArticle['content'];
        $art_image = $currentArticle['image'];
        $art_category = $currentArticle['category_label'];
    } else {
        $art_title = $_POST['art_title'];
        $art_content = $_POST['art_content'];
        $art_image = $_POST['art_image'];
        $art_category = $_POST['art_category'];

        $errors = validateNewArticle();
        if (empty($errors)) {
            $update[] = trim($_POST['art_title']);
            $update[] = trim($_POST['art_content']);
            $update[] = $list->getCategoryIdByLabel(trim($_POST['art_category']));
            $update[] = trim($_POST['art_image']);
            $update[] = $idArticle;

            $article->editArticle($update);

            addFlashMessage("Votre article a bien été modifié");
            header('Location: index.php?action=admin');
            exit;
        }
    }
    $template = 'admin_article_edit';
    include TEMPLATE_DIR . '/admin/baseAdmin.phtml';
}

/**
 * @return void
 * Contrôleur de suppression d'article existant
 */
function genArticleDelete(int $idArticle)
{
    $article = new ArticleModel();
    $article->deleteArticle($idArticle);
    addFlashMessage("L'article " . $idArticle . " a bien été supprimé");

    genDashboard();
}

