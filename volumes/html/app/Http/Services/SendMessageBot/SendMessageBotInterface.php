<?php

namespace App\Http\Services\SendMessageBot;

interface SendMessageBotInterface
{
    /**
     * @param $bot
     * @param $message
     * @param $keyboard
     * @return mixed
     */
    public function sendMessage($bot, $message, $keyboard);
}
