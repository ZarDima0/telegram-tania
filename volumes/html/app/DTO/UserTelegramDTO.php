<?php

namespace App\DTO;

class UserTelegramDTO
{

    /**
     * @var string|null
     */
     private string|null $firstName;

    /**
     * @var string
     */
    private string|null $userName;

    /**
     * @var int|null
     */
    private int|null $id;

    /** ``
     * @return string|null
     */
    public function getFirstName(): string|null
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return UserTelegramDTO
     */
    public function setFirstName(string|null $firstName): UserTelegramDTO
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserName(): string|null
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     * @return UserTelegramDTO
     */
    public function setUserName(string|null $userName): UserTelegramDTO
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): int|null
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return UserTelegramDTO
     */
    public function setId(int|null $id): UserTelegramDTO
    {
        $this->id = $id;

        return $this;
    }
}
