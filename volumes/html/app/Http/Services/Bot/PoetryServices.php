<?php

namespace App\Http\Services\Bot;

use App\Models\Poetry;
use Illuminate\Support\Facades\Log;

class PoetryServices
{
    /**
     * @param $bot
     * @param $message
     * @param $keyboard
     * @return void
     */
    public function sendPoetry($bot, $message, $keyboard): void
    {
        $poetry = Poetry::query()
            ->where('is_send', '=', false)
            ->first();
        if (is_null($poetry)) {
            $bot->sendMessage($message->getChat()->getId(), 'Сорри, но хватит тыкать на кнопку', 'HTML', true, null, $keyboard);
        }
        $poetry->setIsSend(true);
        $poetry->save();

        $bot->sendMessage($message->getChat()->getId(), $poetry->getPoetry(), 'HTML', true, null, $keyboard);
    }
}
