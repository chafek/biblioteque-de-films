
<?php include "src/view/include/alertBox.php";?>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="src\public\picture\site\camera.png" alt="" />
            <h3>Bienvenue</h3>
            <p>Enregistrez un nouveau film dans la bibliotèque!</p>
        </div>

        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nouveau film</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Ajouter un film</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" name="film_title" class="form-control" placeholder="Titre du film *" value="<?php if (isset($filmToModify)) {
                                                                                                                                        echo $filmToModify[0]['film_title'];
                                                                                                                                    } ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="file" name="film_picture" value="<?php if (isset($filmToModify)) {
                                                                                        echo $filmToModify[0]['film_picture'];
                                                                                    } ?>">
                                        </div>
                                        <div class=" form-group">
                                    <textarea name="film_desc" cols="8" rows="3" class="form-control" placeholder="<?php if (isset($filmToModify)) {
                                                                                                                        echo $filmToModify[0]['film_desc'];
                                                                                                                    } else {
                                                                                                                        echo 'Description du film *';
                                                                                                                    } ?>"></textarea>

                                </div>
                                <div class="form-group">
                                    <input type="date" name="film_date" class="form-control" value="<?php echo date('Y-m-d');?>" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="film_cat">
                                        <option class="hidden" <?php if (!isset($filmToModify)) {
                                                                    echo "selected";
                                                                } ?> disabled>catégorie du film *</option>
                                        <?php for ($i = 0; $i < count($categories); $i++) : ?>

                                            <option <?php if (isset($filmToModify) && $filmToModify[0]['id_categorie'] == $categories[$i]['categorie_id']) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $categories[$i]['categorie_id']; ?>"><?= $categories[$i]['categorie_name']; ?></option>

                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="film_director">
                                        <option class="hidden" selected disabled>réalisateur du film *</option>
                                        <?php for ($i = 0; $i < count($directors); $i++) {
                                            echo "
                                                        <option value={$directors[$i]['director_id']}>{$directors[$i]['director_name']}</option>
                                                    ";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Bande annonce du film *" name="film_trailer" value="<?php if (isset($filmToModify)) {
                                                                                                                                                    echo $filmToModify[0]['film_trailer'];
                                                                                                                                                } ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="time" min="00:00" max="23:59" name="film_duration" class="form-control" value="<?php if (isset($filmToModify)) {
                                                                                                                                    $date = new DateTime($filmToModify[0]['film_duration']);
                                                                                                                                    echo $date->format('H:i');
                                                                                                                                } ?>" />
                                </div>

                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <!--  <a class="btn btn-primary mt-4" type="submit" href="index.php?page=show&chafek=true" role="button">Ajouter</a>-->
                                <!-- :<a href="index.php?page=show&chafek=true"type="submit" class="btnRegister"  value="ajouter">Ajouter</button>  -->
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>