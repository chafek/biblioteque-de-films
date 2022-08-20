<?php

class AddFilm
{

   
    public function __construct()
    {
    }

    public function manage()
    {
       
        $model = new Model();
        $categories = $model->getCategories();
        $directors = $model->getDirectors();
        if (!empty($_POST['film_title']))
        {
        
            if (
                empty($_POST['film_date'])
                || $_FILES['film_picture']['name'] == ""
                || empty($_POST['film_cat'])
                || empty($_POST['film_director'])
                || empty($_POST['film_trailer'])
                || empty($_POST['film_duration'])
            )
            {
                $msgError = "merci de renseigner tous les champs!";
              
            } 
            else
            {

                $title = $_POST['film_title'];
                $picture = empty($_FILES['film_picture']['name']) ? null : $_FILES['film_picture']['name'];
                $date = $_POST['film_date'];
                $cat = empty($_POST['film_cat']) ? null : $_POST['film_cat'];
                $desc=empty($_POST['film_desc']) ? null : $_POST['film_desc'];
                $director = empty($_POST['film_director']) ? null : $_POST['film_director'];
                $trailer = empty($_POST['film_trailer']) ? null : $_POST['film_trailer'];
                $duration = empty($_POST['film_duration']) ? null : $_POST['film_duration'];

                try
                {
                    $upload = false;
                    $file = null;

                    if (!empty($_FILES['film_picture']['name'])) 
                    {
                        $upload = true;
                        $now = date('Y-m-dH-i-s');
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
                    
                               
                            }else
                            {
                                var_dump(move_uploaded_file($_FILES['film_picture']['name'],"src\public\films_files")) ;
                                $upload=false;
                                $msgError='Echec de l upload,merci de réessayer!';
                            }
                        }
                        if(!empty($_FILES['film_picture']['name'])|| $upload===true){
                           $filmAded=$model->addFilm($title,$file,$desc,$date,$cat,$director,$trailer,$duration);
                           echo '<script type="text/javascript">
                           window.location = "http://localhost/biblioteque_films/index.php?page=list"
                            </script>';

                           $msgSuccess="Enregistrement réussi!!";
                        }
                            
                    }
                } catch (EXCEPTION $e) {
                    var_dump($e->getMessage());
                    return false;
                }
            }
        }
      
        include "src/view/include/header.php";
        include "src/view/include/nav.php";
        include "src/view/addFilm.php";
        include "src/view/include/footer.php";
    }
}
