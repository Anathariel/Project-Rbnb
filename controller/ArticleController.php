<?php 
class ArticleController extends Controller 
{
 public function getArticle($uid){
    global $router;
    // Ici, vous récupérez l'article à partir de votre source de données 
    $article = new ArticleModel();
    $datas = $article->getOneArticle($uid);
    

    // Affichage de la vue avec les données de l'article
    echo self::getRender('article.html.twig', ['article' => $article, 'datas' => $datas]);

 }


} 