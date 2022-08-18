<?php

class AddFilm
{

    public function __construct(){

    }

    public function manage()
    {
        $model=new Model();
        $categories=$model->getCategories();
        $directors=$model->getDirectors();
        if(!empty($_POST['film_title'])){
            if(empty($_POST['film_date'])
                || $_FILES['film_picture']['name']==""
                || empty($_POST['film_cat'])
                || empty($_POST['film_director'])
                || empty($_POST['film_trailer'])
                || empty($_POST['film_duration'])
                ){
                $msgError="merci de renseigner tous les champs!";
            }
          
         }
         
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        
        include 'src/view/addFilm.php';
        include "src/view/include/footer.php";
    }
}