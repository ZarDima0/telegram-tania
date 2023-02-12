<?php

namespace App\Http\Services\Bot;

use App\Models\TelegramUser;

class TelegramServices
{
    /**
     * @param string $firstName
     * @param string $userName
     * @param int $intUser
     * @return void
     */
    public function create(string $firstName, string $userName, int $intUser): void
    {

        if (!$this->checkTelegramUser($userName)) {
            TelegramUser::query()
                ->create([
                    'user_name' => $userName,
                    'user_id' => $intUser,
                    'first_name' => $firstName,
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
