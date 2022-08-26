<?php 
 
 if(!isset($_SESSION)){
    session_start();
 }
// var_dump($_SESSION['email']);
class Home{
    public function __construct()
    {
        
    }
    
    public function manage(){
       
        $model=new Model();
        // two array with own property depends on the status connection or registration
        $connection=[
            'text'=>"Pour gére vos films, vous devez vous connecter.",
            'title'=>"Se connecter",
            'action'=>" <div class='d-flex justify-content-between align-items-center'>
                            <div class='form-check mb-0'>
                                <input class='form-check-input me-2' type='checkbox' value=' id='form2Example3' />
                                <label class='form-check-label' for='form2Example3'>
                                    Se souvenir de moi
                                </label>
                            </div>
                            <a href='#!' class='text-body'>Mot de passe oublié?</a>
                        </div>",
            'button_text'=>'Valider'
        ];
        $registration=[
            'text'=>"S'enregistrer pour acceder aux services.",
            'title'=>"S'enregistrer",
            'action'=>
                        "<div class='form-outline mb-3'>
                            <input type='password' id='form3Example4' class='form-control form-control-lg'
                            placeholder='Confirmation mot de passe' name='password_confirmation'/>
                            <label class='form-label' for='form3Example4'>Confirmer mot de passe</label>
                        </div>",
            'button_text'=>'Enregistrer'
        ];
        
        //verification if fields are empty

        $email=isset($_POST['email'])?$_POST['email']:null;
        $password=isset($_POST['password'])?$_POST['password']:null;
        $password_confirmation=isset($_POST['password_confirmation'])?$_POST['password_confirmation']:null;
        
        isset($_POST['password_confirmation'])?$verification=$model->verifyFields([$email,$password,$password_confirmation]): $verification=$model->verifyFields([$email,$password]);
       
        if($verification===false){
            $msgError="Veuillez remplir tous les champs!"; 
        }
        //case registratin
         if(filter_input(INPUT_POST,'password_confirmation') && $_POST['password']===$_POST['password_confirmation']){
            $email=$_POST['email'];
            $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
            $model->userRegistration($email,$password);
            header("Location:http://localhost/biblioteque_films/index.php?page=list");
            $msgSuccess= "Votre profil a été enregistré..";
            $registration_success=true;
            
         }

         //case connexion
         if(!isset($_GET['action']) && filter_input(INPUT_POST,'password'))
         {
            $checkConnexion=$model->userConnexion($_POST['email'],$_POST['password']);
           if(isset($checkConnexion))
           {
                $msgSuccess= "Vous êtes connecté.";
                header("Location:http://localhost/biblioteque_films/index.php?page=list");
                
                $registration_success=true;
           }    
         }

         //case logout
         if(filter_input(INPUT_GET,'logout'))
         { 
            session_unset();
          }
     
        include "src/view/include/header.php";
        include "src/view/include/nav.php";

        include 'src/view/home.php';
        include "src/view/include/footer.php";
    }
}
