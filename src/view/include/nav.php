<!--<div class="container-fluid">
  <div class="row ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex flex-row col-2 ms-5">
        <a href="http://localhost/biblioteque_films/index.php?page=home"><img src="src\public\pictures\site\biblioteque.png" height="80px" width="80px"  alt="logo"><h3 class="navbar-brand ms-3 mt-2 me-5" href="#" ></a>La bibliotèque</h3>
    </div>
      <div class="col-8 ms-5 offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
            <li class="nav-item  me-3">
                <a class=" nav-link active" aria-current="page" href="index.php?page=home">ACCEUIL</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" href="index.php?page=add" >AJOUTER UN FILM</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" href="index.php?page=list">FILM NON ARCHIVES</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" href="index.php?page=list&filter=true">FILMS ARCHIVES</a>
            </li>

        </ul>
      </div>
    </nav>    
  </div>
  <div class="row col-6 justify-content-end">
    <div class="user mb-3">
      <?php if(isset($_SESSION['email'])){
        $url=$_SERVER['REQUEST_URI'];
        echo "<pre class='mt-2' >Bonjour, <strong>".$_SESSION['email']."</strong>        <a href='index.php?page=home&logout=true'>se deconnecter</a></pre>";
      }?>
    </div>
  </div>
 
</div>
    -->
  
   <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">

      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="collapse_target">
    <a class="navbar-brand ms-4" href="http://localhost/biblioteque_films/index.php?page=home"><img src="src\public\pictures\site\biblioteque.png" height="90px" width="90px"  alt="logo"></a>
    <span class="navbar-text me-5">Ma biblioteque</span>
      <ul class="navbar-nav ms-3">
          <li class="nav-item">
            <a href="index.php?page=home" class="nav-link active me-2">Acceuil</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=list" class="me-2 nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" href="index.php?page=list">Films </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=list&filter=true" class="me-2 nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>">Films archivés</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=add" class="me-2 nav-link <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>">Ajouter un film</a>
          </li>
      </ul>
      </div>
      
    <div class="user  text-white me-4" >
      <?php if(isset($_SESSION['email'])){
        $url=$_SERVER['REQUEST_URI'];
        echo "<div class='mt-2' >Bonjour, <strong>".$_SESSION['email']."</strong></div><div>      <a href='index.php?page=home&logout=true'>se deconnecter</a></div>";
      }?>
    </div>

   </nav>