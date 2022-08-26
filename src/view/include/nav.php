<div class="container-fluid">
  <div class="row justify-content-between">

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <div class="container-fluid">
        <img src="src\public\picture\site\videos.png" alt=""><h3 class="navbar-brand ms-3 mt-2 me-5" href="#" >La bibliotèque</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?page=home">ACCEUIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" href="index.php?page=add" >AJOUTER UN FILM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" href="index.php?page=list">FILM NON ARCHIVES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" href="index.php?page=list&filter=true">FILMS ARCHIVES</a>
            </li>

          </ul>
          
        </div>
      </div>

      <div class="user col-4 m-5">
        <?php if(isset($_SESSION['email'])){
          $url=$_SERVER['REQUEST_URI'];
          echo "<pre class='mt-2' >Bonjour <strong>".$_SESSION['email']."</strong>    <a href='index.php?page=home&logout=true'>se deconnecter</a></pre>";
        }?>
      </div>
    </nav>
  </div>
</div>