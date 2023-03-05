<?php

namespace App\Jobs;

use App\Models\Image;
use App\Models\Poetry;
use App\Models\TelegramUser;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use TelegramBot\Api\Client;

class ProcessSendMessageTime implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Client $bot)
    {
        $image = Image::query()->where('is_send', '=', false)->first();
        $poetry = Poetry::query()->where('is_send', '=', false)->first();

        $telegramUsers = TelegramUser::query()->where('is_notifications', '=', true)->get();

        if (!$telegramUsers->isNotEmpty()) {
            $bot->sendMessage('308914169', 'Пользователей у которых включены уведомления 0');
        }

        foreach ($telegramUsers as $user) {
            if (is_null($poetry) || is_null($image)) {
                $bot->sendMessage(
                    $user->getUserId(),
                    'Все закончилось:(',
                    'HTML',
                    true,
                    null,
                );
                return;
            }

            $bot->sendPhoto(
                $user->getUserId(),
                asset(Storage::url($image->getPath())),
            );
            $bot->sendMessage(
                $user->getUserId(),
                $poetry->getPoetry(),
                'HTML',
                true,
                null,
            );
        }
    }
}
