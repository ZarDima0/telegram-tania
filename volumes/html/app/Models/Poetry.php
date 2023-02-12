<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $poetry
 * @property bool $is_send
 */
class Poetry extends Model
{
    use HasFactory;

    protected $table = 'poetry';
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPoetry(): string
    {
        return $this->poetry;
    }

    /**
     * @param string $poetry
     * @return Poetry
     */
    public function setPoetry(string $poetry): Poetry
    {
        $this->poetry = $poetry;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSend(): bool
    {
        return $this->is_send;
    }

    /**
     * @param bool $is_send
     * @return Poetry
     */
    public function setIsSend(bool $is_send): Poetry
    {
        $this->is_send = $is_send;

        return $this;
    }
}
