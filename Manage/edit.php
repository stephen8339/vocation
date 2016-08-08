<!DOCTYPE HTML>
<html>
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>edit</title>-->
<!--</head>-->
<body>
<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/7/18
 * Time: 15:32
 */
require_once '../config/functions.php';

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = intval($_GET['id']);
    $conn = connectDb();
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id = $id");
    $result_arr = mysqli_fetch_assoc($result);
    $name = $result_arr['name'];
    $date = $result_arr['intime'];
    $year_vocations = $result_arr['year_vocations'];
}else{
    die('id is empty!');
}

?>
<form action="editserver.php" method="post">
<div>ID：
    <input type="text" name="id" value="<?php echo $id?>">
</div>
<div>姓名：
    <input type="text" name="name" value="<?php echo $name?>">
</div>
    <div>入职日期：
    <input type="date" name="date" value="<?php echo $date?>">
</div>
<div>总年假天数：
    <input type="text" name="year_vocations" value="<?php echo $year_vocations?>">
</div>
<input type="submit" value="修改">
</form>
</body>
</html>

