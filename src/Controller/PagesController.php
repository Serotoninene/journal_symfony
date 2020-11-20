<?php

namespace App\Controller;

use App\Services\ArticlesHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{

    /**
     * @Route ("/", name ="accueil")
     */
    public function accueil()
    {

        $ArticlesHelper = new ArticlesHelper();

        $lastArticles = $ArticlesHelper->lastArticles();


        return $this->render('accueil.html.twig',
            [
                "articles" => $lastArticles
            ]);
    }

    /**
     * @Route("/actualites", name = "actualites_list")
     */
    public function actualites()
    {
        $ArticlesHelper = new ArticlesHelper();
        $articles = $ArticlesHelper->allArticles();

        return $this->render('actualites.html.twig',
        [
            "articles" => $articles
        ]);

    }

    /**
     * @Route("/actualites/{id}", name="actualites_show")
     */
    public function article($id){

        $ArticlesHelper = new ArticlesHelper();
        $articles = $ArticlesHelper->allArticles();

        $article = $articles[$id-1];

        return $this->render('article.html.twig',[
            "article" => $article
        ]);

    }

}


?>