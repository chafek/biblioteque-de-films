<?php

class Model{

    private $db;
    public function __construct()
    {
        try{
            $host='localhost';
            $dbname='biblioteque';
            $root='root';
            $password='';

        }catch(EXCEPTION $e){
            var_dump($e->getMessage());
        }

        $this->db=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$root,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    public function manage(){

    }

//get the categories in the add form

public function getCategories(){
    try{
        $categorieRequest=$this->db->prepare("SELECT * FROM categorie");
        $categorieRequest->execute([]);
        $categories=$categorieRequest->fetchAll();
        return $categories;

    }catch(EXCEPTION $e){
        var_dump($e->getMessage());
        return false;
    }
}

//get the directors of the films

public function getDirectors(){
    try {
        $directorsRequest=$this->db->prepare("SELECT * FROM director ");
        $directorsRequest->execute();
        $directors=$directorsRequest->fetchAll();
        return $directors;
    } catch (EXCEPTION $e) {
        var_dump($e->getMessage);
        return false;
    }
}
}