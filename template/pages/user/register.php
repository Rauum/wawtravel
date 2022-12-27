<?php
if (isset ($_SESSION['FLASH_MESSAGES'])){ ?>
    <div class='alert <?= $_SESSION['FLASH_MESSAGES']["type"]?>'>
        <?php echo $_SESSION['FLASH_MESSAGES']["message"];?>
    </div>
<?php } ?>
<form action="" method="POST">
    <div class="form-item">
        <label for="email">Email</label>
        <input
            type="email" name="email" id="email" required
            <?php if ($data['type'] == 'email') { echo 'value="' . $data['user']->getEmail() .'"'; } ?>
        >
    </div>
    <div class="form-item">
        <label for="password">Mot de passe</label>
        <input
            type="password" name="password" id="password" required
            <?php if ($data['type'] == 'password') { echo 'value="' . $data['user']->getPassword() .'"'; } ?>
        >
    </div>
    <div class="form-item">
        <label for="confirmPassword">Confirmer le mot de passe</label>
        <input type="password" name="confirmPassword" id="confirmPassword" required>
    </div>
    <div class="form-item">
        <input
            type="submit"
            <?php
            if ($data['type'] == 'add') {
                echo 'value="Ajouter"';
            } else {
                echo 'value="Modifier"';
            }
            ?>
        >
    </div>
</form>