<?php

class ShowFilm
{
    public function __construct()
    {
    }
    public function manage()
    {

        $model=new Model();
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
        $filmChosen=$model->displayAFilm($id);
        $filmStarsNumber=$model->displayFilmStarsRank($_GET['id']);
        if (isset($_POST['rank_range'])) {
            $rank=$_POST['rank_range'];
            $filmRank=$model->saveFilmRank($rank,$_GET['id']);
           
            
        }
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include 'src/view/showFilm.php';
        include "src/view/include/footer.php";
    }
}
