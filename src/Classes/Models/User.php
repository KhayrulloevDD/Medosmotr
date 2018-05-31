<?php

namespace App\Models;

class User extends Base
{
    public $id;
    public $login;
    public $password;
    public $type;
    public $role;
    public $fullName;
    public $description;

    public $exists = false;

    public function __construct($id = ''){
        parent::__construct();

        if (trim($id)) {
            $this->get($id);
        }

    }

    public function get($id){
        $query = "SELECT * FROM users WHERE id = $id LIMIT 1";
        $result = $this->db->query($query);
        $data = $result->fetch_array();

        if (!empty($data)) {
            $this->exists = true;

            $this->id = $data['id'];
            $this->fullName = $data['fullName'];
            $this->login = $data['login'];
            $this->password = $data['password'];
            $this->role = $data['role'];
            $this->type = $data['type'];
            $this->description = $data['description'];
        }
        return $data;
    }

    public function getByLoginAndPassword($login, $password){
        $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = $this->db->query($query)->fetch_array();
        if (!empty($result)) {
            $this->exists = true;

            $this->id = $result['id'];
            $this->fullName = $result['fullName'];
            $this->login = $result['login'];
            $this->password = $result['password'];
            $this->role = $result['role'];
            $this->type = $result['type'];
            $this->description = $result['description'];
        }
    }

    // Выбор всех врачей
    public function getAllDocs(){
        $query = "SELECT * FROM users WHERE role = '1'";
        $result = $this->db->query($query);
        return $result;
    }

    // Добавить врача
    public function saveDoc(){
        $query = "INSERT INTO users (fullName, login, password, role, type, description) VALUES ('$this->fullName', '$this->login', '$this->password', '$this->role', '$this->type', '$this->description')";
        $this->db->query($query);
    }
    // Удалить врача
    public function removeDoc($login){
        $query = "DELETE FROM users where login = '$login'";
        $this->db->query($query);
    }
}