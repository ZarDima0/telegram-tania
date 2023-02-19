<?php

namespace App\Http\Services\Bot;

use App\DTO\UserTelegramDTO;
use App\Http\Services\SendMessageBot\ImageServices;
use App\Http\Services\SendMessageBot\PoetryServices;
use App\Http\Services\SendMessageBot\StartServices;
use Exception;
use Illuminate\Support\Facades\Log;
use TelegramBot\Api\Client;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class BotServices
{

    public array $keyboard = [
        [
            ['callback_data' => 'image', 'text' => 'Картинка'],
            ['callback_data' => 'poetry', 'text' => 'Стишок'],
        ]
    ];


    /**
     * @param UserTelegramDTO $telegramDTO
     * @return void
     */
    public function index(UserTelegramDTO $telegramDTO): void
    {
        $bot = new Client(config('app.telegram_token'));
        $startKeyboard = new InlineKeyboardMarkup($this->keyboard);

        $bot->command('start', function ($message) use ($bot, $telegramDTO, $startKeyboard) {
            $telegramServices = new TelegramServices;
            $telegramServices->create($telegramDTO);

            (new StartServices())->sendMessage($bot, $message, $startKeyboard);
        });


        $bot->on(function ($Update) use ($bot, $startKeyboard) {
            $callback = $Update->getCallbackQuery();
            $message = $callback->getMessage(); // получаем сообщение
            $cid = $callback->getFrom()->getId(); // уникальный идентификатор chat_id
            $data = $callback->getData(); // название команды переданный с кнопки у сообщения

            if ($data == "poetry") {
                $poetry = new PoetryServices();
                $poetry->sendMessage($bot, $message, $startKeyboard);
            }
            if ($data == "image") {
                $poetry = new ImageServices();
                $poetry->sendMessage($bot, $message, $startKeyboard);
            }

            if (empty($data)) return true; else return false;

        }, function ($Update) {
            try {
                $callback = $Update->getCallbackQuery();
                if (is_null($callback) || !strlen($callback->getData()))
                    return false;
                return true;
            } catch (Exception $e) {
                Log::error($e);
                return false;
            }
        });

        if (!empty($bot->getRawBody())) {
            try {
                $bot->run();
            } catch (Exception $e) {
                Log::error($e);
            }
        }
    }
}
