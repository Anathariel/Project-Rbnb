<?php
class BlogController extends Controller
{
    public function showAllArticles()
    {
        $blogModel = new BlogModel();
        $allArticles = $blogModel->getAllArticlesModel();

        echo self::getRender('blog.html.twig', ['allArticles' => $allArticles]);
    }
}
