<?php

$xrand= "X-UniqueId: 106605982657".mt_rand(1000,9999);
$xid = isset($_SESSION['xid']) ? $_SESSION['xid'] : $xrand;
$bereer = isset($_SESSION['bereer']) ? $_SESSION['bereer'] : '';
$login_token = isset($_SESSION['login_token']) ? $_SESSION['login_token'] : '';
if(@$_SESSION['val_pin']){   
    $pin= $_SESSION['val_pin']=='' ? '' : $_SESSION['val_pin'];
} else{
    $pin = '';
}
$host ="https://api.gojekapi.com";

$header='Host: api.gojekapi.com
User-Agent: okhttp/3.10.0
Accept: application/json
X-Session-ID:b02b1f69-f15a-4148-835e-318e6fd2b3f1
X-PhoneModel: ZTE,ZTE B2015
X-DeviceOS: Android,5.1.1
X-AppVersion: 3.34.1
X-AppId: com.gojek.app
pin: '.$pin.'
Authorization: Bearer '.$bereer.'
Accept-Language: id-ID
Content-Type: application/json; charset=UTF-8
X-AppVersion: 3.16.1
Connection: keep-alive    
X-User-Locale: id_ID
X-Location: -7.613805,110.633676
X-Location-Accuracy: 3.0
'.$xid;




?>