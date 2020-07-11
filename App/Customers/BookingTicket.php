<?php namespace App\Customers;

class BookingTicket extends Customers{

    public $dataPemesanan = array();
    function pesan_ticket($no){
            array_push($this->dataPemesanan,$this->schedule[$no - 1]);
            $dataWrite = json_encode($this->dataPemesanan, JSON_PRETTY_PRINT);
                    if(file_put_contents("tiket-pemesanan.json", $dataWrite)){
                        echo "Message : Tiket berhasil dipesan \n";
                    }
    }

}

?>