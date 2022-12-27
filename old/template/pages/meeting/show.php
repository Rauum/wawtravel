 <article>
     <h2><?= $data['meeting']->getTitle() ?>, le <?= $data['meeting']->getDate() ?></h2>
     <p><?= $data['meeting']->getDetails() ?></p>
     <p><?php echo ($data['meeting']->getImportant() == 1) ? 'Rendez-vous important' : 'Rendez-vous moins important'; ?></p>
 </article>