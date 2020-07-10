<?php namespace App\Customers;

class BookingTicket extends Customers{

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