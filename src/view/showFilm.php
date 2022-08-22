<h1 class="text-center mb-5"><?= $filmChosen['film_title']; ?></h1>
<?php include "src/view/include/alertBox.php"; ?>
<div class="container mb-5">
  <div class="row align-items-center">
    <div class="col-6 mx-auto">
      <div class="card text-center" style="height: 40rem;">
        <div class="ratio ratio-16x9">
          <iframe src="<?= $filmChosen['film_trailer']; ?>" title="YouTube video" allowfullscreen></iframe>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?= $filmChosen['film_title']; ?></h5>
          <p class="fs-4 text-secondary">categorie: <?= $filmChosen['categorie_name']; ?> (durée:<?= $filmChosen['film_duration']; ?>)</p>
          <p class="fs-6 fw-light"><?= $filmChosen['film_title']; ?> a été réalisé le <?= $filmChosen['film_date']; ?>
            par <span class="fw-bolder"><?= $filmChosen['director_name']; ?></span></p>
          <p><?php if (!empty($filmChosen['film_desc'])) {
                echo $filmChosen['film_desc'];
              } ?></p>
              
          <div class="mt-3">
            <?php $stars=isset($filmStarsNumber)?$filmStarsNumber['film_rank']:0?>
            <?php for ($i = 0; $i < 5; $i++) : ?>
           
                <?php if ($stars> 0) :  ?>
                  <img src='src/public/pictures/site/note.png' alt='rank film stars'>
                  <?php $stars--; ?>
                <?php else : ?>
                  <img src='src/public/pictures/site/note_vide.png' alt='rank film stars'>
                <?php endif; ?>
              
            <?php endfor; ?>
          </div>
          <a href="index.php?page=add&id=<?= $_GET['id']; ?>&modify=true" class="btn btn-outline-danger text-black mt-3">Modifier</a>
        </div>
      </div>



    </div>
    <div class="col-6 mx-auto">
      <div class="card text-center" style="height: 40rem;">
        <div class="ratio ratio-16x9">
          <img src="src\public\pictures\site\rank.svg" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-title">Gerer <?= $filmChosen['film_title']; ?></h5>
          <p>Vous pouvez organiser votre bibliotèque en fonction de vos goûts</p>

          <div class="mb-5">
            <?php if ($filmChosen['film_archive'] === "0") : ?>
              <a href="index.php?page=list&filter=true&toArchive=true&id=<?php echo $_GET['id']; ?>" class="btn btn-outline-primary text-black">Archiver</a>

            <?php else : ?>
              <a href="index.php?page=list&toArchive=true&id=<?php echo $_GET['id']; ?>" class="btn btn-outline-danger text-black">Desarchiver</a>
            <?php endif; ?>
            <a href="index.php?page=list&id=<?php echo $_GET['id']; ?>&toDelete=true" class="btn btn-outline-danger text-black">Supprimer</a>
          </div>
          <hr>
          <div>
            <form action='' method='post'>
              <div class="row d-flex justify-content-center">
                <div class="col-5 ">
                  <label for='customRange1' class='form-label '>N0TER =</label><span id="rangeval"> </span>
                  <input name='rank_range' type='range' class='form-range-sm mt-1'  min='0' max='5' id='customRange1' <?php if($filmStarsNumber['film_rank']>0){echo 'disabled';}?> onchange="document.getElementById('rangeval').innerText=document.getElementById('customRange1').value"> 
                  
                  <button type='submit' class='btn btn-secondary btn-sm'<?php if($filmStarsNumber['film_rank']>0){echo 'disabled';}?>>valider la note</button>
                </div>
               
              </div>
          
   
            </form>



          </div>



        </div>
      </div>



    </div>
  </div>
</div>