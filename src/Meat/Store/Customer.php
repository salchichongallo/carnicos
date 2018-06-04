<?php

namespace Meat\Store;

use Meat\User;

class Customer
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var bool
     */
    protected $surveyMade = false;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param  User $user
     * @return void
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function surveyMade(): bool
    {
        return $this->surveyMade ?? false;
    }

    public function setSurveyMade(bool $value): void
    {
        $this->surveyMade = $value;
    }
}
