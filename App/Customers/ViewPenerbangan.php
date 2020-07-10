<?php namespace App\Customers;
// child class
class ViewPenerbangan extends Customers{
    function view_schedule(){
        echo "========Data Jadwal Penerbangan======== \n";
        $this->get_schedule();
        $no = 0;
        $dataJadwal = array_map(function($v){return($v["flight"]." ".$v['flight_code']." ".$v['flight_date']." ".$v['flight_transit']." ".$v['flight_infotransit']." ".$v['flight_price']);}, $this->schedule);
        foreach ($dataJadwal as $jadwal) {
            echo $no++.") ".$jadwal."\n";
        }
        echo "======================================= \n";
    }
}

?>