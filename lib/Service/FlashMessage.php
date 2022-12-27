<?php

namespace Plugo\Service;

class FlashMessage {
    public function create_flash_message(string $message, string $type)
    {
        $FLASH = 'FLASH_MESSAGES';
        // remove existing message with the name
        if (isset($_SESSION[$FLASH])) {
            unset($_SESSION[$FLASH]);
        }
        // add the message to the session
        $_SESSION[$FLASH] = ['message' => $message, 'type' => $type];
        return $_SESSION[$FLASH];
    }

}