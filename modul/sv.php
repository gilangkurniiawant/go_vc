<?php
function head(){
    require_once('../modul/modul.php');
    //Tmaplate -> $data = array('url'=>'','data'=>'','sock'=>'','header'=>'','save'=>'0','cookie'=>'0');
    //$xid= "X-UniqueId: 106605982657".mt_rand(1000,9999);
    $xid="X-UniqueId: 1066059826572103";
    $token = "c693e0d3-5812-419f-a4ea-72161721c4fe";
    $otp="4818";
    
    $header='Host: api.gojekapi.com
    User-Agent: okhttp/3.10.0
    Accept: application/json
    Accept-Language: en-ID
    Content-Type: application/json; charset=UTF-8
    X-AppVersion: 3.16.1
    Connection: keep-alive    
    X-User-Locale: en_ID
    X-Location: -7.613805,110.633676
    X-Location-Accuracy: 3.0
    '.$xid;
    
    $host ="https://api.gojekapi.com";
    }

function cok(){
    head();
    
    echo $host;
}
cok();