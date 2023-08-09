<?php

class HomeController extends Controller
{
    public function home()
    {
        $propertyModel = new PropertyModel();
        $tagModel = new TagModel();
        $propertyImagesModel = new PropertyImagesModel();

        $propertys = $propertyModel->getLastPropertys();
        $lastFiveTagsChateaux = $tagModel->getLastFiveTagsChateaux();

        $getLastTagChateaux = $tagModel->getLastTagChateaux();


        $propertysWithImages = [];
        foreach ($propertys as $property) {
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($property->getPropertyId());
            $property->propertyImages = $propertyImages;
            $propertysWithImages[] = $property;
        }

        echo self::getRender('homepage.html.twig', ['propertys' => $propertysWithImages, 'lastFiveTagsChateaux' => $lastFiveTagsChateaux, 'propertyImages' => $propertyImages, 'getLastTagChateaux' => $getLastTagChateaux]);
    }

    public function blog(){
        echo self::getRender('blog.html.twig', []);
    }

    public function article($idArticle){

        $article = new ArticleModel();
        $datas = $article->getOneArticle($idArticle);
    
        // Affichage de la vue avec les données de l'article
        echo self::getRender('article.html.twig', ['datas' => $datas]);
        // echo self::getRender('article.html.twig', []);
    }

    public function catalogue(){
        echo self::getRender('catalog.html.twig', []);
    }
}

