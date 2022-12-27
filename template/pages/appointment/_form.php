<form action="" method="POST">
  <div class="form-item">
    <label for="title">Intitulé</label>
    <input
      type="text" name="title" id="title" required
      <?php if ($data['type'] == 'edit') { echo 'value="' . $data['appointment']->getTitle() .'"'; } ?>
    >
  </div>
  <div class="form-item">
    <label for="details">Détails (optionnel)</label>
    <textarea name="details" id="details" rows="5"><?php if ($data['type'] == 'edit') { echo $data['appointment']->getDetails(); } ?></textarea>
  </div>
  <div class="grid">
    <div class="form-item">
      <label for="start_at">Date</label>
      <input
        type="datetime-local" name="start_at" id="start_at" required
        <?php if ($data['type'] == 'edit') { echo 'value="' . $data['appointment']->getStartAt() .'"'; } ?>
      >
    </div>
    <div class="form-item">
      <label for="important">Important ?
        <input
          type="checkbox" name="important" id="important"
          <?php if ($data['type'] == 'edit') {
            if ($data['appointment']->getImportant() === 1) echo 'checked';
          } ?>
        >
      </label>
    </div>
  </div>
  <div class="form-item">
    <input
      type="submit"
      <?php
        if ($data['type'] == 'add') {
          echo 'value="Ajouter"';
        } else {
          echo 'value="Editer"';
        }
      ?>
    >
  </div>
</form>