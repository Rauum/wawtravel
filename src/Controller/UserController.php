<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use Plugo\Controller\AbstractController;
use Plugo\Service\FlashMessage;

class UserController extends AbstractController {

    public function register() {
        session_start();
        $flashMessage = new FlashMessage();
        if (!empty($_POST)) {
            //Verif si l'adresse mail est bonne
            $email = $_POST['email'];

            //Verif si l'adresse mail possède un compte
            $userManager = new UserManager();
            $verifEmail = $userManager->findOneBy(array('email'=>$_POST['email']));

            //Verif si le mdp possède au moins 10 caratères
            $passwordStrl = strlen($_POST['password']);

            //Verif si le mdp et le confirmdp sont identiques
            $confirmPassword = $_POST['confirmPassword'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $flashMessage->create_flash_message("Adresse mail invalide","error");
            }
            else if($verifEmail != false){
                $flashMessage->create_flash_message("Cette adresse mail possède déjà un compte","error");
            }
            elseif ($passwordStrl < 9){
                $flashMessage->create_flash_message("Le mot de passe doit avoir minimum 10 carateres","error");
            }
            elseif ($confirmPassword != $_POST['password'] ){
                $flashMessage->create_flash_message("Veuillez saisir deux mots de passe identiques","error");
            }
            else{
                $user = new User();
                $userManager = new UserManager();
                $user->setEmail($_POST['email']);
                $user->setPassword(password_hash($_POST['password'],PASSWORD_BCRYPT));
                $user->setCreatedAt(date('y-m-d h:i:s'));
                $userManager->add($user);
                return $this->redirectToRoute('index');
            }
        }
        return $this->renderView('user/register.php', [
            'type' => 'add'
        ]);
    }
}
