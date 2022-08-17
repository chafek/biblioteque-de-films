<?php

class ListFilm{
    public function __construct()
    {
        
    }
    public function manage(){
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include 'src/view/listFilm.php';
        include "src/view/include/footer.php";
    }
}
