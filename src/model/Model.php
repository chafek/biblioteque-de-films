<?php

class Model{

    private $db;
    public function __construct()
    {
        try{
            $host='localhost';
            $dbname='biblioteque_films';
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
        $categorieRequest=$this->db->prepare("SELECT * FROM categories");
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
        $directorsRequest=$this->db->prepare("SELECT * FROM directors ");
        $directorsRequest->execute();
        $directors=$directorsRequest->fetchAll();
        return $directors;
    } catch (EXCEPTION $e) {
        var_dump($e->getMessage);
        return false;
    }
}

//add a film

public function addFilm($title,$file,$desc,$release_date,$cat,$director,$trailer,$duration){
    try {
        $addFilmRequest=$this->db->prepare("INSERT INTO films(film_title,film_picture,film_desc,film_date,film_cat,film_director,film_trailer,film_duration) VALUES (?,?,?,?,?,?,?,?)");
        $addFilmRequest->execute([
            $title,
            $file,
            $desc,
            $release_date,
            $cat,
            $director,
            $trailer,
            $duration
        ]);
    } catch (EXCEPTION $e) {
        var_dump($e->getMessage());
        return false;
    }
}

public function displayAllFilms(){
    try {
        $listFilmsRequest=$this->db->prepare("SELECT * FROM films");
        $listFilmsRequest->execute([]);
        $listFilms=$listFilmsRequest->fetchAll();
        return $listFilms;
        
    } catch (EXCEPTION $e) {
        var_dump($e->getMessage());
        return false;
        //throw $th;
    }
}

public function displayAFilm($id){
    try {
        $filmRequest=$this->db->prepare("SELECT * FROM films WHERE film_id=?");
        $filmRequest->execute([
            $id
        ]);
        $filmChosen=$filmRequest->fetch();
        return $filmChosen;

    } catch (EXCEPTION $e) {
        var_dump($e->getMessage());
        return false;
    }
}
}