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
        $filmRequest=$this->db->prepare("SELECT f.film_title, f.film_picture, f.film_desc,film_date,c.categorie_id,c.categorie_name,d.director_id,d.director_name, f.film_trailer, f.film_duration,f.film_archive FROM `films` as f INNER JOIN `categories` as c ON f.film_cat=c.categorie_id INNER JOIN `directors` as d ON f.film_director=d.director_id WHERE f.film_id=?;");
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

public function toClassify($archiveCode,$id){
    try {
        $classifyResquest=$this->db->prepare('UPDATE films SET film_archive=? WHERE film_id=?');
        $classifyResquest->execute([
            $archiveCode,
            $id
        ]);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
}

public function toListFilms($arch){
    try {
        $listFilmRequest=$this->db->prepare("SELECT * FROM films WHERE film_archive=?");
        $listFilmRequest->execute([
            $arch
        ]);
        $films=$listFilmRequest->fetchAll();
        return $films;
        
    } catch (Exception $e) {
       var_dump($e->getMessage()); 
    }   
}
public function toDeleteFilm($id){
    try {
        $filmToDelete=$this->db->prepare("DELETE FROM films WHERE film_id=?");
        $filmToDelete->execute([
            $id
        ]);
        return true;

    } catch (EXCEPTION $e) {
        var_dump($e->getMessage());
        return false;
    }
}

public function toModifyFilm($id,$title,$picture,$desc,$date,$cat,$director,$trailer,$duration){
    try {
        $film=$this->displayAFilm($id);
        $filmToModify=$this->db->prepare("
        UPDATE films SET `film_title`=?,film_picture=?,film_desc=?,film_date=?,film_cat=?,film_director=?,film_trailer=?,film_duration=? WHERE film_id=?

        ");
        $filmToModify->execute([
            $title,
            $picture,
            $desc,
            $date,
            $cat,
            $director,
            $trailer,
            $duration,
            $id

        ]);
        return $filmToModify;
      
    } catch (EXCEPTION $e) {
        var_dump($e->getMessage());
    }
}

public function verifyFields(){
    
    if (
        empty($_POST['film_date'])
        || $_FILES['film_picture']['name'] == ""
        || empty($_POST['film_cat'])
        || empty($_POST['film_director'])
        || empty($_POST['film_trailer'])
        || empty($_POST['film_duration'])
    )
    {
      return false;
      
    } else{
        return true;
    }
}

public function saveFilmRank($rank,$id){
    $filmRankRequest=$this->db->prepare("UPDATE films SET film_rank=? WHERE film_id=?");
    $filmRankRequest->execute([
        $rank,
        $id
    ]);
}
public function displayFilmStarsRank($id){
 $rankRequest=$this->db->prepare('SELECT film_rank FROM films WHERE film_id=?');
 $rankRequest->execute([
    $id
 ]);
 $rankNumber=$rankRequest->fetch(PDO::FETCH_ASSOC);
 return $rankNumber;
}

public function uploadFile($picture,$title){
    $upload = true;
    $now = date('Y-m-d H-i-s');
    $targetFile="src/public/films_files/";
    $imageFileType = strtolower(pathinfo($picture,PATHINFO_EXTENSION));
    $targetFile=$targetFile.$title."-".$now.'.'.$imageFileType;
    $check=getimagesize($_FILES['film_picture']['tmp_name']) ;
    if($check==false|| empty($targetFile)){
        echo "1";
        var_dump($upload) ;
        $upload=false;
        $msgError="Votre fichier n'est pas de type image.";
    }
    if(file_exists($targetFile)){
        echo "2";
        var_dump($upload) ;
        $upload=false;
        $msgError="Ce fichier existe déjà.";
    }
    
    if($_FILES['film_picture']['size']>500000){
        echo "3";
        var_dump($upload) ;
        $upload=false;
        $msgError="votre fichier depasse la limite de 500ko'";
    }
    
    if($imageFileType!='jpg' && $imageFileType!='jpeg'&& $imageFileType!='png')
        {
            echo "4";
            var_dump($upload) ;
            $upload=false;
            $msgError="votre fichier doit etre au format jpg ou jpeg ou png";
        }
 
       
    if($upload===true){
      
        $file=$title.'-'.$now.'.'.$imageFileType;
 
        if(move_uploaded_file($_FILES['film_picture']['tmp_name'],$targetFile))
        {
            
            $msgSuccess='Fichier uploadé';
            return $targetFile;
           
        }else
        {
            var_dump(move_uploaded_file($_FILES['film_picture']['name'],"src\public\films_files")) ;
            $upload=false;
            $msgError='Echec de l upload,merci de réessayer!';
        }
}
}
}