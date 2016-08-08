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

//echo "<table style='text-align-all: left' border='1'>
//<tr><th>id</th><th>name</th><th>age</th></tr>";

for($i=0;$i<$dataCount;$i++) {
    $result_arr = mysqli_fetch_assoc($result);

    $id = $result_arr['id'];
    $name = $result_arr['name'];
    $date = $result_arr['intime'];
    $year_vocations = $result_arr['year_vocations'];
    $year_vocations_now = mysqli_query($conn,"SELECT DATEDIFF(CURDATE(),'$date')");
    $result_vocations = mysqli_fetch_assoc($year_vocations_now);
    $intime = $result_vocations["DATEDIFF(CURDATE(),'$date')"];
    $year_vocations_calc = floor($intime/365)+$year_vocations_base;
    mysqli_query($conn,"UPDATE users SET year_vocations = '$year_vocations_calc' WHERE id = $id");
    if(mysqli_errno($conn)){
        echo mysqli_error($conn);
    }else{
        echo "<script>alert('计算完成');parent.location.href='index.php';</script>";
    }
}
