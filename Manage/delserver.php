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
$year_vocations = $_POST['year_vocations'];
//echo $id;
//echo $name;
//echo $age;
mysqli_query($conn,"DELETE FROM users WHERE id = $id");
if(mysqli_errno($conn)){
    echo mysqli_error($conn);
}else{
    echo "<script>alert('已删除');parent.location.href='index.php';</script>";
}