<?php

const ROUTES = [
    'index' => [
        'controller' => App\Controller\AppointmentController::class,
        'method' => 'index'
    ],
    'show' => [
        'controller' => App\Controller\AppointmentController::class,
        'method' => 'show'
    ],
    'add' => [
        'controller' => App\Controller\AppointmentController::class,
        'method' => 'add'
    ],
    'edit' => [
        'controller' => App\Controller\AppointmentController::class,
        'method' => 'edit'
    ],
    'delete' => [
        'controller' => App\Controller\AppointmentController::class,
        'method' => 'delete'
    ],
    'user_register' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'register'
    ],

];