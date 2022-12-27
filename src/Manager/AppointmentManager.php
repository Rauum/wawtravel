<?php

namespace App\Manager;

use App\Entity\Appointment;
use Plugo\Manager\AbstractManager;

class AppointmentManager extends AbstractManager {

  public function find(int $id) {
    return $this->readOne(Appointment::class, $id);
  }

  public function findAll() {
    return $this->readMany(Appointment::class);
  }

  public function findBy(array $criteria, array $order){
      return $this->readMany(Appointment::class,$criteria,$order);
  }

  public function findOneBy(array $criteria){
      return $this->readOne(Appointment::class,null,$criteria);
  }

  public function add(Appointment $appointment) {
    return $this->create(Appointment::class, [
      'title' => $appointment->getTitle(),
      'details' => $appointment->getDetails(),
      'start_at' => $appointment->getStartAt(),
      'important' => $appointment->getImportant()
    ]);
  }

  public function edit(Appointment $appointment) {
    return $this->update(
      Appointment::class, [
        'title' => $appointment->getTitle(),
        'details' => $appointment->getDetails(),
        'start_at' => $appointment->getStartAt(),
        'important' => $appointment->getImportant()
      ],
      $appointment->getId()
    );
  }

  public function remove(Appointment $appointment) {
    return $this->delete(Appointment::class, $appointment->getId());
  }
  
}