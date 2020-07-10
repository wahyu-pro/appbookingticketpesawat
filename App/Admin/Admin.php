<?php namespace App\Admin;

class Admin{
    protected $schedules;

    function get_jadwal(){
        $filename = "data-penerbangan.json";
        $open_file = fopen($filename, "a+");
        $dataJson = fread($open_file, filesize($filename));
        return $this->schedules = json_decode($dataJson, true);
    }

    function view_jadwal(){
        echo "========Data Jadwal Penerbangan======== \n";
        $this->get_jadwal();
        $no = 1;
        $dataJadwal = array_map(function($v){return($v["flight"]." ".$v['flight_code']." ".$v['flight_date']." ".$v['flight_transit']." ".$v['flight_infotransit']." ".$v['flight_price']);}, $this->schedules);
        foreach ($dataJadwal as $jadwal) {
            echo $no++.") ".$jadwal."\n";
        }
        echo "======================================= \n";
    }

    function choose_action($choose)
    {
        switch ($choose) {
            case "add":
                $data = $this->input_data();
                $this->add_schedule($data);
                break;
            case "remove":
                echo "Input flight code : ";
                $flight_code = trim(fgets(STDIN));
                $this->remove_schedule($flight_code);
                break;
            case "update":
                echo "Input flight code : ";
                $flight_code = trim(fgets(STDIN));
                $this->update_schedule($flight_code);
                break;
            default:
                echo "Maaf pilihan anda tidak ada \n";
                break;
        }
    }

    function add_schedule($data){
        array_push($this->schedules, $data);
        $dataWrite = json_encode($this->schedules, JSON_PRETTY_PRINT);
        if(file_put_contents("data-penerbangan.json", $dataWrite)){
            echo "Message : data berhasil ditambahkan \n";
        }
    }

    function remove_schedule($fligth_code){
        $item = array_filter($this->schedules, function($v) use($fligth_code) {return($v["flight_code"] == $fligth_code);});
        if($item){
            foreach ($item as $key => $value) {
                array_splice($this->schedules, $key, 1);
            }
        }
        $dataWrite = json_encode($this->schedules, JSON_PRETTY_PRINT);
        if(file_put_contents("data-penerbangan.json", $dataWrite)){
            echo "Message : data berhasil dihapus \n";
        }
    }

    function update_schedule($fligth_code){
        $item = array_filter($this->schedules, function($v) use($fligth_code) {return($v["flight_code"] == $fligth_code);});
        if($item){
            echo "\nflight \nflight date \nflight transit \nflight info transit \nflight price \n";
            echo "Choose your updated : ";
            $choose = trim(fgets(STDIN));
            switch ($choose) {
                case "flight":
                    echo "flight = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($item); $i++) {
                        $this->schedules[$i]["flight"] = $data;
                    }
                    $dataWrite = json_encode($this->schedules, JSON_PRETTY_PRINT);
                    if(file_put_contents("data-penerbangan.json", $dataWrite)){
                        echo "Message : flight berhasil diupdate \n";
                    }
                    break;
                case "flight date":
                    echo "flight date = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($item); $i++) {
                        $this->schedules[$i]["flight_date"] = $data;
                    }
                    $dataWrite = json_encode($this->schedules, JSON_PRETTY_PRINT);
                    if(file_put_contents("data-penerbangan.json", $dataWrite)){
                        echo "Message : flight date berhasil diupdate \n";
                    }
                    break;
                case "flight transit":
                    echo "flight transit = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($item); $i++) {
                        $this->schedules[$i]["flight_transit"] = $data;
                    }
                    $dataWrite = json_encode($this->schedules, JSON_PRETTY_PRINT);
                    if(file_put_contents("data-penerbangan.json", $dataWrite)){
                        echo "Message : flight transit berhasil diupdate \n";
                    }
                    break;
                case "flight info transit":
                    echo "flight info transit = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($item); $i++) {
                        $this->schedules[$i]["flight_infotransit"] = $data;
                    }
                    $dataWrite = json_encode($this->schedules, JSON_PRETTY_PRINT);
                    if(file_put_contents("data-penerbangan.json", $dataWrite)){
                        echo "Message : flight info transit berhasil diupdate \n";
                    }
                    break;
                case "flight price":
                    echo "flight price = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($item); $i++) {
                        $this->schedules[$i]["flight_price"] = $data;
                    }
                    $dataWrite = json_encode($this->schedules, JSON_PRETTY_PRINT);
                    if(file_put_contents("data-penerbangan.json", $dataWrite)){
                        echo "Message : flight price berhasil diupdate \n";
                    }
                    break;
                default:
                    echo "Maaf pilihan anda tidak ada \n";
                    break;
            }
        }
    }

    function input_data(){
        echo "Input flight : ";
        $flight = trim(fgets(STDIN));
        echo "Input flight_code : ";
        $flight_code = trim(fgets(STDIN));
        echo "Input flight_date : ";
        $flight_date = trim(fgets(STDIN));
        echo "Input flight_transit : ";
        $flight_transit = trim(fgets(STDIN));
        echo "Input flight_infotransit : ";
        $flight_infotransit = trim(fgets(STDIN));
        echo "Input flight_price : ";
        $flight_price = trim(fgets(STDIN));
        $data = ["flight" => $flight, "flight_code" => $flight_code, "flight_date" => $flight_date, "flight_transit" => $flight_transit, "flight_infotransit" =>$flight_infotransit, "flight_price" => $flight_price];
        return $data;
    }
}

?>