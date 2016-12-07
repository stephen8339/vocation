<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/8/8
 * Time: 18:47
 */
require_once '../config/functions.php';
//require_once '../config/mysqlquery.php';
$year_vocations_base = 10;
$result = mysqli_query($conn,"SELECT * FROM users");
$dataCount = mysqli_num_rows($result);
$standdate = date("Y-m-d",strtotime("+1 year",mktime(0,0,0,07,31)));
echo $standdate;

//echo "<table style='text-align-all: left' border='1'>
//<tr><th>id</th><th>name</th><th>age</th></tr>";

for($i=0;$i<$dataCount;$i++) {
    $result_arr = mysqli_fetch_assoc($result);

    $id = $result_arr['id'];
    $name = $result_arr['name'];
    $date = $result_arr['regulartime'];
    $year_vocations = $result_arr['year_vocations'];
    $year_vocations_now = mysqli_query($conn,"SELECT DATEDIFF('$standdate','$date')");
    $result_vocations = mysqli_fetch_assoc($year_vocations_now);
    $intime = $result_vocations["DATEDIFF('$standdate','$date')"];
    if($intime>=365){
        $year_vocations_calc = floor($intime/365)+$year_vocations_base;
    }else{
        $year_vocations_calc = floor($intime*$year_vocations_base/365);
    }

    mysqli_query($conn,"UPDATE users SET year_vocations = '$year_vocations_calc' WHERE id = $id");
    if(mysqli_errno($conn)){
        echo mysqli_error($conn);
    }else{
        echo "<script>alert('计算完成');parent.location.href='index.php';</script>";
    }
}
