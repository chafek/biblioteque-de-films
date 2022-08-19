<h1 class="text-center"><?= $filmChosen['film_title']; ?></h1>

<?php var_dump($filmChosen); ?>
<div class="container ">
  <div class="row align-items-center">
    <div class="col-6 mx-auto">
      <div class="card text-center" style="height: 35rem;">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?= $filmChosen['film_title']; ?></h5>
          <p class="fs-4 text-secondary">categorie: <?= $filmChosen['categorie_name']; ?> (durée:<?= $filmChosen['film_duration']; ?>)</p>
          <p class="fs-6 fw-light"><?= $filmChosen['film_title']; ?> a été réalisé le <?= $filmChosen['film_date']; ?>
            par <span class="fw-bolder"><?= $filmChosen['director_name']; ?></span></p>
          <p><?php if (!empty($filmChosen['film_desc'])) {
                echo $filmChosen['film_desc'];
              } ?></p>
          <a href="#" class="btn btn-outline-danger text-black">Modifier</a>
        </div>
      </div>



    </div>
    <div class="col-6 mx-auto">
      <div class="card text-center" style="height: 35rem;">
        <div class="ratio ratio-16x9">
          <img src="src\public\pictures\site\rank.svg" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-title">Gerer <?= $filmChosen['film_title']; ?></h5>
          <p>Vous pouvez organiser votre bibliotèque en fonction de vos goûts</p>

          <div class="mb-5">
            <a href="#" class="btn btn-outline-primary text-black">Archiver</a>
            <a href="#" class="btn btn-outline-danger text-black">Supprimer</a>
          </div>
          <hr>
          <div>
            <form action='' method='post'>
              <label for='customRange1' class='form-label'>Note</label>
              <input name='rank_range' type='range' class='form-range-sm' min='0' max='5' id='customRange2'>
              <button type='submit' class='btn btn-secondary btn-sm'>valider la note</button>
            </form>
          </div>


        </div>
      </div>



    </div>
  </div>
</div>