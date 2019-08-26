<?php

$xrand = "X-UniqueId: 106605982657" . mt_rand(1000, 9999);
$xid = isset($_SESSION['xid']) ? $_SESSION['xid'] : $xrand;

$bereer = isset($_SESSION['bereer']) ? $_SESSION['bereer'] : '';
/*
if ($_SESSION['admin'] == 1) {
    $bereer = $_SESSION['token_admin'];
    $_SESSION['admin'] = 0;
}
*/

function gen_uuid()
{

    return strtoupper(bin2hex(openssl_random_pseudo_bytes(16)));
}


$login_token = isset($_SESSION['login_token']) ? $_SESSION['login_token'] : '';
if (@$_SESSION['val_pin']) {
    $pin = $_SESSION['val_pin'] == '' ? '' : $_SESSION['val_pin'];
} else {
    $pin = '';
}

if (!@$_SESSION['uuid']) {
    $_SESSION['uuid'] = gen_uuid();
}
$uuid =  $_SESSION['uuid'];


$host = "https://api.gojekapi.com";

$header = 'X-AppId: com.gojek.app
User-Agent: okhttp/3.12.1
X-Platform: Android
X-Sesion-ID : ' . $uuid . '
X-PushTokenType: FCM
Accept: application/json
X-PhoneModel: Samsung,Samsung Galaxy S10+
X-DeviceOS: Android,9.0
X-AppVersion: 3.35.1
X-AppId: com.gojek.app
pin: ' . $pin . '
Authorization: Bearer ' . $bereer . '
Accept-Language: en-ID
Content-Type: application/json; charset=UTF-8
X-AppVersion: 3.16.1
Connection: keep-alive    
X-User-Locale: en_ID
' . $xid;
