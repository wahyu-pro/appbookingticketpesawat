<?php

class Customers extends Login{
    public $schedule;
    function get_schedule(){
        $filename = "data-penerbangan.json";
        $open_file = fopen($filename, "a+");
        $dataJson = fread($open_file, filesize($filename));
        return $this->schedule = json_decode($dataJson, true);
    }

    function view_schedule(){
        echo "========Data Jadwal Penerbangan======== \n";
        $this->get_schedule();
        $no = 1;
        $dataJadwal = array_map(function($v){return($v["flight"]." ".$v['flight_code']." ".$v['flight_date']." ".$v['flight_transit']." ".$v['flight_infotransit']." ".$v['flight_price']);}, $this->schedule);
        foreach ($dataJadwal as $jadwal) {
            echo $no++.") ".$jadwal."\n";
        }
        echo "======================================= \n";
    }

    function pesan_ticket($no){
        switch ($no) {
            case 1:
                $dataWrite = json_encode($this->schedule[1], JSON_PRETTY_PRINT);
                    if(file_put_contents("tiket-pemesanan.json", $dataWrite)){
                        echo "Message : Tiket berhasil dipesan \n";
                    }
                break;
            case 2:
                $dataWrite = json_encode($this->schedule[2], JSON_PRETTY_PRINT);
                    if(file_put_contents("tiket-pemesanan.json", $dataWrite)){
                        echo "Message : Tiket berhasil dipesan \n";
                    }
                break;
            case 3:
                $dataWrite = json_encode($this->schedule[3], JSON_PRETTY_PRINT);
                    if(file_put_contents("tiket-pemesanan.json", $dataWrite)){
                        echo "Message : Tiket berhasil dipesan \n";
                    }
                break;
            default:
                echo "Maaf pilihan anda tidak ada \n";
                break;
        }
    }
}

?>