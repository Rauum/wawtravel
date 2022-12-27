<?php

namespace App\Manager;

use App\Entity\Meeting;
use Plugo\Manager\AbstractManager;

class MeetingManager extends AbstractManager {

    public function find(int $id){
        return $this->readOne(Meeting::class, array('id'=>$id));
    }

    public function findAll(){
        return $this->readMany(Meeting::class);
    }

    public function findBy($criteria,$order){
        return $this->readMany(Meeting::class,$criteria,$order);
    }

    public function findOneBy($criteria){
        return $this->readMany(Meeting::class,$criteria);
    }

    public function add(Meeting $meeting){
        return $this->create(Meeting::class, [
            'title' => $meeting->getTitle(),
            'date' => $meeting->getDate(),
            'details' => $meeting->getDetails(),
            'important' => $meeting->getImportant(),
        ]);
    }

    public function edit(){
        $this->update(Meeting::class,
            ['title' => 'Edit Offre n°4',],4);
    }

    public function remove(int $id){
        $this->delete(Meeting::class,$id);
    }

}