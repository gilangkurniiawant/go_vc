<?php

require_once('action.php');

$is =array('data'=>array(
  "xid"=>"X-UniqueId: 1066059826579936",
  "access_token"=> "d25b6288-23f8-4f0a-b084-bf44eb44fd1b",
  "login_token"=>"c4e1d3ec-3b61-4b7d-a08b-bbc1092bb540",
  "bereer"=>"d25b6288-23f8-4f0a-b084-bf44eb44fd1b",
  "refresh_token"=>"d25b6288-23f8-4f0a-b084-bf44eb44fd1b",
  "id"=>"604156810",
  "name"=>"Rhuka",
  "phone"=>"+6281329441756",
  "signed_up_country"=>"ID",
  "email"=>"gilangkurniawant@gmail.com",
  "chat_id"=>"8357ece3-e97a-4483-b32f-dc3351a3835f",
  "chat_token"=>"8357ece3-e97a-4483-b32f-dc3351a3835f",
));

$_SESSION['bereer']=$is['data']["access_token"];
$_SESSION['refresh_token']=$is['data']["access_token"];
$_SESSION['id']=$is['data']["id"];
$_SESSION['name']=$is['data']["name"];
$_SESSION['phone']=$is['data']["phone"];
$_SESSION['signed_up_country']=$is['data']["signed_up_country"];
$_SESSION['email']=$is['data']["email"];
$_SESSION['chat_id']=$is['data']["chat_id"];
$_SESSION['chat_token']=$is['data']["chat_id"];



function get_rupiah($no){
    $_GET['action']=='transfer'; 
    $_GET['no']=$no;
}

echo get_rupiah();




?>