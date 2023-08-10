<?php

class BlogController extends Controller
{
    public function showAllArticles()
    {
        $allArticles = new BlogModel();
        $allArticles = $allArticles->getAllArticlesModel();

        echo self::getRender('blog.html.twig', ['allArticles' => $allArticles]);
    }

    public function showOneArticle()
    {
        echo self::getRender('article.html.twig', []);
    }

}
