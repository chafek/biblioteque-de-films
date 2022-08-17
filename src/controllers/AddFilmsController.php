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
        var_dump($directors);
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include 'src/view/addFilm.php';
        include "src/view/include/footer.php";
    }
}
