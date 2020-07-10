<?php namespace App\Customers;

// parent class
class Customers{

    public $schedule;

    function __construct()
    {
        $this->schedule = $this->get_schedule();
    }

    function get_schedule(){
        $filename = "data-penerbangan.json";
        $open_file = fopen($filename, "a+");
        $dataJson = fread($open_file, filesize($filename));
        return $this->schedule = json_decode($dataJson, true);
    }

}

?>