<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/7/18
 * Time: 19:12
 */
require_once '../config/functions.php';

$conn = connectDb();
$id = $_POST['id'];
$name = $_POST['name'];
$date = $_POST['date'];
$year_vocations = $_POST['year_vocations'];
//echo $id;
//echo $name;
//echo $age;
mysqli_query($conn,"UPDATE users SET name = '$name',intime = '$date',year_vocations = '$year_vocations' WHERE id = $id");
if(mysqli_errno($conn)){
    echo mysqli_error($conn);
}else{
    echo "<script>alert('修改完成');parent.location.href='index.php';</script>";
}
