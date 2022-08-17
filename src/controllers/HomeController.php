<?php

class Home{
    public function __construct()
    {
        
    }
    public function manage(){
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include 'src/view/home.php';
        include "src/view/include/footer.php";
    }
}
