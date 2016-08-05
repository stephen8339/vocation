<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/7/15
 * Time: 15:45
 */
require_once 'config.php';

function connectDb(){
    return mysqli_connect(MYSQL_HOST,MYSQL_USR,MYSQL_PW,MYSQL_DB);
}

$conn = connectDb();