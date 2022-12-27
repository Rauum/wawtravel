<?php

namespace App\Controller;

use App\Entity\Meeting;
use App\Manager\MeetingManager;
use Plugo\Controller\AbstractController;

class MeetingController extends AbstractController {

    public function meeting() {
        $meetingManager = new MeetingManager();
        return $this->renderView('meeting/index.php', [
            'meetings' => $meetingManager->findAll()
        ]);
    }

    public function addMeeting() {
        if (!empty($_POST)) {
            $meeting = new Meeting();
            $meetingManager = new MeetingManager();
            $meeting->setTitle($_POST['title']);
            $meeting->setDate($_POST['date']);
            $meeting->setDetails($_POST['details']);
            if ($_POST['important'] == "on"){
                $meeting->setImportant(True);
            }
            else {
                $meeting->setImportant(False);
            }
            $meetingManager->add($meeting);
            return $this->redirectToRoute('meeting');
        }
        return $this->renderView('meeting/add.php');
    }

    public function showMeeting() {
        $meetingManager = new MeetingManager();
        return $this->renderView('meeting/show.php', [
            'meeting' => $meetingManager->find($_GET['id'])
        ]);
    }

    public function editMeeting(Meeting $meeting) {
        return $this->update(
            Meeting::class, [
            'title' => $meeting->getTitle(),
            'details' => $meeting->getDetails(),
            'start_at' => $meeting->getDate(),
            'important' => $meeting->getImportant()
        ],
            $meeting->getId()
        );
    }


    public function removeMeeting() {
        $meetingManager = new MeetingManager();
        $meetingManager->remove($_GET['id']);
        $this->redirectToRoute('meeting');
    }
}