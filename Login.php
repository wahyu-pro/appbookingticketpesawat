<?php

class Login{
    protected $users;
    function __construct()
    {
        $this->get_users();
    }

    function get_users()
    {
        // handling file
        $filename = "users.json";
        $open_file = fopen($filename, "a+");
        $dataJson = fread($open_file, filesize($filename));
        return $this->users = json_decode($dataJson, true);
    }
}

?>