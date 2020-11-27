<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Article {
    private $id;
    
    private $title;

    private $image;

    private $text;

    private $date;




/* je me connecte a la base de donné */

    public function insert(){
        $pdo = Database::getPDO();
        $sql = "INSERT INTO `Articles` (`id`, `title`, `image`, `text`, `date`) VALUES(`:id`, `:title`, `:image`, `:text`, `:date`)";
        $query = $pdo->prepare($sql);
        
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        $query->bindValue(':title', $this->title, PDO::PARAM_STR);
        $query->bindValue(':image', $this->image, PDO::PARAM_STR);
        $query->bindValue(':text', $this->text, PDO::PARAM_STR);
        $query->bindValue(':date', $this->date, PDO::PARAM_STR);

        $query->execute();



    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
