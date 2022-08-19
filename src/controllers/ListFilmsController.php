<?php

class ListFilm{
    public function __construct()
    {
        
    }
 
    public function manage(){

        $model=new Model();
        $films=$model->displayAllFilms();
        
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include 'src/view/listFilm.php';
        include "src/view/include/footer.php";
    }
}
