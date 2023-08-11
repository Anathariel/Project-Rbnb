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
        echo self::getRender('addarticle.html.twig', []);
        // $article = new ArticleModel();

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') { {

        //         $articleId = $_SESSION['articleId'];
        //         $author = $_POST['author'];
        //         $title = $_POST['title'];
        //         $content = $_POST['content'];
        //         $extract = $_POST['extract'];
        //         $date = $_POST['date'];

        //         $article = new Article([

        //             'articleId' => $articleId,
        //             'author' => $author,
        //             'title' => $title,
        //             'content' => $content,
        //             'extract' => $extract,
        //             'date' => $date,

        //         ]);
        //         // $article->editArticle($article);
        //         echo self::getRender('addarticle.html.twig', ['article' => $article]);
        //     }
        // }
    }

    public function editArticle()
    {
    }

    public function deleteArticle()
    {
    }
}
