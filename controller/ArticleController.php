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
        if (!$_POST) {

            echo self::getRender('articleAdd.html.twig', []);
        } else {

            $model = new ArticleModel();

            if (isset($_POST['submit'])) {

                $author = $_SESSION['uid'];

                $title = $_POST['title'];
                $content = $_POST['content'];
                // $image = $_FILES['image']['name'];
                $extract = $_POST['extract'];

                $article = new Article([

                    'author' => $author,
                    'title' => $title,
                    'content' => $content,
                    // 'image' => $image,
                    'extract' => $extract

                ]);


                $model->addArticle($article);
            } else {
                $message = 'Oops,Try again later';
                echo self::getrender('articleAdd.html.twig', ['message' => $message]);
            }
        }
    }

    public function edit($id)
    {
        $model = new ArticleModel();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $id = $_POST['articleId'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            // $image = $_FILES['image']['name'];
            $extract = $_POST['extract'];
    
            $article = new Article([
                'articleId' => $id,
                'title' => $title,
                'content' => $content,
                // 'image' => $image,
                'extract' => $extract
            ]);
    
            // Transmettez l'objet $article à la méthode editArticle
            $article = $model->editArticle($id);
    
            echo self::getrender('editArticle.html.twig', ['article' => $article]);
        }
    }
    
}
