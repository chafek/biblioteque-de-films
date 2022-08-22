<div>
<?php include "src/view/include/alertBox.php";?>


</div>

<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <?php if(!isset($_GET['modify'])):?>
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="src\public\pictures\site\add.png" height="500px" width="450px" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Ajouter un film</h1>
                <p class="font-italic text-muted mb-0">Ajouter un de vos films préféré à la bibliotèque.</p>
            </div>
        <?php else:?>
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="src\public\films_files\<?php echo $filmChosen['film_picture'];?>" class="shadow p-3 mb-5 bg-body rounded"  height="500px" width="450px" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h3>Modifier '<?= $filmChosen['film_title'];?>'!</h3>
                <p class="font-italic text-muted mb-0">Faites quelques modifications à votre film.</p>
            </div>

        <?php endif;?>

        <!--  Form -->
        <div class="col-md-7 col-lg-6 ml-auto shadow p-3 mb-5 bg-body rounded">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">

                    <!-- Film title -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-video text-muted"></i>
                            </span>
                        </div>
                        <input type="text" name="film_title" placeholder="Titre du film" class="form-control bg-white border-left-0 border-md" value="<?php if(isset($filmChosen)){echo $filmChosen['film_title'];}?>">
                    </div>

                    <!-- Film picture -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-image text-muted"></i>
                            </span>
                        </div>
                        <input type="file" name="film_picture" class="form-control bg-white border-left-0 border-md" value="<?php if(isset($filmChosen)){echo $filmChosen['film_picture'];}?>">
                    </div>

                    <!-- Film description -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-book-open-reader text-muted"></i>
                            </span>
                        </div>
                        <textarea cols="8" rows="3" name="film_desc" placeholder="Description" class="form-control bg-white border-left-0 border-md"> <?php if(isset($filmChosen)){echo $filmChosen['film_desc'];}?></textarea>
                    </div>

                    <!-- Film date release -->
                    <div class="input-group col-lg-12 mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-calendar text-muted"></i>
                            </span>
                        </div>

                        <input type="date" name="film_date" placeholder="" class="form-control bg-white border-md border-left-0 pl-3" value="<?php if(isset($filmChosen)){echo $filmChosen['film_date'];}?>" >
                    </div>.


                    <!-- Film categories -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-inbox text-muted"></i>
                            </span>
                        </div>
                        <select name="film_cat" class="form-control custom-select bg-white border-left-0 border-md">
                            <option class="hidden" <?php if (!isset($filmChosen)) {
                                                        echo "selected";
                                                    } ?> disabled>catégorie du film *</option>
                            <?php for ($i = 0; $i < count($categories); $i++) : ?>
                                <option value="<?php if(isset($filmChosen)){echo $filmChosen['categorie_id'];}else{echo $categories[$i]['categorie_id'];}?>"><?php if(isset($filmChosen)){echo $filmChosen['categorie_name'];}else{echo $categories[$i]['categorie_name'];}?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <!-- Film director -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <select name="film_director" class="form-control custom-select bg-white border-left-0 border-md">
                            <option class="hidden" <?php if (!isset($filmChosen)){
                                                        echo "selected";
                                                    } ?> disabled>réalisateur du film *</option>
                            <?php for ($i = 0; $i < count($categories); $i++) : ?>
                                <option value="<?php if(isset($filmChosen)){echo $filmChosen['director_id'];}else{echo $directors[$i]['director_id'];}?>"><?php if(isset($filmChosen)){echo $filmChosen['director_name'];}else{echo $directors[$i]['director_name'];}?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <!-- Film trailer -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-film text-muted"></i>
                            </span>
                        </div>
                        <input type="text" name="film_trailer" placeholder="lien bande annonce..." class="form-control bg-white border-left-0 border-md"  value="<?php if(isset($filmChosen)){echo $filmChosen['film_trailer'];}?>">
                    </div>


                    <!-- Film duration -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-clock text-muted"></i>
                            </span>
                        </div>
                        <input type="time" min="00:00" max="23:59" name="film_duration" class="form-control bg-white border-left-0 border-md"  value="<?php if(isset($filmChosen)){echo $filmChosen['film_duration'];}?>">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary"><?php if(isset($_GET['modify'])){echo 'Modifier';}else{echo 'Ajouter';}?></button>
                    </div>



                </div>
            </form>
        </div>
    </div>
</div>