
<!DOCTYPE html>
<html lang="en">
<?php
require_once('function.php');
session_start();
$_SESSION['request'] = '--!_--!_--!--!--!!!!';
if(@$_SESSION['bereer']){
    header('Location:dashboard.php');
    die();
}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='true' name='MSSmartTagsPreventParsing' />

    <title>Gojek Tool - By : Gilang K</title>
	<link rel="shortcut icon" href="assets/log.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Quicksand', sans-serif;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default">
        <div class="container-fluid container-fluid-spacious">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Gojek Tool- By : Gilang K...<</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
																
            </div>
        </div>
    </div>
</nav><div class="container">
<div class="row">
							<div class="col-md-offset-2 col-md-8">
                                <?php 
                                if(@$_SESSION["alert"]){
                                    $data = alert($_SESSION["alert"]['0'],$_SESSION["alert"]['1']);
                                    if($data['res']){
                                        echo '<div class="alert alert-'.$data['art'].'">'.$data['msg'].'</div>';
                                    }
                                }
                                ?>
                                <div class="panel panel-default">
									<div class="panel-heading">
                                    <?php 
                                    $wel ='<b>Gojek! Tool!</b> Klaim Voucher  Tanpa Aplikasi </b>';
                                    if(@$_SESSION["phone"]){
                                    $satu_lagi = 'Kode verifikasi dikirim ke : <b>'.$_SESSION["phone"].'</b>';
                                    $satu_lagi .='
                                                        <form action="excpt.php" method="POST">
                                                        <input type="hidden" name="id" value="logout">
										                <button type="submit" class="btn btn-danger"><i class="fa fa-refresh"></i>Ganti Nomor</button>
                                                        </form> 
                                                    ';
                                    }
                                    $no =array('081..... / 10293....','0000');



                                    $act = isset($_SESSION["login_token"]) ? 'verif' : 'login';
                                    
                                    $title = isset($_SESSION["login_token"]) ? $satu_lagi : $wel ;
                                    $no_place= isset($_SESSION["login_token"]) ? $no['1'] : $no['0'] ;
                                    $note = isset($_SESSION["login_token"]) ? "Masukan kode verifikasi yang dikirim melalui sms" : "";
                                    $label_no =isset($_SESSION["login_token"]) ?  "Masukan Kode Verifikasi " : " Nomor HP ";

                                    
                                    
                                    ?>
                                    
										<h3 class="panel-title"><i class="fa fa-send"></i><?=$title?></h3>
									</div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" action="excpt.php" method="POST">
											<div class="form-group">
												<label class="col-md-2 control-label"><?=$label_no?></label>
												<div class="col-md-10">

													<input type="number" name="no" value="<?=$act?>" class="form-control" placeholder="<?=$no_place?>">
                                                    <?=$note ?>
												</div>
                                                
											</div>
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10"> 
                                                <?php if($act!='login'){ ?> 
                                                <div class="pull-left">
                                                    </form>
                                                    <form method="POST" action="excpt.php" >
                                                    <input type="hidden" name="id" value="login">
										            <button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> Kirim Ulang Kode </button>
                                                    </form>
                                                </div>
                                                <?php }?>
												<div class="pull-right">
                                                <input type="hidden" name="id" class="form-control" value="<?=$act?>">
										            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Ulangi</button>
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Kirim</button>
                                                </div>
												</div>
											</div>
										</form>
									</div>
								
								</div>
							</div>

  


    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/custom.js"></script>
</body>
</html>