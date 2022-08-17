<?php

class ShowFilm{
    public function __construct()
    {
        
    }
    public function manage(){
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include 'src/view/showFilm.php';
        include "src/view/include/footer.php";
    }
}
