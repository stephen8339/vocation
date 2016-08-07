<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
</head>
<body>
<form action="index.php" method="post">
    <div>姓名:
        <input type="text" name="name">
    </div>
    <div>总年假天数:
        <input type="text" name="year_vocations">
    </div>
    <input type="submit" value="提交"><br>
    <a href="file_upload.html">上传假期数据</a><br>
    <a href="history.php">请假明细查询</a>
    <table style='text-align-all: left' border='1'>
        <tr><th>id</th><th>姓名</th><th>总年假天数</th><th>修改用户</th><th>删除用户</th></tr>
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
            $year_vocations = $result_arr['year_vocations'];

            echo "<tr><td>$id</td><td>$name</td><td>$year_vocations</td><td><a href='edit.php?id=$id'>修改</a></td><td><a href='delete.php?id=$id'>删除</a></td></tr>";
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

if(!isset($_POST['year_vocations'])){
    die('用户总年假天数未输入!');
}

$name=$_POST['name'];
if(empty($name)){
    die('用户名未输入!');
}



$year_vocations=$_POST['year_vocations'];
if(empty($year_vocations)){
    die('用户总年假天数未输入!');
}

require_once '../config/functions.php';

$conn = connectDb();
if($conn){
//    $year_vocations = intval(year_vocations);
    mysqli_query($conn,"INSERT INTO users(name,year_vocations) VALUES ('$name',$year_vocations)");

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