<?php

use App\Customers\BookingTicket as pesanTicket;
use App\Customers\ViewPenerbangan as schedules;

use App\Admin\Menu as menu;

class Auth extends Login{
    function login($data){
        $getUser = array_filter($this->users, function($v) use($data) {return($v['username'] == $data["username"] and $v["password"] == $data["password"]);});
        if ($getUser) {
            $role = array_map(function($v){return($v["role"]);}, $getUser);
            $key = array_keys($role);
            $key = implode(" ", $key);
            if ($role[$key] == "admin"){
                echo "======= Hallo admin ! ======= \n";
                echo "======== Menu =========";
                echo "\n1. Data Airport \n2. Data Maskapai \n3. Data Penerbangan \n";
                echo "Silahkan pilih menu ! \n";
                $pilih = strtolower(trim(fgets(STDIN)));
                echo "==========================\n";
                if($pilih != ""){
                    $menu = new menu();
                    $menu->choose_menu($pilih);
                }
                echo "\n";
                echo "Terima kasih !!! \n";
                echo "==========================";
            }else{
                echo "======= Hallo customers ======= \n";
                $schedule = new schedules();
                $schedule->view_schedule();
                while(true){
                    echo "Pesan Tiket ? (Y/N) ";
                    $choose = trim(fgets(STDIN));
                    if ($choose == "Y") {
                        echo "Silahkan pilih sesuai nomor ! ";
                        $no = trim(fgets(STDIN));
                        $ticket = new pesanTicket();
                        $ticket->pesan_ticket($no);
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