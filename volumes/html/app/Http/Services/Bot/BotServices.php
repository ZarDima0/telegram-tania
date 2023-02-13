<?php

namespace App\Http\Services\Bot;

use App\Models\DefaultMessage;
use Exception;
use Illuminate\Support\Facades\Log;
use TelegramBot\Api\Client;
use TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia;
use TelegramBot\Api\Types\InputMedia\InputMediaPhoto;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;
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
     * @param $webhook
     * @return void
     */
    public function index($webhook): void
    {
        $bot = new Client('5820172639:AAGRl8rmqEoO8-nd0rOz-jM3o3I_7G4EZF8');

        $startKeyboard = new InlineKeyboardMarkup($this->keyboard);

        $bot->command('start', function ($message) use ($bot, $webhook, $startKeyboard) {
            $telegramServices = new TelegramServices;
            $telegramServices->create(
                $webhook['message']['from']['first_name'],
                $webhook['message']['from']['username'],
                $webhook['message']['from']['id'],
            );

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
                $startKeyboard
            );
        });


        $bot->on(function ($Update) use ($bot, $startKeyboard) {
            $callback = $Update->getCallbackQuery();
            $message = $callback->getMessage(); // получаем сообщение
            $cid = $callback->getFrom()->getId(); // уникальный идентификатор chat_id
            $data = $callback->getData(); // название команды переданный с кнопки у сообщения

            if ($data == "poetry") {
                $poetry = new PoetryServices();
                $poetry->sendPoetry($bot, $message, $startKeyboard);
            }
            if ($data == "image") {
                $poetry = new ImageServices();
                $poetry->sendImage($bot, $message, $startKeyboard);
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
