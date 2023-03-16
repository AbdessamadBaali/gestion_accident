<?php

include_once "../model/DB_Conction.php";
include_once 'AppModel.php';

$model_obj = new Model_app();

if(isset($_GET['myChart']) and isset($_GET['year'])) {
    $year = $_GET['year'];

    // number of male in groupes 
    $query1 = "SELECT type_acc ,count(type_acc) as number_acc from accident 
    where year(date_acc) = $year group by type_acc;";    
    $Info1 = $model_obj->crud_query($query1,'SELECT');

    if($Info1 !== 0 and $Info1  !== 1) {
        $data = ['year' => $year];
        
        foreach ($Info1 as $key => $value) {
            $data['info'][] = $value;
        }

        $jsonData= json_encode($data);
        $handle = fopen("../scriptJS/myChart.json" , "w");
            fwrite($handle, $jsonData);
        fclose($handle);
    }else {
        $data = ['year' => $year];
        $data['info'] = "null";
        $jsonData= json_encode($data);

        $handle = fopen("../scriptJS/myChart.json" , "w");
            fwrite($handle, $jsonData);
        fclose($handle);
    }

}
