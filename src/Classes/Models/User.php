<?php

namespace App\Models;

class User
{
    public $username;

    public $photo;

    public $role;

    public $login;

    public $password;

    public function __construct($id = '') {}

    public static function get($id)
    {
        return new self();
    }

    public function remove()
    {
        // @todo remove user with current id
    }

    public function save()
    {
        // @todo save new user or update existed
    }
}