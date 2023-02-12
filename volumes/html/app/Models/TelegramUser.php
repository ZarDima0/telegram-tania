<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
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
}
