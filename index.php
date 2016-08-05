<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>
</head>
<body>
<h2 class="chart-title">曜石假期查询系统</h2>
<form action="index.php" method="get">
    姓名：<input type="text" name="name"><input type="submit" value="提交">
</form>
<table style='text-align-all: left' border='1'>
    <tr><th>审批编号</th><th>标题</th><th>审批状态</th><th>审批结果</th><th>审批发起时间</th><th>审批完成时间</th><th>发起人工号</th><th>发起人姓名</th><th>发起人部门</th><th>历史审批人姓名</th><th>请假类型</th><th>请假天数</th><th>请假事由</th><th>已使用年假</th></tr>
    <?php
    require_once './config/functions.php';
    if(empty($_GET['name'])){
        die('您没有输入名字！');
    }else{
        $user = $_GET['name'];
        $conn = connectDb();
        $mysql_result = mysqli_query($conn,"SELECT * FROM details WHERE status = '完成' AND name = '$user'");
        $mysql_sum_result = mysqli_query($conn,"SELECT SUM(days) FROM details WHERE status = '完成' AND name = '$user' AND stime >= '2016-08-01'");
        $dataCount = mysqli_num_rows($mysql_result);
        $result_sum_arr = mysqli_fetch_assoc($mysql_sum_result);
        $sumdays = $result_sum_arr['SUM(days)'];
        for($i=0;$i<$dataCount;$i++){
            $result_arr = mysqli_fetch_assoc($mysql_result);

            $rid = $result_arr['rid'];
            $title = $result_arr['title'];
            $status = $result_arr['status'];
            $result = $result_arr['result'];
            $stime = $result_arr['stime'];
            $etime = $result_arr['etime'];
            $num = $result_arr['num'];
            $name = $result_arr['name'];
            $depart = $result_arr['depart'];
            $history = $result_arr['historyname'];
            $type = $result_arr['type'];
            $days = $result_arr['days'];
            $reason = $result_arr['reason'];

            echo "<tr><td>$rid</td><td>$title</td><td>$status</td><td>$result</td><td>$stime</td><td>$etime</td><td>$num</td><td>$name</td><td>$depart</td><td>$history</td><td>$type</td><td>$days</td><td>$reason</td><td>$sumdays</td></tr>";

    }//数据查询
    }

    ?>
    <a name="返回首页" href="index.php">返回首页</a>
</table>
</body>
</html>