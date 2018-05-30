<?php

namespace App\Models;

class Patient extends Base
{
    public $name;
    public $group;
    public $email;
    public $phone;
    public $date;
    public $time;
    public $type;

    public $exists = false;

    public function __construct($id = ''){
        parent::__construct();

        if (trim($id)) {
            $this->get($id);
        }

    }

    public function getById($id){
        $query = "SELECT * FROM raspisanie WHERE id = '$id'";
        $result = $this->db->query($query)->fetch_array();
        if (!empty($result)) {
            $this->exists = true;

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->group = $result['gr'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
            $this->date = $result['date'];
            $this->time = $result['time'];
            $this->type = $result['type'];
        }
    }

    //Добавить пациента
    public function savePatient(){
        $query = "INSERT INTO raspisanie (name, gr, email, phone, date, time, type) VALUES ('$this->name', '$this->group', '$this->email', '$this->phone', '$this->date', '$this->time', '$this->type')";
        $this->db->query($query);
    }

    //Удалить пациента
    public function removePatient($id){
        $query = "DELETE FROM raspisanie where id='$id'";
        $this->db->query($query);
    }
}