<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
</head>
<body>
<form action="calc.php" method="post">
    <input type="submit" value="年假计算">
</form>
<form action="index.php" method="post">
    <div>姓名:
        <input type="text" name="name">
    </div>
    <div>入职时间:
        <input type="date" name="date">
    </div>
    <div>转正时间:
        <input type="date" name="regdate">
    </div>
    <div>总年假天数:
        <input type="text" name="year_vocations">
    </div>
    <div>剩余年假天数:
        <input type="text" name="left_vocations">
    </div>
    <input type="submit" value="提交"><br>
    <a href="file_upload.html">上传假期数据</a><br>
    <a href="history.php">请假明细查询</a>
    <table style='text-align-all: left' border='1'>
        <tr><th>id</th><th>姓名</th><th>入职时间</th><th>转正时间</th><th>总年假天数</th><th>剩余年假天数</th><th>修改用户</th><th>删除用户</th></tr>
        <?php
        /**
         * Created by PhpStorm.
         * User: liusong
         * Date: 2016/7/15
         * Time: 15:43
         */
        require_once '../config/functions.php';

        $conn = connectDb();
        $result = mysqli_query($conn,"SELECT * FROM users");
        $dataCount = mysqli_num_rows($result);

        //echo "<table style='text-align-all: left' border='1'>
        //<tr><th>id</th><th>name</th><th>age</th></tr>";

        for($i=0;$i<$dataCount;$i++){
            $result_arr = mysqli_fetch_assoc($result);

            $id = $result_arr['id'];
            $name = $result_arr['name'];
            $date = $result_arr['intime'];
            $regdate = $result_arr['regulartime'];
            $year_vocations_all = $result_arr['year_vocations'];
            $year_vocations_left = $result_arr['year_vocations_left'];

            echo "<tr><td>$id</td><td>$name</td><td>$date</td><td>$regdate</td><td>$year_vocations_all</td><td>$year_vocations_left</td><td><a href='edit.php?id=$id'>修改</a></td><td><a href='delete.php?id=$id'>删除</a></td></tr>";
//    print_r(mysqli_fetch_assoc($result));

        }

        //echo "</table>"

        ?>
    </table>
<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/7/15
 * Time: 18:59
 */

if(!isset($_POST['name'])){
    die('用户名未输入!');
}

if(!isset($_POST['date'])){
    die('入职日期未输入!');
}

if(!isset($_POST['year_vocations'])){
    die('用户总年假天数未输入!');
}

$name=$_POST['name'];
if(empty($name)){
    die('用户名未输入!');
}

$date=$_POST['date'];
if(empty($date)){
    die('入职日期未输入!');
}

$regdate=$_POST['regdate'];
if(empty($regdate)){
    die('转正日期未输入!');
}

$year_vocations=$_POST['year_vocations'];
if(empty($year_vocations)){
    die('用户总年假天数未输入!');
}

$left_vocations=$_POST['left_vocations'];
if(empty($left_vocations)){
    die('用户剩余年假天数未输入!');
}

require_once '../config/functions.php';

$conn = connectDb();
if($conn){
//    $year_vocations = intval(year_vocations);
    mysqli_query($conn,"INSERT INTO users(name,intime,regulartime,year_vocations,year_vocations_left) VALUES ('$name','$date','$regdate',$year_vocations,$left_vocations)");

    if(mysqli_errno($conn)){
        echo mysqli_error($conn);
    }else{
        echo "<script>alert('添加成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }


}else{
    die('can not connect mysql');
}

?>

</form>

</body>
</html>