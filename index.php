<?php
require_once 'App/init.php';
require_once 'Login.php';

class Auth extends Login{
    function login($data){
        $getUser = array_filter($this->users, function($v) use($data) {return($v['username'] == $data["username"] and $v["password"] == $data["password"]);});
        if ($getUser) {
            $role = array_map(function($v){return($v["role"]);}, $getUser);
            $key = array_keys($role);
            $key = implode(" ", $key);
            if ($role[$key] == "admin"){
                echo "======= Hallo admin ! ======= \n";
                $this->view_jadwal();
                while(true){
                    echo "=======Action=======";
                    echo "\nadd  \nremove  \nupdate \n";
                    echo "Silahkan pilih action : ";
                    $choose = trim(fgets(STDIN));
                    if ($choose) {
                        $this->choose_action($choose);
                        echo "========================== \n";
                    }else{
                    break;
                    }
                }
                echo "\n";
                echo "Terima kasih !!!";
            }else{
                echo "======= Hallo customers =======";
            }
        }else{
            echo "Notice : username or password wrong";
        }
    }
}

echo "==========Login==========";
echo "\n";
echo "Masukan username : ";
$username = trim(fgets(STDIN));
echo "Masukan password : ";
$password = trim(fgets(STDIN));

$auth = new Auth();
$auth->login(["username" => $username, "password" => $password]);
echo "\n";




?>