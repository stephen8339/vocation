<?php
/**
 * Created by PhpStorm.
 * User: liusong
 * Date: 2016/8/2
 * Time: 14:16
 */
define('SITE_PATH', getcwd());
//namespace Home\Service;
//use Think\Model;



$tmp_file = $_FILES['file_path']['tmp_name'];
$file_types = explode ( ".", $_FILES ['file_path'] ['name'] );
$file_type = $file_types [count ( $file_types ) - 1];
if(empty($_FILES['file_path']['name'])){
    die('您没有选择任何文件！');
}else{
//    print_r($_FILES);
//    print_r($tmp_file);
//    print_r($file_types['1']);
    if (strtolower ( $file_type ) != "xls")
    {
    die( '不是Excel文件，重新上传' );
    }


    $str = date('Ymdhis');
    $file_name = $str . "." . $file_type;
    $save_path = SITE_PATH."/upfiles/$file_name";
//    echo "$save_path";
    move_uploaded_file($tmp_file,$save_path);
    if (file_exists($save_path)){
        echo '上传成功';
    }else{
        die('上传失败');
    }
    error_reporting(E_ALL); //开启错误
    set_time_limit(0); //脚本不超时
    date_default_timezone_set('Europe/London'); //设置时间
    /** Include path **/
    set_include_path(get_include_path() . PATH_SEPARATOR . 'http://www.jb51.net/../Classes/');//设置环境变量
    /** PHPExcel_IOFactory */
    include './Excel/PHPExcel/IOFactory.php';
//$inputFileType = 'Excel5'; //这个是读 xls的
    $inputFileType = 'Excel2007';//这个是计xlsx的
//$inputFileName = './sampleData/example2.xls';
    $inputFileName = "$save_path";
    echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
//    $objPHPExcel = $objReader->load($inputFileName);
    /*
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow(); //取得总行数
    $highestColumn = $sheet->getHighestColumn(); //取得总列
    */
    $objWorksheet = $objPHPExcel->getActiveSheet();//取得总行数
    $highestRow = $objWorksheet->getHighestRow();//取得总列数
    echo 'highestRow='.$highestRow;
    echo "<br>";
    $highestColumn = $objWorksheet->getHighestColumn();
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数
    echo 'highestColumnIndex='.$highestColumnIndex;
    echo "<br />";
    $headtitle=array();
    for ($row = 1;$row <= $highestRow;$row++)
    {
        $strs=array();
        //注意highestColumnIndex的列数索引从0开始
        for ($col = 0;$col < $highestColumnIndex;$col++)
        {
            $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
        }
        $info = array(
            'id'=>"$strs[0]",
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
        //在这儿，你可以连接，你的数据库，写入数据库了
        print_r($info);
        echo '<br />';
    }
}


