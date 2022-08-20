<?php

class ListFilm{
    public function __construct()
    {
        
    }
 
    public function manage(){

        $model=new Model();

        //display films relative to their status (archived or not)
        isset($_GET['filter'])?$archive=1:$archive=0;
        if(isset($_GET['id'])){
            $film=$model->displayAFilm($_GET['id']);
         
        }

        //modify the status (archived to disarchived and contrary)
        if(isset($_GET['toArchive'])){
           $film['film_archive']==='0'?$newArchiveCode='1':$newArchiveCode='0';
    
           $model->toClassify($newArchiveCode,$_GET['id']);
        }
        if(isset($_GET['toDelete'])){
           
            $filmToDelete=$model->toDeleteFilm($_GET['id']);
            $msgSuccess="Le film '". $film['film_title']."' a été supprimé !";
        }
        
        $films=$model->toListFilms($archive);
        
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include 'src/view/listFilm.php';
        include "src/view/include/footer.php";
    }
}
