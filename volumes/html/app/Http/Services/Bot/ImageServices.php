<?php

namespace App\Http\Services\Bot;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageServices
{
    /**
     * @param $bot
     * @param $message
     * @param $keyboard
     * @return void
     */
    public function sendImage($bot, $message, $keyboard): void
    {
        $image = Image::query()
            ->where('is_send', '=', false)
            ->first();

        if (is_null($image)) {
            $bot->sendMessage($message->getChat()->getId(), 'Хватит просить картинки на сегодня все', 'HTML', true, null, $keyboard);
            return;
        }

        $image->setIsSend(true);
        $image->save();
        $bot->sendPhoto($message->getChat()->getId(), asset(Storage::url($image->getPath())));
    }
}
