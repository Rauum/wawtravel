<?php

namespace App\Controller;

use App\Entity\Appointment;
use Plugo\Controller\AbstractController;
use App\Manager\AppointmentManager;

class AppointmentController extends AbstractController {

  public function index() {
    $appointmentManager = new AppointmentManager();
    return $this->renderView('appointment/index.php', [
      'appointments' => $appointmentManager->findAll()
    ]);
  }

  public function add() {
    if (!empty($_POST)) {
      $appointment = new Appointment();
      $appointmentManager = new AppointmentManager();
      $appointment->setTitle($_POST['title']);
      $appointment->setDetails($_POST['details']);
      $appointment->setStartAt($_POST['start_at']);
      if (isset($_POST['important'])) {
        $appointment->setImportant(1);
      } else {
        $appointment->setImportant(0);
      }
      $appointmentManager->add($appointment);
      return $this->redirectToRoute('index');
    }
    return $this->renderView('appointment/add.php', [
      'type' => 'add'
    ]);
  }

  public function show($params = []) {
    if (!empty($_GET['id'])) {
      $appointmentManager = new AppointmentManager();
      $appointment = $appointmentManager->find($_GET['id']);
      return $this->renderView('appointment/show.php', [
        'title' => $appointment->getTitle(),
        'appointment' => $appointment
      ]);
    }
  }

  public function edit() {
    if (!empty($_GET['id'])) {
      $appointmentManager = new AppointmentManager();
      $appointment = $appointmentManager->find($_GET['id']);
      if (!empty($_POST)) {
        $appointment->setTitle($_POST['title']);
        $appointment->setDetails($_POST['details']);
        $appointment->setStartAt($_POST['start_at']);
        if (isset($_POST['important'])) {
          $appointment->setImportant(1);
        } else {
          $appointment->setImportant(0);
        }
        $appointmentManager->edit($appointment);
        return $this->redirectToRoute('show', ['id' => $appointment->getId()]);
      }
      return $this->renderView('appointment/edit.php', [
        'title' => $appointment->getTitle() . ' (editer)',
        'appointment' => $appointment,
        'type' => 'edit'
      ]);
    }
  }

  public function delete() {
    if (!empty($_GET['id'])) {
      $appointmentManager = new AppointmentManager();
      $appointmentManager->remove($appointmentManager->find($_GET['id']));
      return $this->redirectToRoute('index');
    }
  }

}