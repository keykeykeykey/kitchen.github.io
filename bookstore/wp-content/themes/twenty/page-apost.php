<?php
get_header();
session_start();
$cate=$_GET['checkValue'];
$_SESSION['checkValue']=$cate;
$str=gettype($cate);
$arr['num1']=$str;


//if($cate==null||$cate==""){
//    $cate='storrage';
//}

//var_dump(function_exists('get_post_array'));
//$result=get_post_array('popular');

//var_dump($result);


$json_obj=json_encode($arr);
print_r($json_obj);
get_footer();
?>