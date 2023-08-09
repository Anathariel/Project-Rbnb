<?php 
class ArticleController extends Controller 
{
 public function getArticle(){

    // Ici, vous récupérez l'article à partir de votre source de données 
    $article = new ArticleModel();
    

    // Affichage de la vue avec les données de l'article
    echo self::getRender('article.html.twig', ['article' => $article]);

 }


} 