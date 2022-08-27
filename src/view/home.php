
<?php 
  
if(isset($_POST['submit'])){
 
include 'src\view\include\alertBox.php';}?>

<h1 class="text-center mt-4 title" >Acceuil</h1>

<?php isset($_GET['action'])?$content=$registration:$content=$connection;?>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-5 ">
        <img src="src\public\pictures\site\login_home.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-7 ">
        <form method="POST" action="<?=stristr($_SERVER['REQUEST_URI'],'index.php',);?>">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">
              <?=$content['text'];?>
            </p>
           
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0"><?=$content['title'];?></p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Entrez une adresse mail valide" name="email" />
            <label class="form-label" for="form3Example3">Adresse mail</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Mot de passe" name="password"/>
            <label class="form-label" for="form3Example4">Mot de passe</label>
          </div>
            
            <!-- Checkbox -->
            <?=$content['action'];?>
            
            <input type="hidden" id="submit" name="submit" value="">
          <div class="text-center text-lg-start mt-4 pt-2">
          <button class="btn btn-primary btn-lg"  type="submit" style="padding-left: 2.5rem; padding-right: 2.5rem;" ><?=$content['button_text'];?></button>
             <!-- have to modify this block below if registration-->
            <p class="small fw-bold mt-2 pt-1 mb-0">Pas de compte? <a href="index.php?page=home&action=register"
                class="link-danger">Inscription</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
 
</section>
