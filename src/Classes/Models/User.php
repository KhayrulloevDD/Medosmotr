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
        $query = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
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

    public function getScheduleById($id){
        $query = "SELECT * FROM schedule WHERE id_doc = '$id'";
        $result = $this->db->query($query);
        $data;
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
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

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    // Добавить врача
    public function saveDoc(){
        $query = "INSERT INTO users (fullName, login, password, role, type, description) VALUES ('$this->fullName', '$this->login', '$this->password', '$this->role', '$this->type', '$this->description')";
        $result = $this->db->query($query);
        $id = mysqli_insert_id($this->db);

        $query = "INSERT INTO schedule (id_doc, day, start_time, end_time, day_off) VALUES ('$id', '1', '8:30', '16:00', '0')";
        $this->db->query($query);
        $query = "INSERT INTO schedule (id_doc, day, start_time, end_time, day_off) VALUES ('$id', '2', '8:30', '16:00', '0')";
        $this->db->query($query);
        $query = "INSERT INTO schedule (id_doc, day, start_time, end_time, day_off) VALUES ('$id', '3', '8:30', '16:00', '0')";
        $this->db->query($query);
        $query = "INSERT INTO schedule (id_doc, day, start_time, end_time, day_off) VALUES ('$id', '4', '8:30', '16:00', '0')";
        $this->db->query($query);
        $query = "INSERT INTO schedule (id_doc, day, start_time, end_time, day_off) VALUES ('$id', '5', '8:30', '16:00', '0')";
        $this->db->query($query);
        $query = "INSERT INTO schedule (id_doc, day, start_time, end_time, day_off) VALUES ('$id', '6', '8:30', '16:00', '1')";
        $this->db->query($query);
        $query = "INSERT INTO schedule (id_doc, day, start_time, end_time, day_off) VALUES ('$id', '7', '8:30', '16:00', '1')";
        $this->db->query($query);
    }

    public function updateSchedule($monday_start, $monday_end, $monday_checkbox, $tuesday_start, $tuesday_end, $tuesday_checkbox, $wednesday_start, $wednesday_end, $wednesday_checkbox, $thursday_start, $thursday_end, $thursday_checkbox, $friday_start, $friday_end, $friday_checkbox, $saturday_start, $saturday_end, $saturday_checkbox, $sunday_start, $sunday_end, $sunday_checkbox){
        $id = 1; // need to define ID
        $query = "UPDATE schedule SET start_time = '$monday_start', end_time = '$monday_end', day_off = '$monday_checkbox' WHERE id_doc = '$id' AND day = '1'";
        $this->db->query($query);
        $query = "UPDATE schedule SET start_time = '$tuesday_start', end_time = '$tuesday_end', day_off = '$tuesday_checkbox' WHERE id_doc = '$id' AND day = '2'";
        $this->db->query($query);
        $query = "UPDATE schedule SET start_time = '$wednesday_start', end_time = '$wednesday_end', day_off = '$wednesday_checkbox' WHERE id_doc = '$id' AND day = '3'";
        $this->db->query($query);
        $query = "UPDATE schedule SET start_time = '$thursday_start', end_time = '$thursday_end', day_off = '$thursday_checkbox' WHERE id_doc = '$id' AND day = '4'";
        $this->db->query($query);
        $query = "UPDATE schedule SET start_time = '$friday_start', end_time = '$friday_end', day_off = '$friday_checkbox' WHERE id_doc = '$id' AND day = '5'";
        $this->db->query($query);
        $query = "UPDATE schedule SET start_time = '$saturday_start', end_time = '$saturday_end', day_off = '$saturday_checkbox' WHERE id_doc = '$id' AND day = '6'";
        $this->db->query($query);
        $query = "UPDATE schedule SET start_time = '$sunday_start', end_time = '$sunday_end', day_off = '$sunday_checkbox' WHERE id_doc = '$id' AND day = '7'";
        $this->db->query($query);
    }

    // Удалить врача
    public function removeDoc($login){
        $query = "DELETE FROM users where login = '$login'";
        $this->db->query($query);
    }
}