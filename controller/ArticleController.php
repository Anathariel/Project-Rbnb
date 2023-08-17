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
            }
            $createArticle = $model->addArticle($article);

            if ($createArticle) {

                $message = 'Article created successfully!';
                echo self::getrender('addarticle.html.twig', ['message' => $message]);
            } else {

                $message = 'Oops,Try again later';
                header('Location: ' . $router->generate('dashboard'));
            }
        }
    }
    
    public function edit($id)
    {
        global $router;

        $model = new ArticleModel();
        $article = $model->getShowOneArticle($id);
        var_dump($article);
        echo self::getrender('editArticle.html.twig', ['router' => $router, 'article' => $article]);
    }
    public function update($idUpdate)
    {

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

            echo self::getrender('blog.html.twig', ['article' => $article]);
        }
    }
    public function delete($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $model = new ArticleModel();
            $model->deleteArticle($id);


            global $router;

            echo self::getrender('editArticle.html.twig', ['router' => $router]);
        }
    }
}
