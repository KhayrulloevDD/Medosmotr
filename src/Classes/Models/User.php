<?php

namespace App\Models;

class User extends Base
{
    public $id;

    public $username;

    public $photo;

    public $role;

    public $login;

    public $password;

    public $exists = false;

    public function __construct($id = '') {
        parent::__construct();

        if (trim($id)) {
            $this->get($id);
        }

    }

    public function get($id) {
        $query = "SELECT * FROM users WHERE id = $id LIMIT 1";
        $result = $this->db->query($query);
        $data = $result->fetch_array();

        if (!empty($data)) {
            $this->exists = true;

            $this->username = $data['username'];
            $this->photo = $data['photo'];
            $this->login = $data['login'];
            $this->password = $data['password'];
            $this->role = $data['role'];
        }
    }

    public function getByLoginAndPassword($login, $password)
    {
        $query = "SELECT * FROM users WHERE login = {$login} AND password = {$password}";
        $result = $this->db->query($query)->fetch_array();
        if (!empty($result)) {
            $this->exists = true;

            $this->username = $result['username'];
            $this->photo    = $result['photo'];
            $this->login    = $result['login'];
            $this->password = $result['password'];
            $this->role     = $result['role'];
        }
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