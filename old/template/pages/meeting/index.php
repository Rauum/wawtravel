<?php foreach ($data['meetings'] as $meeting) { ?>
    <article>
        <h2>
            <?php echo ($meeting->getImportant() == 1) ? '<i class="fa-solid fa-circle-exclamation"></i>' : ''; ?>
            <?= $meeting->getTitle() ?>
        </h2>
        <p>le <?= $meeting->getDate() ?></p>
        <p></p>
        <a href="?page=show_meeting&id=<?= $meeting->getId() ?>" role="button" class="secondary">Détails</a>
        <a href="?page=remove_meeting&id=<?= $meeting->getId() ?>" role="button" class="contrast"><i class="fa-solid fa-trash"></i> Supprimer</a>
    </article>
<?php } ?>
