<?php

namespace App\Http\Services\SendMessageBot;

use App\Models\DefaultMessage;
use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ImageServices implements SendMessageBotInterface
{
    public function sendMessage($bot, $message, $keyboard)
    {
        try {
            /** @var  Image $image */
            $image = Image::query()
                ->where('is_send', '=', false)
                ->first();

            if (is_null($image)) {
                /** @var  DefaultMessage $defaultMessage */
                $defaultMessage = DefaultMessage::query()
                    ->where('code', '=', DefaultMessage::TYPE_IMAGE)
                    ->select('message')
                    ->first();

                $bot->sendMessage($message->getChat()->getId(), $defaultMessage->getMessage(), 'HTML', true, null, $keyboard);
                return;
            } else {
                $image->setIsSend(true);
                $image->save();
                $bot->sendPhoto($message->getChat()->getId(), asset(Storage::url($image->getPath())));
            }
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
