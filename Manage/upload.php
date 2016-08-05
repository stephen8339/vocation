<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/8/2
 * Time: 14:16
 */

//namespace Home\Service;
//use Think\Model;

require_once '../config/functions.php';//DB配置文件

define('SITE_PATH', getcwd());
$conn = connectDb();//连接数据库
$tmp_file = $_FILES['file_path']['tmp_name'];//获取临时文件名
$file_types = explode ( ".", $_FILES ['file_path'] ['name'] );
$file_type = $file_types [count ( $file_types ) - 1];//获取文件类型
if(empty($_FILES['file_path']['name'])){
    die('您没有选择任何文件！');
}else{
    if (strtolower ( $file_type ) != "xls")
    {
    die( '不是Excel文件，重新上传' );
    }//判断是否为Excel文件


    $str = date('Ymdhis');
    $file_name = $str . "." . $file_type;
    $save_path = SITE_PATH."/upfiles/$file_name";
    move_uploaded_file($tmp_file,$save_path);
    if (file_exists($save_path)){
        echo '上传成功';
        echo '<br />';
    }else{
        die('上传失败');
    }//上传文件
    error_reporting(E_ALL); //开启错误
    set_time_limit(0); //脚本不超时
    date_default_timezone_set('Asia/Shanghai'); //设置时间
    /** PHPExcel_IOFactory */
    include '../Excel/PHPExcel/IOFactory.php';
//  $inputFileType = 'Excel5'; //这个是读 xls的
    $inputFileType = 'Excel2007';//这个是xlsx的
    $inputFileName = "$save_path";
    echo '上传文件中... ',pathinfo($inputFileName,PATHINFO_BASENAME),'<br />';
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    $objWorksheet = $objPHPExcel->getActiveSheet();//取得总表数
    $highestRow = $objWorksheet->getHighestRow();//取得总行数
    echo 'highestRow='.$highestRow;
    echo "<br>";
    $highestColumn = $objWorksheet->getHighestColumn();
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数
    echo 'highestColumn='.$highestColumn;
    echo "<br />";
    echo 'highestColumnIndex='.$highestColumnIndex;
    echo "<br />";
    for ($row = 2;$row <= $highestRow;$row++)
    {
        $strs=array();
        //注意highestColumnIndex的列数索引从0开始
        for ($col = 0;$col < $highestColumnIndex;$col++)
        {
            $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
        }
        $info = array(
            'rid'=>"$strs[0]",
            'title'=>"$strs[1]",
            'status'=>"$strs[2]",
            'result'=>"$strs[3]",
            'stime'=>"$strs[4]",
            'etime'=>"$strs[5]",
            'number'=>"$strs[6]",
            'name'=>"$strs[7]",
            'depart'=>"$strs[8]",
            'historyname'=>"$strs[9]",
            'record'=>"$strs[10]",
            'nowname'=>"$strs[11]",
            'ctime'=>"$strs[12]",
            'type'=>"$strs[13]",
            'astime'=>"$strs[14]",
            'aetime'=>"$strs[15]",
            'days'=>"$strs[16]",
            'reason'=>"$strs[17]",
            'pic'=>"$strs[18]",
        );
        //从excel文件生成数组

        if($conn){
            $rid = $info['rid'];
            $title = $info['title'];
            $status = $info['status'];
            $result = $info['result'];
            $stime = $info['stime'];
            $etime = $info['etime'];
            $number = $info['number'];
            $name = $info['name'];
            $depart = $info['depart'];
            $historyname = $info['historyname'];
            $record = $info['record'];
            $nowname = $info['nowname'];
            $ctime = $info['ctime'];
            $type = $info['type'];
            $astime = $info['astime'];
            $aetime = $info['aetime'];
            $days = $info['days'];
            $reason = $info['reason'];
            $pic = $info['pic'];
            echo $name;
            echo "<br />";
            echo $days;
            echo "<br />";
            mysqli_query($conn,"INSERT INTO details(rid,title,status,result,stime,etime,num,name,depart,historyname,record,nowname,ctime,type,astime,aetime,days,reason,pic) SELECT '$rid','$title','$status','$result','$stime','$etime','$number','$name','$depart','$historyname','$record','$nowname','$ctime','$type','$astime','$aetime','$days','$reason','$pic' FROM DUAL WHERE '$rid' NOT IN (SELECT rid FROM details)");
            if(mysqli_errno($conn)){
                echo mysqli_error($conn);
            }//数据库插入以rid为标准不重复插入
        }
    }
    echo "<script>alert('数据库导入成功！');parent.location.href='history.php';</script>";
    unlink($save_path);
}
?>
