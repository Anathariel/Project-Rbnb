<?php   
class ArticleController extends Controller
{ 
public function showOneArticle($id)
    {
        $articleModel = new ArticleModel();
        $article = $articleModel->getShowOneArticle($id);
        // var_dump($article);
        echo self::getRender('article.html.twig', ['article' => $article]);
    }
}