<?php
namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\User;

class UserManager extends AbstractManager {

    public function findOneBy(array $criteria){
        return $this->readOne(User::class,null,$criteria);
    }

    public function add(User $user) {
        return $this->create(User::class, [
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'created_at' => $user->getCreatedAt()
        ]);
    }
}