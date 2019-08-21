<?php
session_start();
include('modul/modul.php');
include('function.php');

if(isset($_GET['id'])){
    if(isset($_SESSION['bereer']) && $_GET['id']!=="logout"){
        header('Location:view/ds.php');
    } else {
    if($_GET['id']=='login'){
        if(isset($_POST['no'])){
        $_SESSION["xid"]= "X-UniqueId: 106605982657".mt_rand(1000,9999);
        if($_GET['no']['0']=='0'){
            $no = substr_replace($_GET['no'],'62',0,1);        
        }elseif($_GET['no']['0']=='6'){
            $no =$_GET['no'];    

        }else{
            echo "Format Salah";  
            die();

        }
        $is = otp_login($_POST['no']);
       
        if($is['success']){
            if($is["data"]['login_token']!=''){
            
            $_SESSION["login_token"]=$is["data"]['login_token'];
            header('Location:view/login.php?kode=1');
            } else {
                var_dump($is);
                echo "Gagal Dapat OTP";
                die();
            } 

        }
        }
    } if($_GET['id']=='verif'){
        
        if(isset($_POST['no'])){
            $is = login($_POST['no']);
            
            if($is['success']){
                $_SESSION['bereer']=$is['data']["access_token"];
                $_SESSION['refresh_token']=$is['data']["access_token"];
                $_SESSION['id']=$is['data']["customer"]["id"];
                $_SESSION['name']=$is['data']["customer"]["name"];
                $_SESSION['phone']=$is['data']["customer"]["phone"];
                $_SESSION['signed_up_country']=$is['data']["customer"]["signed_up_country"];
                $_SESSION['email']=$is['data']["customer"]["email"];
                $_SESSION['chat_id']=$is['data']["customer"]["chat_id"];
                $_SESSION['chat_token']=$is['data']["customer"]["chat_id"];
                header('Location:view/ds.php');
                
    
            }
        }
    }if($_GET['id']=='logout'){
        session_destroy();
        session_unset();
        header('Location:view/login.php');

    
    }

    }
}

if(isset($_GET['action'])){
   if($_GET['action']=='order'){
        $is = order();
        var_dump($is);
    }elseif($_GET['action']=='claim'){
        $is = claim();
        var_dump($is);
    }elseif($_GET['action']=='voucher'){
        
        $is = voucher();
        
        
        var_dump($is);
    }
    elseif($_GET['action']=='pulsa'){
        
        $is = pulsa();
        var_dump($is);
        
    }elseif($_GET['action']=='transfer' && isset($_GET['no'])){
        if($_GET['no']['0']=='0'){
            $no = substr_replace($_GET['no'],'62',0,1);        
        }elseif($_GET['no']['0']=='6'){
            $no =$_GET['no'];    

        }else{
            echo "Format Salah";  
            die();

        }
        $is = gopay_code($no); 
 //       var_dump($is); die();
        
    
        if($is['success']){       
            $qr_code=$is['data']['qr_id'];
            $is = transfer($qr_code);
            //var_dump($is); die();
            if($is['success']){
                echo $is['data']['transaction_ref'];
            }else{
                echo $is['errors'][0]['message'];
            }
        } elseif($is['errors'][0]['message']){
            echo "Nomer tidak terdaftar";           
        }else{
            echo "Error tak terduga";
        }
        
    }elseif($_GET['action']=='balance'){
        $is = detail();
        echo $is['data']['balance'];

        
    }
}


if(isset($_GET['url'])){
    $data= str_replace("62","%2B62",$_GET['url']);
    $data= str_replace(" ","%20",$data);
    $is = get($data);
    var_dump($is);
    
}


?>