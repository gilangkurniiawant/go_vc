<?php
function alert($a='',$art='1'){
    if($art=='1'){
        $art='info';
    }elseif($art=='2'){
        $art='danger';
    }elseif($art=='3'){
        $art='success';
    }elseif($art=='4'){
        $art='default';
    }else{
        $art='info';
    }

    if($a!==''){
        $data = array('res'=>true,'msg'=>$a,'art'=>$art);
    }else{
        $data['res']=false;
        

    }
    $_SESSION['alert']=null;
    return $data;


}

function detail(){
   include('head.php');
    $data['url']=$host."/wallet/profile/detailed";
    $data['header']=$header;
    $is = curl($data);
    if(json_decode($is['result'],true)!=NULL){
        return json_decode($is['result'],true);
    }else{
        return $is['result'];
    }

}

function gopay_code($no){
    include('head.php');
    $data['url']=$host."/wallet/qr-code?phone_number=%2B$no";
    $data['header']=$header;
    $is = curl($data);
    if(json_decode($is['result'],true)!=NULL){
        return json_decode($is['result'],true);
    }else{
        return $is['result'];
    }

}


function voucher($kode){
   include('head.php');
    $data['url']=$host."/gopoints/v1/orders";
    $data['data']='{"gopay_pin":"150199","payment_type":"gopay","voucher_batch_id":"'.$kode.'","voucher_count":1}';
    $data['header']=$header;
    $is = curl($data);
    if(json_decode($is['result'],true)!=NULL){
        return json_decode($is['result'],true);
    }else{
        return $is['result'];
    }

}


function get($url){
   include('head.php');
    $data['url']=$host."/".$url;
    echo $data['url']."<br>\n";
    $data['header']=$header;
    $is = curl($data);
    if(json_decode($is['result'],true)!=NULL){
        return json_decode($is['result'],true);
    }else{
        return $is['result'];
    }
    
    
}

function transfer($qr_id){
    include('head.php');
    $data['url']=$host."/v2/fund/transfer";
    $data['data']='{"amount":"1","description":":moneybag:","qr_id":"'.$qr_id.'"}';
    $data['save']="1";
    $data['header']=$header;
    $is = curl($data);
    if(json_decode($is['result'],true)!=NULL){
        return json_decode($is['result'],true);
    }else{
        return $is['result'];
    }
}
function pulsa(){
   include('head.php');
    $data['url']=$host."/pulsa-bff/v1/payment";
    $data['data']='{"activity_source":1,"device_token":"28CFDADB5C720000","inquiry_id":"249913bf-5a00-494f-91b7-fd4552f002dd","payment_token":"eyJ0eXBlIjoiR09QQVlfV0FMTEVUIiwiaWQiOiIifQ==","inventory_id":502,"inventory_type":"pulsa","target_msisdn":"+62813 2944 1756","voucher_id":""}';
    $data['save']="1";
    $data['header']=$header;
    $is = curl($data);
    if(json_decode($is['result'],true)!=NULL){
        return json_decode($is['result'],true);
    }else{
        return $is['result'];
    }
}

function order(){
   include('head.php');
    $data['url']=$host."/waiter/v2/orders";
    $data['data']='{"cartPriceEstimated":"17000.0","destinationAddress":"Jl. Sutowijoyo No.45, Penumping, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57141, Indonesia","destinationLatLong":"-7.5664182,110.8067315","destinationName":"Jl. Sutowijoyo No.45","destinationNote":"Hotel sanashtri lantai 2 kamar 211","items":[{"id":0,"itemId":39108442,"itemName":"Nasi Bebek Mropol","notes":"","price":17000,"quantity":1,"uuid":"a07d2d74-e314-4e20-b7f3-0e55db852ef0"}],"analytics":{"discoverySource":"Restaurant Deeplink","discoverySourceDetails":"gojek://gofood/merchant/6f2f8f88-9122-44bb-8678-b7d0edcb7078/sku/a07d2d74-e314-4e20-b7f3-0e55db852ef0/details?source=SHUFFLE&campaign=gofood%3Aplatter%3Afood%3Adish-time-contextual&group=OMK-DISH-TIME_CONTEXTUAL-NPID-T0013-C0002"},"originAddress":"Jl.Yosodipuro No.84B, Banjarsari, Surakarta","originLatLong":"-7.562935,110.813783","originName":"Bebek Mropol, Mangkubumen","paymentType":4,"restaurantId":"6f2f8f88-9122-44bb-8678-b7d0edcb7078","voucherId":""}';
    $data['save']="1";
    $data['header']=$header;
    $is = curl($data);
    if(json_decode($is['result'],true)!=NULL){
        return json_decode($is['result'],true);
    }else{
        return $is['result'];
    }
}

function otp_login($hp){
require('head.php');

    $data['url']=$host."/v4/customers/login_with_phone";
    $data['data']='{"phone":"+'.$hp.'"}';
    

$data['save']="1";
$data['header']=$header;
$is = curl($data);
if(json_decode($is['result'],true)){
    if(array_key_exists('errors'),$is['result']){
        if($is['errors'][0]["message"]=="Nomor HP ini tidak valid. Coba lagi dengan nomor yang valid, ya."){
            $data['data'] = '{"name":"' . gen_nama() . '","email":"' . gen_email() . '@gmail.com","phone":"+' . $hp . '","signed_up_country":"ID"}';
            $data['url']=$host.'/v5/customers';
            $data['header']=$header;
            $is = curl($data);
            return json_decode($is['result'],true);
        
        }

    }
    
    return json_decode($is['result'],true);
}else{
    return json_decode($is['result'],true);
}

}

function claim($kode){
require('head.php');
$data['url']=$host."/go-promotions/v1/promotions/enrollments";
$data['data']='{"promo_code":"'.$kode.'"}';
$data['save']="1";
$data['header']=$header;
$is =curl($data);
if(json_decode($is['result'],true)!=NULL){
    return json_decode($is['result'],true);
}else{
    return $is['result'];
}

}



function login($otp){
require('head.php');
if($login_token==''){
    echo "Token Tidak Ditemukan";
    die();

}




$data['url']=$host."/v4/customers/login/verify";
$data['data']='{"client_name":"gojek:cons:android","client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e","data":{"otp":"'.$otp.'","otp_token":"'.$login_token.'"},"grant_type":"otp","scopes":"gojek:customer:transaction gojek:customer:readonly"}';

$data['save']="1";
$data['header']=$header;
$is =curl($data);
if(json_decode($is['result'],true)!=NULL){
    return json_decode($is['result'],true);
}else{
    return $is['result'];
}
}

?>