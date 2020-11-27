<?php

namespace App\Controllers;
use App\Models\Article;

class ArticleController extends CoreController {

    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function article()
    {
       

        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show('content/article',  [
            'currentMenu' => 'article',
            
        ]);
    }

    public function newArticle() {
        global $router;

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_URL);
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);

        $newArticle = new Article();

        $newArticle ->setId($id);

        $newArticle -> setTitle($title);

        $newArticle -> setImage($image);

        $newArticle -> setText($text);

        $newArticle -> setDate($date);

        $newArticle -> insert();
        

    }



}

