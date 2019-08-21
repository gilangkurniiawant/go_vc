
<!DOCTYPE html>
<html lang="en">
<?php
require_once('function.php');


?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='true' name='MSSmartTagsPreventParsing' />

    <title>ZTH - Gopay 1 Rupiah</title>
	<link rel="shortcut icon" href="assets/log.jpg" />
    <link href="assets/bootstrap.min.css" rel="stylesheet">
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
                <a class="navbar-brand" href="http://gopaysender.com/#">ZTH - Gopay 1 Rupiah</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
																
            </div>
        </div>
    </div>
</nav><div class="container">						<div class="row">
							<div class="col-md-offset-2 col-md-8">
                                <?php 
                                if(@$_GET['alert']){
                                    $art = @$_GET['n'] ? $_GET['n'] : '1';
                                    $data = alert($_GET['alert'],$art);
                                    if($data['res']){
                                        echo '<div class="alert alert-'.$data['art'].'">'.$data['msg'].'</div>';
                                    }
                                }
                                ?>
                                <div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-send"></i> Dapatkan <b>Rp. 1 Rupiah</b> GO-PAY Gratis</h3>
									</div>
									<div class="panel-body">
																														<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-2 control-label">Nomor</label>
												<div class="col-md-10">
													<input type="number" name="phone" class="form-control" placeholder="Mohon baca kolom informasi dibawah ini sebelum menginput nomor">
												</div>
											</div>
											<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">  
												<div class="pull-right">
										            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                                                    <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Submit</button>
                                                </div>
												</div>
											</div>
										</form>
									</div>
								
								</div>
							</div>
							<div class="col-md-offset-2 col-md-8">
								  <div class="panel panel-default m-b-md">
								<div class="panel-heading">
								    <h3 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h3></div>
				                    	<h3><center>Sisa GO-PAY Saat Ini: 2484</center></h3>
				                    <div class="panel-body">
                                        Harap dibaca sampai habis informasi dibawah ini:		
<br><br>								
                                    <ul>								
										<li>Bisa mengirim ke nomor operator Indonesia dan Luar Negeri</li>
										<li>Format menginput nomor yang benar (62812xxxxxxxx - Indonesia) (1253xxxxxxx - United States)</li>
										<li>Nomor yang sama hanya dapat menerima GO-PAY 1x dalam sehari</li>
										<li>Apa gunanya ini? Gunanya untuk 'Gratis Ongkos Kirim' saat memesan layanan GO-FOOD</li>
										<li>Jika ada pertanyaan dan masukkan, silakan kontak ke: <b>oojinyali@gmail.com</b></li>
										<li>Gratis sampai kapanpun dan untuk siapapun</li>
										<br><br>
										<b>*NB: 
Kalau error/gagal, berarti akun saya limit, tunggu & coba saja lagi dalam 30 menit - 1 jam.</b>
										<br><br><br>
										<b>DAFTAR SERVER:</b>
										<br><br>
										<a href="http://gopaysender.com//" target="_blank" title="GO-PAY Sender Rp. 3 Rupiah">[Server] GO-PAY Sender Rp. 3 Rupiah</a><br>
										<a href="http://gopaysender.com/server" target="_blank" title="GO-PAY Sender Rp. 6 Rupiah">[Server] GO-PAY Sender Rp. 6 Rupiah</a><br>
										<a href="http://gopaysender.com/server2" target="_blank" title="GO-PAY Sender Rp. 8 Rupiah">[Server] GO-PAY Sender Rp. 8 Rupiah</a><br>
										<a href="http://gopaysender.com/server3" target="_blank" title="GO-PAY Sender Rp. 10 Rupiah">[Server] GO-PAY Sender Rp. 10 Rupiah</a><br>
									</ul>								
                                </div>
                            </div>
						</div>
					</div>
						<!-- end row -->
    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
</body>