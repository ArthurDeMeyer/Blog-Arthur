<?php

namespace App\Controllers;

use App\Models\Brand;

class BrandController extends CoreController {

    public function createPost()
    {
        // on utilise une ternaire pour écrire moins de ligne
        $name = isset($_POST['name']) ? $_POST['name'] : false;
        if ($name === false)
        {
            // il y a une donnée manquante
        }
        else 
        {
            // vérifier le format des données
            if ($name === '')
            {
                // le format des données n'est pas le bon

                // générer un message d'erreur
                $errorMessageList[] = 'Attention le nom ne peut pas être vide';

                // pour fournir les valeurs saisies par l'utilisateur à la vue
                // on les range dans un objet
                $brand = new Brand();
                $brand->setName($name);
                
                // afficher le formulaire en lui fournissant : 
                // - le / les messages d'erreurs
                // - les anciennes données saisies 
                $this->show('brand/create', [
                    'currentMenu' => 'brand', // utilisé 
                    'errorMessageList' => $errorMessageList,
                    'brand' => $brand,
                ]);
            }
            else 
            {
                // tout se passe bien, on peut continuer
                // dump($name, $subtitle, $picture);

                // Pour insérer en DB, je crée d'abord une nouvelle instance du Model correspondant
                // (ici brand pour la table brand).
                $brand = new Brand();

                // Puis je renseigne les valeurs pour chaque propriété correspondantes dans l'instance.
                $brand->setName($name);
                $brand->setFooterOrder(0);

                // En dernier, j'appelle la méthode du Model permettant d'ajouter en DB.
                $brand->save();

                global $router;
                // Attention, pour modifier le header il ne faut rien avoir écrit auparavant
                // c'est à dire pas de dump ni de echo ni rien
                header('Location: ' . $router->generate('brand-list'));
                exit;
            }
        }
    }

    /**
     * Action to display add brand form
     *
     * @return void
     */
    public function create()
    {
        $brand = new Brand();

        // on passe un objet vide à la vue 
        // car on a modifié le template pour gérer le cas des erreurs dans  l'action (= méthode) add
        $this->show('brand/create', [
            'currentMenu' => 'brand',
            'brand' => $brand,
            ]);
    }

    public function delete($brandId)
    {
        // récupérer les informations de l'url
        // altoDispatcher nous fournit la valeur en argument lors de l'appel de la méthode update
     
        // récupérer l'objet à mettre à jour
        Brand::delete($brandId);

        // rediriger
        global $router;
        header('Location: ' . $router->generate('brand-list'));
        exit;
    }

    /**
     * Action to display brand list
     *
     * @return void
     */
    public function list()
    {
        $this->checkAuthorization(['hyper-admin']);

        $this->show('brand/list', [
            'currentMenu' => 'brand', 
            'brandList' => Brand::findAll(),
            ]);
    }

    /**
     * Display update form of a brand
     *
     * @param [brand] $brandId
     * @return void
     */
    public function update($brandId)
    {
        // récupérer les informations de l'url
        // altoDispatcher nous fournit la valeur en argument lors de l'appel de la méthode update
     
        // récupérer l'objet à mettre à jour
        $brand = Brand::find($brandId);

        // vérifier si la catégorie existe bien
        if ($brand === false) 
        {
            // TODO 
            // afficher une 404
            // expliquant que la catégorie n'existe pas
        }

        // afficher le formulaire de mise à jour
        $this->show('brand/update', [
            'currentMenu' => 'brand', 
            'brand' => $brand
        ]);

    }

    public function updatePost($brandId)
    {
        // récupérer les informations de l'url
        // altoDispatcher nous fournit la valeur en argument lors de l'appel de la méthode update
     
        // récupérer l'objet à mettre à jour
        $brand = Brand::find($brandId);

        // TODO afficher une 404 si la brand n'existe pas en BDD

        // filter_input nous permet de récupérer et convertir les valeurs fournies en POST
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        
        // TODO factoriser ce code de vérification 
        // des données recues depuis le formulaire
        if ($name === '')
        {
            $errorMessageList[] = 'Attention le nom ne peut pas être vide';

            // pour fournir les valeurs saisies par l'utilisateur à la vue
            // on les range dans un objet
            $brand->setName($name);
            

            // afficher le formulaire en lui fournissant : 
            // - le / les messages d'erreurs
            // - les anciennes données saisies 
            $this->show('brand/update', [
                'currentMenu' => 'brand', // utilisé 
                'errorMessageList' => $errorMessageList,
                'brand' => $brand,
            ]);
        }
        else
        {
            // en arrivant ici, on est sur que : 
            // notre catégorie existe en BDD
            // les données fournies sont correctes 

            // mettre à jour les différentes valeurs dans cet objet
            $brand->setName($name);
            
            // lancer la maj dans la BDD
            if ($brand->save())
            {
                // rediriger
                global $router;
                header('Location: ' . $router->generate('brand-list'));
                exit;
            }
            else 
            {
                // TODO rediriger vers le formulaire d'édition avec un petit message d'erreur
            }

        }
        
    }



}
