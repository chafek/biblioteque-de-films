<h1 class="text-center">Liste de films</h1>
    
        <?php include "src/view/include/alertBox.php";?>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($films as $film) : ?>
                <div class="col">
          
                    <div class="card bg-dark text-secondary">
                  
                    <a href="index.php?page=show&id=<?php echo $film['film_id']; ?>"><img src="src/public/films_files/<?php echo $film['film_picture']; ?>" height=350 class="card-img img-responsive" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title text-center"><?= $film['film_title'];?></h5>
                            <br>
                            <h4 class="text-center"><span class="badge bg-secondary ">Détail</span></h4>
                           
                        </div></a>
         
                    </div>
                
                </div>
            <?php endforeach; ?>
        </div>