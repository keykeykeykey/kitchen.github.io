<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/14
 * Time: 11:00
 */

$username=$_POST['user'];
$passwprd=$_POST['pass'];
$email=$_POST['email'];
global $wpdb;
//$sql="SELECT username FROM _menbers";
$wpdb->insert("_menbers",array(
    "username"=>$username,
    "password"=>$passwprd,
    "email"=>$email
))
?>

