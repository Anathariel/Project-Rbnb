<?php
class ArticleController extends Controller
{
    public function showOneArticle($id)
    {
        $articleModel = new ArticleModel();
        $article = $articleModel->getShowOneArticle($id);
        echo self::getRender('article.html.twig', ['article' => $article]);
    }

    //CRUD ARTICLE



    public function createArticle()
    {
        global $router;
        if (!$_POST) {
            echo self::getRender('addarticle.html.twig', []);
        } else {
            $model = new ArticleModel();
            if (isset($_POST['submit'])) {
                
                $author = $_SESSION['uid'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_FILES['image']['name'];
                $extract = $_POST['extract'];

                $article = new Article([
                    'author' => $author,
                    'title' => $title,
                    'content' => $content,
                    'image' => $image,
                    'extract' => $extract
                ]);

                $model->addArticle($article);
                $_SESSION['flash_message'] = 'Votre article à été publier avec succès.';
                header('Location: ' . $router->generate('dashboard'));
            } else {
                $message = 'Une erreur est survenue. Réessayer plus tard.';
                echo self::getrender('addarticle.html.twig', ['message' => $message]);
            }
        }
    }

    public function update($idUpdate)
    {
        if (!$_POST) {
            $model = new ArticleModel();
            $article = $model->getShowOneArticle($idUpdate);
            echo self::getrender('editArticle.html.twig', ['article' => $article]);
        } else {
            $model = new ArticleModel();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $articleId = $idUpdate;
                $author = $_SESSION['uid'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_FILES['image']['name'];
                $extract = $_POST['extract'];

                $article = new Article([
                    'articleId' => $articleId,
                    'author' => $author,
                    'title' => $title,
                    'content' => $content,
                    'image' => $image,
                    'extract' => $extract
                ]);
                // Transmettez l'objet $article à la méthode editArticle
                $model->updateArticle($article);

                global $router;
                $_SESSION['flash_message'] = 'Votre article à été modifier avec succès.';
                header('Location: ' . $router->generate('dashboard'));
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
