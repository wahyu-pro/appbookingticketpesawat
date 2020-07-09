<?php

require_once "./App/Customers/Customers.php";

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
                echo "Terima kasih !!! \n";
                echo "==========================";
            }else{
                echo "======= Hallo customers ======= \n";
                $customer = new Customers();
                $customer->view_schedule();
                while(true){
                    echo "Pesan Tiket ? (Y/N) ";
                    $choose = trim(fgets(STDIN));
                    if ($choose == "Y") {
                        echo "Silahkan pilih sesuai nomor ! ";
                        $no = trim(fgets(STDIN));
                        $customer->pesan_ticket($no);
                    }else{
                    break;
                    }
                }
                echo "============================= \n";
                echo "Terimakasih !!!";
            }
        }else{
            echo "Notice : username or password wrong";
        }
    }

}


?>