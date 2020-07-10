<?php namespace App\Admin;

// Parent
class Admin{
    protected $schedules;
    protected $airport;
    protected $maskapai;

    function __construct()
    {
        $this->get_jadwal();
        $this->get_airport();
        $this->get_maskapai();
    }

    function get_jadwal(){
        $filename = "data-penerbangan.json";
        $open_file = fopen($filename, "a+");
        $dataJson = fread($open_file, filesize($filename));
        return $this->schedules = json_decode($dataJson, true);
    }

    function get_airport(){
        $filename = "area.json";
        $open_file = fopen($filename, "a+");
        $dataJson = fread($open_file, filesize($filename));
        return $this->airport = json_decode($dataJson, true);
    }

    function get_maskapai(){
        $filename = "data-maskapai.json";
        $open_file = fopen($filename, "a+");
        $dataJson = fread($open_file, filesize($filename));
        return $this->maskapai = json_decode($dataJson, true);
    }

}

?>