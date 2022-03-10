<?php

///////////////////////////////////////////////////
// CONTROLLERS DE L'ADMINISTRATION //////////////
///////////////////////////////////////////////

/**
 * Génère la page d'accueil de l'admin (le dashboard)
 */
function genDashboard()
{
    // Protection ADMIN
    if (!isConnected()) {
        addFlashMessage('Merci de vous connecter');
        header('Location: index.php?action=login');
        exit;
    }

    if (!isAdmin()) {
        echo 'Accès interdit';
        exit;
    }

    // Sélection des articles
    $articleModel = new ArticleModel();
    $articles = $articleModel->getAllArticles();

    // On récupère le message flash le cas échéant
    $flashMessage = getFlashMessage();

    // Inclusion du template
    $template = 'dashboard';
    include TEMPLATE_DIR . '/admin/baseAdmin.phtml';
}

/**
 * Ajout d'article
 */
function genAddArticle()
{
    // Protection ADMIN
    if (!isConnected()) {
        addFlashMessage('Merci de vous connecter');
        header('Location: index.php?action=login');
        exit;
    }

    if (!isAdmin()) {
        echo 'Accès interdit';
        exit;
    }

    // Initialisation des variables pour le remplissage du formulaire en cas d'erreur
    $title = '';
    $content = '';
    $categoryId = 0;


    // Si le formulaire est soumis... on traite les données
    if (!empty($_POST)) {

        // On récupère les données du formulaire
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $categoryId = (int) $_POST['category'];

        // On valide les données reçues (champs titre et contenu remplis)
        $errors = [];

        if (!$title) {
            $errors['title'] = 'Le champ "Titre" est obligatoire';
        }

        if (!$content) {
            $errors['content'] = 'Le champ "Contenu" est obligatoire';
        }

        // Est-ce que un fichier a bien été transmis ?
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
            $errors['image'] = 'Le champ "Image" est obligatoire';
        } 
        // Est-ce qu'il y a une erreur de transfert
        elseif ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
            $errors['image'] = 'Erreur lors du chargement du de l\'image';
        }
        // Est-ce que le fichier transmis est bien un fichier de type image ?
        else {
         
            // Est-ce que le fichier est bien un fichier image ?
            $allowedMimeTypes = ['image/gif', 'image/jpeg', 'image/png'];
            $mimetype = mime_content_type($_FILES['image']['tmp_name']);

            if (!in_array($mimetype, $allowedMimeTypes)) {
                $errors['image'] = 'Merci d\'uploader un fichier image (jpg, png ou gif)';
            } 
            else {

                // Dernière vérification : le poids du fichier
                $maxUploadSize = 1048576; // 1 Mo max
                if (filesize($_FILES['image']['tmp_name']) > $maxUploadSize) {
                    $errors['image'] = 'Le poids de l\'image excède la limite autorisée de 1Mo';
                }
            }
        }    

        // Si pas d'erreurs
        if (empty($errors)) {

            // Normalisation du nom du fichier image
            $fileInfo = pathinfo($_FILES['image']['name']);
            $extension = $fileInfo['extension'];
            $filename = slugify($fileInfo['filename']).sha1(uniqid(rand(), true)).'.'.$extension;

            // Déplacement du fichier temporaire vers le dossier final
            if (!file_exists(UPLOAD_DIR)) {
                mkdir(UPLOAD_DIR);
            }

            $uploadedFileSuccess = move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR . '/' . $filename);

            if (!$uploadedFileSuccess) {
                $errors['image'] = 'Erreur lors du déplacement du fichier temporaire';
            } 
            else {

                // On insère l'article en appelant la méthode insert() de la classe ArticleModel
                $articleModel = new ArticleModel();
                $articleModel->insert($title, $content, $categoryId, $filename);

                // Ajout d'un message flash de confirmation
                addFlashMessage('Article créé avec succès');

                // Redirection vers le dashboard admin
                header('Location: index.php?action=admin');
                exit;
            }
        }
    }

    // Sélection des catégories pour les afficher dans la liste déroulante
    $categories = (new CategoryModel)->getAllCategories();

    // Inclusion du template
    $template = 'addArticle';
    include TEMPLATE_DIR . '/admin/baseAdmin.phtml';
}


/**
 * Modification d'article
 */
function genEditArticle()
{
    // Protection ADMIN
    if (!isConnected()) {
        addFlashMessage('Merci de vous connecter');
        header('Location: index.php?action=login');
        exit;
    }

    if (!isAdmin()) {
        echo 'Accès interdit';
        exit;
    }

    // Valider le paramètre idArticle
    if (!array_key_exists('idArticle', $_GET) || !$_GET['idArticle'] || !ctype_digit($_GET['idArticle'])) {
        echo '<p>ERREUR : Id Article manquant ou incorrect</p>';
        exit;
    }

    // Récupérer le paramètre idArticle
    $idArticle = (int) $_GET['idArticle']; 

    // Sélection de l'article
    $articleModel = new ArticleModel();
    $article = $articleModel->getOneArticle($idArticle);

    // Test pour savoir si l'article existe
    if (!$article) {
        echo 'ERREUR : aucun article ne possède l\'ID ' . $idArticle;
        exit;
    }

    // Initialisation des variables pour pré remplir le formulaire
    $title = $article['title'];
    $content = $article['content'];
    $categoryId = $article['categoryId'];
    $filename = $article['image'];

    // Si le formulaire est soumis... on traite les données
    if (!empty($_POST)) {

        // On récupère les données du formulaire
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $categoryId = (int) $_POST['category'];

        // On valide les données reçues (champs titre et contenu remplis)
        $errors = [];

        if (!$title) {
            $errors['title'] = 'Le champ "Titre" est obligatoire';
        }

        if (!$content) {
            $errors['content'] = 'Le champ "Contenu" est obligatoire';
        }

        // Si un fichier est transmis...
        if (isset($_FILES['image']) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
           
            // Est-ce qu'il y a une erreur de transfert
            if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
                $errors['image'] = 'Erreur lors du chargement du de l\'image';
            }
            // Est-ce que le fichier transmis est bien un fichier de type image ?
            else {
            
                // Est-ce que le fichier est bien un fichier image ?
                $allowedMimeTypes = ['image/gif', 'image/jpeg', 'image/png'];
                $mimetype = mime_content_type($_FILES['image']['tmp_name']);

                if (!in_array($mimetype, $allowedMimeTypes)) {
                    $errors['image'] = 'Merci d\'uploader un fichier image (jpg, png ou gif)';
                } 
                else {

                    // Dernière vérification : le poids du fichier
                    $maxUploadSize = 1048576; // 1 Mo max
                    if (filesize($_FILES['image']['tmp_name']) > $maxUploadSize) {
                        $errors['image'] = 'Le poids de l\'image excède la limite autorisée de 1Mo';
                    }
                }
            }    
        }

        // Si pas d'erreurs
        if (empty($errors)) {

            // Si un fichier est transmis...
            if (isset($_FILES['image']) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {

                // Normalisation du nom du fichier image
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extension = $fileInfo['extension'];
                $filename = slugify($fileInfo['filename']).sha1(uniqid(rand(), true)).'.'.$extension;

                // Déplacement du fichier temporaire vers le dossier final
                if (!file_exists(UPLOAD_DIR)) {
                    mkdir(UPLOAD_DIR);
                }

                $uploadedFileSuccess = move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR . '/' . $filename);

                // Si le déplacement a échoué => message d'erreur
                if (!$uploadedFileSuccess) {
                    $errors['image'] = 'Erreur lors du déplacement du fichier temporaire';
                }

                // Si le fichier a bien été déplacé => on supprime l'ancien
                else {
                    $oldFilepath = UPLOAD_DIR . '/' . $article['image'];
                    if (file_exists($oldFilepath)) {
                        unlink($oldFilepath);
                    }
                }
            } 
            
            // Si aucun fichier n'est transmis ou s'il n'y a pas eu de problème lors du déplacement du fichier...
            if (!isset($uploadedFileSuccess) || $uploadedFileSuccess) {

                // On insère l'article en appelant la méthode update() de la classe ArticleModel
                $articleModel = new ArticleModel();
                $articleModel->update($title, $content, $categoryId, $filename, $idArticle);

                // Ajout d'un message flash de confirmation
                addFlashMessage('Article modifié avec succès');

                // Redirection vers le dashboard admin
                header('Location: index.php?action=admin');
                exit;
            }
        }
    }

    // Sélection des catégories pour les afficher dans la liste déroulante
    $categories = (new CategoryModel)->getAllCategories();

    // Inclusion du template
    $template = 'editArticle';
    include TEMPLATE_DIR . '/admin/baseAdmin.phtml';
}

function genDeleteArticle()
{
    // Protection ADMIN
    if (!isConnected()) {
        addFlashMessage('Merci de vous connecter');
        header('Location: index.php?action=login');
        exit;
    }

    if (!isAdmin()) {
        echo 'Accès interdit';
        exit;
    }

    // Valider le paramètre idArticle
    if (!array_key_exists('idArticle', $_GET) || !$_GET['idArticle'] || !ctype_digit($_GET['idArticle'])) {
        echo '<p>ERREUR : Id Article manquant ou incorrect</p>';
        exit;
    }

    // Récupérer le paramètre idArticle
    $idArticle = (int) $_GET['idArticle']; 

    // Sélection de l'article
    $articleModel = new ArticleModel();
    $article = $articleModel->getOneArticle($idArticle);

    // Test pour savoir si l'article existe
    if (!$article) {
        echo 'ERREUR : aucun article ne possède l\'ID ' . $idArticle;
        exit;
    }

    // Suppression de l'image
    $oldFilepath = UPLOAD_DIR . '/' . $article['image'];
    if (file_exists($oldFilepath)) {
        unlink($oldFilepath);
    }

    // Suppression de l'article dans la base de données
    $articleModel->delete($idArticle);

    addFlashMessage('Article supprimé!');

    header('Location: index.php?action=admin');
    exit;
}