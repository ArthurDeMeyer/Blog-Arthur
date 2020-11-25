<?php

namespace App\Models;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models
abstract class CoreModel {
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;


    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */ 
    public function getCreatedAt() : string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */ 
    public function getUpdatedAt() : string
    {
        return $this->updated_at;

    }

    public function save() 
    {
        if ( empty($this->id) )
        {
            return $this->insert();
        }
        else
        {
            return $this->update();
        }
    }

    /*
    Une méthode abstraite force les enfants à écrire du code pour cette méthode
    On s'en sert ici pour prévenir les autres développeur
    que l'on utilise ActiveRecord et que nos model doivent contenir 
    une méthode find et une méthode findAll
    */
    abstract static function find($id);
    abstract static function findAll();

    abstract function insert();
    abstract function update();

}
