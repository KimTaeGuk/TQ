<?php
if(!isset($_POST['is_ajax'])) exit;
if(!isset($_POST['user_id'])) exit;
if(!isset($_POST['user_pw'])) exit;
$is_ajax=$_POST['is_ajax'];
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$members = array('user1'=>array('pw'=>'pw1', 'name'=>'한놈'),
        'user2'=>array('pw'=>'pw2', 'name'=>'두시기'),
        'user3'=>array('pw'=>'pw3', 'name'=>'석삼'));

if(!$is_ajax) exit;
if(!isset($members[$user_id])) exit;
if($members[$user_id]['pw'] != $user_pw) exit;
setcookie('user_id',$user_id);
setcookie('user_name',$members[$user_id]['name']);
echo "success";	
?>