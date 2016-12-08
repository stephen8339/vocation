<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/8/8
 * Time: 18:47
 */
require_once '../config/functions.php';
require_once '../config/config.php';
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
    $date = $result_arr['regulartime'];
    $year_vocations_now = mysqli_query($conn,"SELECT DATEDIFF('$standdate','$date')");
    $result_vocations = mysqli_fetch_assoc($year_vocations_now);
    $intime = $result_vocations["DATEDIFF('$standdate','$date')"];
    $mysql_sum_result = mysqli_query($conn,"SELECT SUM(days) FROM details WHERE status = '完成' AND type = '年假' AND name = '$name' AND stime >= '$querydate'");//查询已使用年假天数
    $result_sum_arr = mysqli_fetch_assoc($mysql_sum_result);
    $sumdays = $result_sum_arr['SUM(days)'];
    $year_vocations_left = $all_year_vocations - $sumdays;
    if($intime>=365){
        $year_vocations_calc = floor($intime/365)+$year_vocations_base;
    }else{
        $year_vocations_calc = floor($intime*$year_vocations_base/365);
    }

    mysqli_query($conn,"UPDATE users SET year_vocations = '$year_vocations_calc' WHERE id = $id");

    $year_vocations = $result_arr['year_vocations'];
    $mysql_sum_result = mysqli_query($conn,"SELECT SUM(days) FROM details WHERE status = '完成' AND type = '年假' AND name = '$name' AND stime >= '$querydate'");//查询已使用年假天数
    $result_sum_arr = mysqli_fetch_assoc($mysql_sum_result);
    $sumdays = $result_sum_arr['SUM(days)'];
    $year_vocations_left = $year_vocations - $sumdays;

    mysqli_query($conn,"UPDATE users SET year_vocations_left = '$year_vocations_left' WHERE id = $id");

    if(mysqli_errno($conn)){
        echo mysqli_error($conn);
    }else{
        echo "<script>alert('计算完成');parent.location.href='index.php';</script>";
    }
}
