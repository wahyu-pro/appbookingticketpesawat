<?php
require_once 'App/init.php';
require_once 'Login.php';

class Auth extends Login{
    function login($data){
        if($data['username'] == $this->users['username'] and $data['password'] == $this->users['password']){
            
        }
    }
}

?>