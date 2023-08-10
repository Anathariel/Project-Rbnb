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

        //Hamid; tu te mélanges dans le nommage de tes fonctions. Entre edit & add je n'étais plus sûre duquel tu cherchais à faire ? Mais vue la position du bouton en dehors des boucles d'articles j'ai donc juger pour l'ajout. Je t'ai donc corriger tout en tant que "add".
        // J'ai commenter ta fonctions et enlever les champs inutile à ton formulaire (la date sera un NOW() rentrer en SQL et l'auteur récupérer via SESSION !)
    }
}
