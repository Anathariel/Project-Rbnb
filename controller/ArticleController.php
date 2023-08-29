<?php
class ArticleController extends Controller
{
    public function showOneArticle($id)
    {
        $articleModel = new ArticleModel();// Instanciation d'un modèle pour les articles
        $article = $articleModel->getShowOneArticle($id);// Récupération des informations de l'article spécifié par son ID
        echo self::getRender('article.html.twig', ['article' => $article]);
    }  

    //CRUD ARTICLE
public function createArticle()
{
    global $router; // On utilise une variable globale pour le routeur

    // Vérification si la requête est vide (pas de données POST)
    if (!$_POST) {
        echo self::getRender('addarticle.html.twig', []); // Affiche le formulaire de création d'article
    } else {
        $model = new ArticleModel(); // Instanciation d'un modèle pour les articles

        // Vérification si le bouton de soumission a été pressé
        if (isset($_POST['submit'])) {
            $uploadDir = 'asset/media/blog/'; // Répertoire où les images seront stockées
            $uploadFile = $uploadDir . basename($_FILES['image']['name']); // Chemin complet du fichier image

            // Déplacement du fichier image téléchargé vers le répertoire de stockage
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $author = $_SESSION['uid']; // Récupération de l'auteur de l'article depuis la session
                $title = $_POST['title']; // Récupération du titre de l'article depuis les données POST
                $content = $_POST['content']; // Récupération du contenu de l'article depuis les données POST
                $imageName = $_FILES['image']['name']; // Nom de l'image téléchargée
                $extract = $_POST['extract']; // Récupération de l'extrait de l'article depuis les données POST

                // Création d'un objet Article avec les données récupérées
                $article = new Article([
                    'author' => $author,
                    'title' => $title,
                    'content' => $content,
                    'image' => $imageName,
                    'extract' => $extract
                ]);

                // Ajout de l'article en utilisant le modèle ArticleModel
                $model->addArticle($article);

                // Définition d'un message flash et redirection vers le tableau de bord
                $_SESSION['flash_message'] = 'Votre article a été publié avec succès.';
                header('Location: ' . $router->generate('dashboard'));
            } else {
                $message = 'Erreur lors de l\'upload de l\'image.';
                echo self::getRender('addarticle.html.twig', ['message' => $message]);
            }
        } else {
            $message = 'Une erreur est survenue. Réessayez plus tard.';
            echo self::getRender('addarticle.html.twig', ['message' => $message]);
        }
    }
}


public function update($idUpdate)
{
    global $router; // Utilisation d'une variable globale pour le routeur

    // Vérification si la requête est vide (pas de données POST)
    if (!$_POST) {
        $model = new ArticleModel(); // Instanciation d'un modèle pour les articles
        $article = $model->getShowOneArticle($idUpdate); // Récupération des informations de l'article à mettre à jour
        echo self::getRender('editArticle.html.twig', ['article' => $article]); // Affichage du formulaire de modification d'article avec les données de l'article
    } else {
        $model = new ArticleModel(); // Réinstanciation du modèle pour les articles

        // Vérification si la méthode de la requête est POST et si le bouton de soumission a été pressé
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $uploadDir = 'asset/media/blog/'; // Répertoire où les images sont stockées
            $uploadFile = $uploadDir . basename($_FILES['image']['name']); // Chemin complet du fichier image à télécharger

            // Vérification si le fichier image a été déplacé avec succès
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $author = $_SESSION['uid']; // Récupération de l'auteur depuis la session
                $title = $_POST['title']; // Récupération du titre depuis les données POST
                $content = $_POST['content']; // Récupération du contenu depuis les données POST
                $imageName = $_FILES['image']['name']; // Nom de l'image téléchargée
                $extract = $_POST['extract']; // Récupération de l'extrait depuis les données POST

                $oldImage = $model->getImagePathById($idUpdate); // Récupération du chemin de l'ancienne image

                // Suppression de l'ancienne image du serveur
                if ($oldImage && file_exists($uploadDir . $oldImage)) {
                    unlink($uploadDir . $oldImage);
                }

                // Création d'un objet Article avec les données pour la mise à jour
                $article = new Article([
                    'articleId' => $idUpdate,
                    'author' => $author,
                    'title' => $title,
                    'content' => $content,
                    'image' => $imageName,
                    'extract' => $extract
                ]);

                // Appel de la méthode pour mettre à jour l'article dans le modèle
                $model->updateArticle($article);

                $_SESSION['flash_message'] = 'Votre article a été modifié avec succès.';
                header('Location: ' . $router->generate('dashboard')); // Redirection vers le tableau de bord
            } else {
                $message = 'Erreur lors de l\'upload de l\'image.';
                echo self::getRender('editArticle.html.twig', ['message' => $message]); // Affichage du formulaire de modification avec un message d'erreur
            }
        } else {
            $message = 'Une erreur est survenue. Réessayez plus tard.';
            echo self::getRender('editArticle.html.twig', ['message' => $message]); // Affichage du formulaire de modification avec un message d'erreur
        }
    }
}


    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $model = new ArticleModel();
            $model->deleteArticle($id);

            global $router;
            $_SESSION['flash_message'] = 'Votre article à été supprimer avec succès.';
            header('Location: ' . $router->generate('dashboard'));
        }
    }
}
