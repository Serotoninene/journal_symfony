<?php

namespace App\Controller;

/*avec use on fait appel à des classes extérieures à la notre, ci-dessous il y a : ArticlesHelper que nous avons créée
pour gérer les données des articles*/
use App\Services\ArticlesHelper;
/*AbstractController qui nous permet d'éteindre les méthodes de notre classe et notamment d'invoquer la méthode render
pour afficher nos pages twig*/
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/*Annotation\Route qui nous permet de router avec des annotations*/
use Symfony\Component\Routing\Annotation\Route;


/**
 * Ne pas oublier d'installer Symfony/Apache avant de tout lancer, sinon seul la route "/" fonctionnera, ce composer
 * sert à faire le lien entre le controller/les routes  et le serveur;
 * /!\ extends = HERITAGE
 */
class PagesController extends AbstractController
{

    /**
     * @Route ("/", name ="accueil")
     */
    public function accueil()
    {
        /**
         * j'instancie la class que j'ai créé dans le fichier Sevices de "src", en l'appelant, je peux utiliser ses methodes
         */
        $ArticlesHelper = new ArticlesHelper();

        /**
         * Grâce à la methode lastArticles() je renvoie les infos de mes 3 derniers articles, je la stocke dans une variable pour
         * la renvoyer vers mon fichier twig (cf. le return)
         */
        $lastArticles = $ArticlesHelper->lastArticles();

        /*Je peux utiliser render grâce à l'AbstractController qui est un objet parent */
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