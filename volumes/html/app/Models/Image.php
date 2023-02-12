<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property string $path
 * @property bool $is_send
 */
class Image extends Model
{
    use HasFactory;

    protected $table = 'image';

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
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
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
     * @return Image
     */
    public function setIsSend(bool $is_send): Image
    {
        $this->is_send = $is_send;

        return $this;
    }
}
