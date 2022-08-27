<div class="container-fluid">
  <div class="row ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
   
        
        <a href="http://localhost/biblioteque_films/index.php?page=home"><img src="src\public\pictures\site\biblioteque.png" height="80px" width="80px"  alt="logo"><h3 class="navbar-brand ms-3 mt-2 me-5" href="#" ></a>La bibliotèque</h3>

      <div class="col-8 ms-5">
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