<h1>Mon agenda</h1>

<?php foreach($data['appointments'] as $appointment) { ?>
  <article>
    <h2>
      <?php if($appointment->getImportant() === 1) { ?>
        <i class="fa-solid fa-circle-exclamation"></i>
      <?php } ?>
      <?= $appointment->getTitle() ?>
    </h2>
    <p><?= $appointment->displayDate() ?> <?= $appointment->displayTime() ?></p>
    <a href="?page=show&id=<?= $appointment->getId() ?>" role="button">Détails</a>
  </article>
<?php } ?>