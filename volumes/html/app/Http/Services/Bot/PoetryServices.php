<?php

namespace App\Http\Services\Bot;

use app\Models\DefaultMessage;
use App\Models\Poetry;
use Exception;
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
        try {
            /** @var  Poetry $poetry */
            $poetry = Poetry::query()
                ->where('is_send', '=', false)
                ->first();
            if (is_null($poetry)) {
                /** @var  DefaultMessage $defaultMessage */
                $defaultMessage = DefaultMessage::query()
                    ->where('code', '=', DefaultMessage::TYPE_POETRY)
                    ->select('message')
                    ->first();
                $bot->sendMessage($message->getChat()->getId(), $defaultMessage->getMessage(), 'HTML', true, null, $keyboard);
            }
            $poetry->setIsSend(true);
            $poetry->save();

            $bot->sendMessage($message->getChat()->getId(), $poetry->getPoetry(), 'HTML', true, null, $keyboard);
        } catch (Exception $e) {
            /** @var  DefaultMessage $defaultMessage */
            $defaultMessage = DefaultMessage::query()
                ->where('code', '=', DefaultMessage::TYPE_ERROR)
                ->select('message')
                ->first();
            Log::error('Ошибка:' . $e->getMessage());
            $bot->sendMessage($message->getChat()->getId(), $defaultMessage->getMessage(), 'HTML', true, null, $keyboard);
        }
    }
}
