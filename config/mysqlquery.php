<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/8/8
 * Time: 16:23
 */
//require_once '../index.php';
require_once 'functions.php';
require_once 'config.php';
$conn = connectDb();
$mysql_vocationall_result = mysqli_query($conn,"SELECT year_vocations FROM users WHERE name = '$user'");//查询总年假天数
$mysql_sum_result = mysqli_query($conn,"SELECT SUM(days) FROM details WHERE status = '完成' AND type = '年假' AND name = '$user' AND stime >= '$querydate'");//查询已使用年假天数
$mysql_sum_leave_result = mysqli_query($conn,"SELECT SUM(days) FROM details WHERE status = '完成' AND type = '事假' AND name = '$user' AND stime >= '$querydate'");//查询已使用事假天数
$mysql_sum_sick_result = mysqli_query($conn,"SELECT SUM(days) FROM details WHERE status = '完成' AND type = '病假' AND name = '$user' AND stime >= '$querydate'");//查询已使用病假天数
$result_sum_arr = mysqli_fetch_assoc($mysql_sum_result);
$result_sum_leave_arr = mysqli_fetch_assoc($mysql_sum_leave_result);
$result_sum_sick_arr = mysqli_fetch_assoc($mysql_sum_sick_result);
$result_vocationsall_arr = mysqli_fetch_assoc($mysql_vocationall_result);
$sumdays = $result_sum_arr['SUM(days)'];
$leavedays = $result_sum_leave_arr['SUM(days)'];
$sickdays = $result_sum_sick_arr['SUM(days)'];
$all_year_vocations = $result_vocationsall_arr['year_vocations'];
if (empty($leavedays)){
    $leavedays = 0;
}
if (empty($sumdays)){
    $sumdays = 0;
}if (empty($sickdays)){
    $sickdays = 0;
}

$year_vocations = $all_year_vocations - $sumdays;