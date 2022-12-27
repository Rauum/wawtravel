<?php

const ROUTES = [
    'meeting' => [
        'controller' => App\Controller\MeetingController::class,
        'method' => 'meeting'
    ],
    'add_meeting' => [
        'controller' => App\Controller\MeetingController::class,
        'method' => 'addMeeting'
    ],
    'show_meeting' => [
        'controller' => App\Controller\MeetingController::class,
        'method' => 'showMeeting'
    ],
    'remove_meeting' => [
        'controller' => App\Controller\MeetingController::class,
        'method' => 'removeMeeting'
    ],
    'edit_meeting' => [
        'controller' => App\Controller\MeetingController::class,
        'method' => 'editMeeting'
    ],
];