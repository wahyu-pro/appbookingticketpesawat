<?php namespace App\Admin;

class DataMaskapai extends Admin{
    function view_maskapai(){
        echo "========Data Maskapai======== \n";
        $no = 1;
        $dataMaskapai = array_map(function($v){return($v["flight"]." ".$v['flight_code']);}, $this->maskapai);
        foreach ($dataMaskapai as $key) {
            echo $no++.") ".$key."\n";
        }
        echo "======================================= \n";
    }

    function choose_action($choose)
    {
        switch ($choose) {
            case "add":
                $data = $this->input_data();
                $this->add_maskapai($data);
                break;
            case "remove":
                echo "Input flight code : ";
                $flight_code = trim(fgets(STDIN));
                $this->remove_maskapai($flight_code);
                break;
            case "update":
                echo "Input flight code : ";
                $flight_code = trim(fgets(STDIN));
                $this->update_maskapai($flight_code);
                break;
            default:
                echo "Maaf pilihan anda tidak ada \n";
                break;
        }
    }

    function add_maskapai($data){
        array_push($this->maskapai, $data);
        $dataWrite = json_encode($this->maskapai, JSON_PRETTY_PRINT);
        if(file_put_contents("data-maskapai.json", $dataWrite)){
            echo "Message : data berhasil ditambahkan \n";
        }
    }

    function remove_maskapai($fligth_code){
        $item = array_filter($this->maskapai, function($v) use($fligth_code) {return($v["flight_code"] == $fligth_code);});
        if($item){
            foreach ($item as $key => $value) {
                array_splice($this->maskapai, $key, 1);
            }
        }
        $dataWrite = json_encode($this->maskapai, JSON_PRETTY_PRINT);
        if(file_put_contents("data-maskapai.json", $dataWrite)){
            echo "Message : data berhasil dihapus \n";
        }
    }

    function update_maskapai($fligth_code){
        $item = array_filter($this->maskapai, function($v) use($fligth_code) {return($v["flight_code"] == $fligth_code);});
        $key = array_keys($item);
        $key = implode(" ", $key);
        $key = intval($key);
        if($item){
            echo "\nflight \nflight_code \n";
            echo "Choose your updated : ";
            $choose = trim(fgets(STDIN));
            switch ($choose) {
                case "flight":
                    echo "flight = ";
                    $data = trim(fgets(STDIN));
                    for ($i=0; $i < count($this->maskapai); $i++) {
                        if($i == $key){
                            $this->maskapai[$i]["flight"] = $data;
                        break;
                        }
                    }
                    $dataWrite = json_encode($this->maskapai, JSON_PRETTY_PRINT);
                    if(file_put_contents("data-maskapai.json", $dataWrite)){
                        echo "Message : flight berhasil diupdate \n";
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
        $data = ["flight_code" => $flight_code, "flight" => $flight];
        return $data;
    }
}

?>