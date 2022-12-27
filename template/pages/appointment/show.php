<h1>
  <?php if($data['appointment']->getImportant() === 1) { ?>
    <i class="fa-solid fa-circle-exclamation"></i>
  <?php } ?>
  <?= $data['appointment']->getTitle() ?>
</h1>
<p><?= $data['appointment']->displayDate() ?> <?= $data['appointment']->displayTime() ?></p>
<p><?= $data['appointment']->getDetails() ?></p>
<a href="?page=edit&id=<?= $data['appointment']->getId() ?>" role="button" class="secondary"><i class="fa-solid fa-pen-to-square"></i></a>
<a href="#" id="delete" role="button" class="secondary"><i class="fa-solid fa-trash"></i></a>

<script>
  const deleteButton = document.getElementById('delete');
  deleteButton.addEventListener('click', function(e) {
    e.preventDefault();
    if (confirm("Souhaitez-vous vraiment supprimer ce RDV ?"))
      location.href='?page=delete&id=' + <?= $data['appointment']->getId() ?>;
  })
</script>