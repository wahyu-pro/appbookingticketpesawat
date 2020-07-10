<?php
require_once 'App/init.php';
// use App\Customers\Customers as customer;
require_once 'Login.php';
require_once 'Auth.php';


echo "==========Login==========";
echo "\n";
echo "Masukan username : ";
$username = trim(fgets(STDIN));
echo "Masukan password : ";
$password = trim(fgets(STDIN));

$auth = new Auth();
$auth->login(["username" => $username, "password" => $password]);

// echo "\n";
// use App\Customers\Customers as customer;





?>