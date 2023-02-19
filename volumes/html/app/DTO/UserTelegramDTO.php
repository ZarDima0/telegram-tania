<?php

namespace app\DTO;

class UserTelegramDTO
{

    /**
     * @var string
     */
     private string $firstName;

    /**
     * @var string
     */
    private string $userName;

    /**
     * @var int
     */
    private int $id;

    /** ``
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): UserTelegramDTO
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return UserTelegramDTO
     */
    public function setUserName(string $userName): UserTelegramDTO
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserTelegramDTO
     */
    public function setId(int $id): UserTelegramDTO
    {
        $this->id = $id;

        return $this;
    }
}
