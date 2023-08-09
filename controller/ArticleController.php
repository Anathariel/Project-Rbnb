<?php 
class ArticleController extends Controller 
{
 public function article($uid){
   
    // Ici, vous récupérez l'article à partir de votre source de données 
    
    $article = new ArticleModel();
    $datas = $article->getOneArticle($uid);
    var_dump($datas);
   

    // Affichage de la vue avec les données de l'article
    echo self::getRender('article.html.twig', ['article' => $article, 'datas' => $datas]);

 }


} 