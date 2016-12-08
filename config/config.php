<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/7/15
 * Time: 15:44
 */
define('MYSQL_HOST','localhost');
define('MYSQL_USR','root');
define('MYSQL_PW','1234');
define('MYSQL_DB','vocation');
define('YEAR','2016');
$standdate = date("Y-m-d",strtotime("+1 year",mktime(0,0,0,07,31,YEAR)));
$querydate = date("Y-m-d",strtotime("+0 year",mktime(0,0,0,07,31,YEAR)));