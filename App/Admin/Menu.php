<?php namespace App\Admin;


class Menu {
    function choose_menu($pilih){
        switch ($pilih) {
            case "data airport":
                $airport = new DataAirport();
                $airport->view_airport();
                while(true){
                    echo "=======Action=======";
                    echo "\nadd  \nremove  \nupdate \n";
                    echo "Silahkan pilih action : ";
                    $choose = trim(fgets(STDIN));
                    if ($choose) {
                        $airport->choose_action($choose);
                        echo "========================== \n";
                    }else{
                    break;
                    }
                }
                break;
            case "data maskapai":
                $maskapai = new DataMaskapai();
                $maskapai->view_maskapai();
                while(true){
                    echo "=======Action=======";
                    echo "\nadd  \nremove  \nupdate \n";
                    echo "Silahkan pilih action : ";
                    $choose = trim(fgets(STDIN));
                    if ($choose) {
                        $maskapai->choose_action($choose);
                        echo "========================== \n";
                    }else{
                    break;
                    }
                }
                break;
            case "data penerbangan":
                $jadwal = new DataJadwal();
                $jadwal->view_jadwal();
                while(true){
                    echo "=======Action=======";
                    echo "\nadd  \nremove  \nupdate \n";
                    echo "Silahkan pilih action : ";
                    $choose = trim(fgets(STDIN));
                    if ($choose) {
                        $jadwal->choose_action($choose);
                        echo "========================== \n";
                    }else{
                    break;
                    }
                }
                break;
            default:
                echo "Maaf pilihan anda tidak tersedia \n";
                break;
        }
    }
}