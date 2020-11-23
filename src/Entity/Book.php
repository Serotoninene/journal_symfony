<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * /!\ les DOCTRINE
 *
 * Pour créer une entitée, il existe une command line "php bin/console make:entity" qui propose de créer une entitée (donc
 * la class qui deviendra une table en SQL) + qui s'occupe de générer les lignes use et les annotation nécessaires pour chaque
 * propriété (qui deviendra une colonne en SQL)
 * +qui créera automatiquement la propriété id :) (c'est trop bien)
 */

/**
 * Quand c'est bon, on rentre la ligne "php bin/console make:migration" dans la console pour créer un fichier dans migrations
 * qui contient les requêtes SQL ...
 * ... puis la ligne "php bin/console doctrine:migrations:migrate" qui met tout en ligne
 *
 * /!\ ATTENTION : avant de faire un "..make:migration" TOUJOURS faire un "..doctrine:migrations:migrate" pour éviter les
 * répétitions de fichiers migration
 */

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /*C'est l'anootation ORM/... (bien penser à rajouter la ligne use correspondante pour que cela fonctionne qui définit
    les propriété de la colonne que l'on crée
    En l'occurence pour l'id, il faut préciser que c'est bien l'id, que cela se génère automatiquement. Mais pour les autres
    la ligne colonne suffit (avec le type, éventuellement la length)*/

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;


    /**
     * @ORM\Column (type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column (type="integer")
     */
    private $nbPages;

    /**
     * @ORM\Column (type="date")
     */
    private $datePubli;
    /**
     * @ORM\Column (type="boolean")
     */
    private $toSell;


    /**
     * @ORM\Column (type="text")
     */
    private $resume;

    /*   public function getId(): ?int
       {
           return $this->id;
       }

       public function getTitre(): ?string
       {
           return $this->titre;
       }

       public function setTitre(string $titre): self
       {
           $this->titre = $titre;

           return $this;
       }*/
}
