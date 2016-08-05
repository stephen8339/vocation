<?php
require_once '../config/functions.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>all users</title>
</head>
<body>

<a href="adduser.html">adduser</a>

<table style='text-align-all: left' border='1'>
    <tr><th>id</th><th>姓名</th><th>总年假天数</th><th>edit</th></tr>
    <?php
    /**
     * Created by PhpStorm.
     * User: liusong
     * Date: 2016/7/15
     * Time: 15:43
     */

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

        echo "<tr><td>$id</td><td>$name</td><td>$year_vocations</td><td><a href='edit.php?id=$id'>edit</a> </td></tr>";
//    print_r(mysqli_fetch_assoc($result));

    }

    //echo "</table>"

    ?>
</table>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/7/15
 * Time: 15:43
 */