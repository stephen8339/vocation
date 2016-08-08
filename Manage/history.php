<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>请假历史查询</title>
</head>
<body>
<form action="history.php" method="get">
    姓名：<input type="text" name="name"><br>
    类型：<select name="type">
        <option value="事假">事假</option>
        <option value="年假">年假</option>
        <option value="病假">病假</option>
        <option value="调休">调休</option>
    </select><br>
    开始日期：<input type="datetime-local" name="stime">结束日期：<input type="datetime-local" name="etime"><br>
    <input type="submit" value="提交">
</form>
<table style='text-align-all: left' border='1'>
    <tr><th>审批编号</th><th>标题</th><th>审批状态</th><th>审批结果</th><th>审批发起时间</th><th>审批完成时间</th><th>发起人工号</th><th>发起人姓名</th><th>发起人部门</th><th>历史审批人姓名</th><th>请假类型</th><th>请假天数</th><th>请假事由</th></tr>
    <?php
    require_once '../config/functions.php';
    $conn = connectDb();
    if (empty($_GET['stime'])){
        $mysql_result = mysqli_query($conn,"SELECT * FROM details WHERE status = '完成'");
//        $result_arr = mysqli_fetch_assoc($mysql_result);
//        print_r($result_arr);
        echo ('请输入查询条件！');
    }else{
        $name = $_GET['name'];
        $stime = $_GET['stime'];
        $etime = $_GET['etime'];
        $type = $_GET['type'];
        $mysql_result = mysqli_query($conn,"SELECT * FROM details WHERE status = '完成' AND name LIKE '%$name%' AND type = '$type' AND stime >= '$stime' AND stime <='$etime'");
    }

    $dataCount = mysqli_num_rows($mysql_result);
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

        echo "<tr><td>$rid</td><td>$title</td><td>$status</td><td>$result</td><td>$stime</td><td>$etime</td><td>$num</td><td>$name</td><td>$depart</td><td>$history</td><td>$type</td><td>$days</td><td>$reason</td></tr>";

    }//数据查询
    ?>
    <a name="返回管理首页" href="index.php">返回首页</a>
</table>
</body>
</html>