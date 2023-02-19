<?php

namespace App\Http\Services\Bot;

use App\DTO\UserTelegramDTO;
use App\Models\TelegramUser;

class TelegramServices
{
    /**
     * @param UserTelegramDTO $telegramDTO
     * @return void
     */
    public function create(UserTelegramDTO $telegramDTO): void
    {
        if (!$this->checkTelegramUser($telegramDTO->getUserName())) {
            TelegramUser::query()
                ->create([
                    'user_name' => $telegramDTO->getUserName(),
                    'user_id' => $telegramDTO->getId(),
                    'first_name' => $telegramDTO->getFirstName(),
                ]);
        }
    }

    /**
     * @param string $userName
     * @return bool
     */
    public function checkTelegramUser(string $userName): bool
    {
        return TelegramUser::query()
            ->where('user_name', '=', $userName)
            ->exists();
    }
}
