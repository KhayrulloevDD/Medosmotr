<?php

namespace App\Models;

class Patients extends Base {

    public function __construct(){
        parent::__construct();
    }

    public function getAllPatientsByType($type) {
        $query = "SELECT * FROM raspisanie WHERE type='$type'";
        $result = $this->db->query($query);

        $rows = [];
        while ($row = $result->fetch_array()) {
            $rows[] = $row;
        }

        return $rows;
    }
}
