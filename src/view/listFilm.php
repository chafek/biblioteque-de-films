
<h1 class="text-center m-5"><?php if (isset($_GET['filter'])) {
                            echo "MES FILMS ARCHIVÉS";
                        } else {
                            echo "MES FILMS";
                        } ?></h1>

<?php include "src/view/include/alertBox.php"; ?>
<div class="container-fluid  <?php if(!isset($_GET['filter'])){echo "bg-dark m-3";}else{echo "bg-secondary m-3";}?>">
 
    <p>Gérer vos films en cliquant sur <strong>'VOIR DETAILS'</strong>.</p>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-4">
        
    <div class="col d-flex align-self-center justify-content-center">

<div class="card bg-dark text-info mb-3  " id="add_film">

    <a href="http://localhost/biblioteque_films/index.php?page=add" class="text-uppercase"><img src="src\public\pictures\site\add_film.png" height=220 class="card-img img-responsive shadow-sm p-3 bg-body rounded" alt="...">
        <div class="card-img-overlay">
            <h4 class="card-title text-center" id="add_film_title">NOUVEAU FILM +</h4>
            <br>
            <h4 class="text-center "><span class="badge bg-primary mt-5"></span></h4>

        </div>
    </a>

</div>

</div>


        <?php foreach ($films as $film) : ?>
            <div class="col">

                <div class="card bg-dark text-info mb-3">

                    <a href="index.php?page=show&id=<?php echo $film['film_id']; ?> " class="text-uppercase"><img src="src/public/films_files/<?php echo $film['film_picture']; ?>" height=300 class="card-img img-responsive shadow-sm p-3 bg-body rounded" alt="...">
                        <div class="card-img-overlay">
                            <h4 class="card-title text-center  "><?= $film['film_title']; ?></h4>
                            <br>
                            <h4 class="text-center "><span class="badge bg-primary mt-5">VOIR DETAILS</span></h4>

                        </div>
                    </a>

                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>