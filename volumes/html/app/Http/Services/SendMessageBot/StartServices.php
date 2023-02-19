<?php

namespace App\Http\Services\SendMessageBot;

use App\Models\DefaultMessage;

class StartServices implements SendMessageBotInterface
{

    /**
     * @param $bot
     * @param $message
     * @param $keyboard
     * @return mixed|void
     */
    public function sendMessage($bot, $message, $keyboard)
    {
        /** @var  DefaultMessage $defaultMessage */
        $defaultMessage = DefaultMessage::query()
            ->where('code', '=', DefaultMessage::TYPE_START)
            ->select('message')
            ->first();

        $bot->sendMessage(
            $message->getChat()->getId(),
            $defaultMessage->getMessage(),
            'HTML',
            true,
            null,
            $keyboard
        );
    }
}
