<?php

namespace app\Http\Requests\Bot;

use App\DTO\UserTelegramDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class Webhook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * @return UserTelegramDTO
     */
    public function getTelegramWebhook(): UserTelegramDTO
    {
        return (new UserTelegramDTO())
            ->setId($this->input('message.from.id'))
            ->setUserName($this->input('message.from.username'))
            ->setFirstName($this->input('message.from.first_name'));
    }
}
