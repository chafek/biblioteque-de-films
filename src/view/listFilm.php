
<h1 class="text-center"><?php if (isset($_GET['filter'])) {
                            echo "MES FILMS ARCHIVÉS";
                        } else {
                            echo "MES FILMS";
                        } ?></h1>

<?php include "src/view/include/alertBox.php"; ?>
<div class="container  m-5">
    <div class="row row-cols-1 justify-content-end">
            <a href="http://localhost/biblioteque_films/index.php?page=add" class="btn btn-primary btn-lg col-2 align-items-end <?php if(!isset($_SESSION['email'])){echo 'disabled';}?>" tabindex="-1" role="button" aria-disabled="true">Ajouter un film</a>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-4">

        <?php foreach ($films as $film) : ?>
            <div class="col">

                <div class="card bg-dark text-info">

                    <a href="index.php?page=show&id=<?php echo $film['film_id']; ?> " class="text-uppercase"><img src="src/public/films_files/<?php echo $film['film_picture']; ?>" height=350 class="card-img img-responsive shadow-sm p-3 bg-body rounded" alt="...">
                        <div class="card-img-overlay">
                            <h3 class="card-title text-center  "><?= $film['film_title']; ?></h3>
                            <br>
                            <h4 class="text-center "><span class="badge bg-primary mt-5">VOIR DETAILS</span></h4>

                        </div>
                    </a>

                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>