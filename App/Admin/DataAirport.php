<?php namespace App\Admin;

class DataAirport extends Admin{
    function view_airport(){
        echo "========Data Airport======== \n";
        $no = 1;
        $dataAirport = array_map(function($v){return($v["airport"]." ".$v['code']." ".$v["city"]." ".$v["grup"]." ".$v["status"]);}, $this->airport);
        foreach ($dataAirport as $key) {
            echo $no++.") ".$key."\n";
        }
        echo "======================================= \n";
    }

    function choose_action($choose)
    {
        switch ($choose) {
            case "add":
                $data = $this->input_data();
                $this->add_airport($data);
                break;
            case "remove":
                echo "Input airport code : ";
                $code = trim(fgets(STDIN));
                $this->remove_airport($code);
                break;
            case "update":
                echo "Input airport code : ";
                $code = trim(fgets(STDIN));
                $this->update_airport($code);
                break;
            default:
                echo "Maaf pilihan anda tidak ada \n";
                break;
        }
    }

    function add_airport($data){
        array_push($this->airport, $data);
        $dataWrite = json_encode($this->airport, JSON_PRETTY_PRINT);
        if(file_put_contents("area.json", $dataWrite)){
            echo "Message : data berhasil ditambahkan \n";
        }
    }

    function remove_airport($code){
        $item = array_filter($this->airport, function($v) use($code) {return($v["code"] == $code);});
        if($item){
            foreach ($item as $key => $value) {
                array_splice($this->airport, $key, 1);
            }
        }
        $dataWrite = json_encode($this->airport, JSON_PRETTY_PRINT);
        if(file_put_contents("area.json", $dataWrite)){
            echo "Message : data berhasil dihapus \n";
        }
    }

    function update_airport($code){
        $item = array_filter($this->airport, function($v) use($code) {return($v["code"] == $code);});
        $key = array_keys($item);
        $key = implode(" ", $key);
        $key = intval($key);
        if($item){
            echo "\nairport \ncity \ngrup \nstatus \n";
            echo "Choose your updated : ";
            $choose = trim(fgets(STDIN));
            switch ($choose) {
                case "airport":
                    echo "airport = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($this->airport); $i++) {
                        if($i == $key){
                            $this->airport[$i]["airport"] = $data;
                        break;
                        }
                    }
                    $dataWrite = json_encode($this->airport, JSON_PRETTY_PRINT);
                    if(file_put_contents("area.json", $dataWrite)){
                        echo "Message : airport berhasil diupdate \n";
                    }
                    break;
                case "city":
                    echo "city = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($this->airport); $i++) {
                        if($i == $key){
                            $this->airport[$i]["city"] = $data;
                        break;
                        }
                    }
                    $dataWrite = json_encode($this->airport, JSON_PRETTY_PRINT);
                    if(file_put_contents("area.json", $dataWrite)){
                        echo "Message : city date berhasil diupdate \n";
                    }
                    break;
                case "grup":
                    echo "grup = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($this->airport); $i++) {
                        if($i == $key){
                            $this->airport[$i]["grup"] = $data;
                        break;
                        }
                    }
                    $dataWrite = json_encode($this->airport, JSON_PRETTY_PRINT);
                    if(file_put_contents("area.json", $dataWrite)){
                        echo "Message : grup berhasil diupdate \n";
                    }
                    break;
                case "status":
                    echo "status = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($this->airport); $i++) {
                        if($i == $key){
                            $this->airport[$i]["status"] = $data;
                        break;
                        }
                    }
                    $dataWrite = json_encode($this->airport, JSON_PRETTY_PRINT);
                    if(file_put_contents("area.json", $dataWrite)){
                        echo "Message : status berhasil diupdate \n";
                    }
                    break;
                default:
                    echo "Maaf pilihan anda tidak ada \n";
                    break;
            }
        }
    }

    function input_data(){
        echo "Input airport : ";
        $airport = trim(fgets(STDIN));
        echo "Input city : ";
        $city = trim(fgets(STDIN));
        echo "Input code : ";
        $code = trim(fgets(STDIN));
        echo "Input grup : ";
        $grup = trim(fgets(STDIN));
        echo "Input status : ";
        $status = trim(fgets(STDIN));
        $data = ["code" => $code, "city" => $city, "airport" => $airport, "grup" => $grup, "status" =>$status];
        return $data;
    }
}

?>