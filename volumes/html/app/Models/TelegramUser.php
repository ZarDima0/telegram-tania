<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property boolean $is_notifications
 * @property Carbon $time
 * @property boolean $is_poetry_send
 * @property boolean $is_image_send
 */
class TelegramUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'telegram_user';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return TelegramUser
     */
    public function setUserId($user_id): TelegramUser
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return TelegramUser
     */
    public function setFirstName(string $first_name): TelegramUser
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNotifications(): bool
    {
        return $this->is_notifications;
    }

    /**
     * @param bool $is_notifications
     * @return TelegramUser
     */
    public function setIsNotifications(bool $is_notifications): TelegramUser
    {
        $this->is_notifications = $is_notifications;

        return $this;
    }

    /**
     * @return Carbon
     */
    public function getTime(): Carbon
    {
        return $this->time;
    }

    /**
     * @param Carbon $time
     * @return TelegramUser
     */
    public function setTime(Carbon $time): TelegramUser
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPoetrySend(): bool
    {
        return $this->is_poetry_send;
    }

    /**
     * @param bool $is_poetry_send
     * @return TelegramUser
     */
    public function setIsPoetrySend(bool $is_poetry_send): TelegramUser
    {
        $this->is_poetry_send = $is_poetry_send;

        return $this;
    }

    /**
     * @return bool
     */
    public function isImageSend(): bool
    {
        return $this->is_image_send;
    }

    /**
     * @param bool $is_image_send
     * @return TelegramUser
     */
    public function setIsImageSend(bool $is_image_send): TelegramUser
    {
        $this->is_image_send = $is_image_send;

        return $this;
    }
}
