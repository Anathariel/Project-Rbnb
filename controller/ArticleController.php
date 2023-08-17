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
                $uploadDir = 'asset/media/blog/'; // This is the directory to save the uploaded file.
                $uploadFile = $uploadDir . basename($_FILES['image']['name']);

                // Check if the file was moved successfully.
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $author = $_SESSION['uid'];
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $imageName = $_FILES['image']['name']; // Save the original name of the image to the database.
                    $extract = $_POST['extract'];

                    $article = new Article([
                        'author' => $author,
                        'title' => $title,
                        'content' => $content,
                        'image' => $imageName,
                        'extract' => $extract
                    ]);

                    $model->addArticle($article);
                    $_SESSION['flash_message'] = 'Votre article à été publier avec succès.';
                    header('Location: ' . $router->generate('dashboard'));
                } else {
                    $message = 'Erreur lors de l\'upload de l\'image.';
                    echo self::getRender('addarticle.html.twig', ['message' => $message]);
                }
            } else {
                $message = 'Une erreur est survenue. Réessayer plus tard.';
                echo self::getrender('addarticle.html.twig', ['message' => $message]);
            }
        }
    }

    public function update($idUpdate)
    {
        global $router;

        if (!$_POST) {
            $model = new ArticleModel();
            $article = $model->getShowOneArticle($idUpdate);
            echo self::getrender('editArticle.html.twig', ['article' => $article]);
        } else {
            $model = new ArticleModel();

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $uploadDir = 'asset/media/blog/';
                $uploadFile = $uploadDir . basename($_FILES['image']['name']);

                // Check if the file was moved successfully.
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $author = $_SESSION['uid'];
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $imageName = $_FILES['image']['name'];
                    $extract = $_POST['extract'];

                    $oldImage = $model->getImagePathById($idUpdate);

                    // Delete the old image from the server
                    if ($oldImage && file_exists($uploadDir . $oldImage)) {
                        unlink($uploadDir . $oldImage);
                    }

                    $article = new Article([
                        'articleId' => $idUpdate,
                        'author' => $author,
                        'title' => $title,
                        'content' => $content,
                        'image' => $imageName,
                        'extract' => $extract
                    ]);

                    $model->updateArticle($article);

                    $_SESSION['flash_message'] = 'Votre article à été modifier avec succès.';
                    header('Location: ' . $router->generate('dashboard'));
                } else {
                    $message = 'Erreur lors de l\'upload de l\'image.';
                    echo self::getRender('editArticle.html.twig', ['message' => $message]);
                }
            } else {
                $message = 'Une erreur est survenue. Réessayer plus tard.';
                echo self::getrender('editArticle.html.twig', ['message' => $message]);
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
