<!DOCTYPE html>
<html lang="en">

<?php

require_once('function.php');
include('modul/modul.php');


session_start();
$is = detail();
$_SESSION['balance'] = $is['data']["balance"];
$_SESSION['pin'] = $is['data']["pin_setup"];
if (!@$_SESSION['val_pin']) {
    $_SESSION['val_pin'] = '';
} else {
    $_SESSION['claim'] = 0;
}

if (!@$_SESSION['bereer']) {
    header('Location:index.php');
    die();
}
if (!$_SESSION['pin']) {
    $_SESSION['kurang']['0'] = "Kamu belum set PIN, silakan set PIN di aplikasi gojek";
} else {
    if ($_SESSION['val_pin'] == '') {
        echo "<script>var setPin =1;</script>";
    } else {
        $lpin = 'Pin Kamu : ' . $_SESSION['val_pin'][0] . $_SESSION['val_pin'][1] . $_SESSION['val_pin'][2] . "...";
        echo "<script>var setPin =0;</script>";
    }
    $_SESSION['kurang']['0'] = '';
}
if ($_SESSION['balance'] < 100000) {

    $_SESSION['kurang']['1'] = "Yah, saldo kamu tinggal Rp." . $_SESSION['balance'];
} else {
    $_SESSION['kurang']['1'] = '';
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='true' name='MSSmartTagsPreventParsing' />

    <title>Gopay Tool</title>
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
                <a class="navbar-brand" href="">Gojek Tool</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            </div>
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <?php
                if (@$_GET['alert']) {
                    $art = @$_GET['n'] ? $_GET['n'] : '1';
                    $data = alert($_GET['alert'], $art);
                    if ($data['res']) {
                        echo '<div class="alert alert-' . $data['art'] . '">' . $data['msg'] . '</div>';
                    }
                }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-send"></i><?= $_SESSION['name'] ?> - <b><?php if (@$lpin) {
                                                                                                            echo $lpin;
                                                                                                        } ?></h3>
                    </div>
                    <div class="panel-body">
                        Hai <?= $_SESSION['name'] ?> , ada beberapa masalah nih, yuk kita cek..
                        <table class="table table-striped table-bordered table-hover m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Masalah</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                for ($x = 0; $x < count($_SESSION['kurang']); $x++) {
                                    if ($_SESSION['kurang'][$x] != '') {
                                        ?>
                                <tr>
                                    <th scope="row"><?= $x ?></th>
                                    <td><?= $_SESSION['kurang'][$x] ?></td>
                                </tr>
                                <?php }
                                } ?> </tbody>
                        </table>

                        <div id="set_pin">
                            <label>KLAIM VOUCHER</label>
                            <form action="excpt.php" method="POST">
                                <input type="text" name="pin" class="form-control" value="GOFOODNASGOR07">
                                <div class="pull-left"><br>
                                    <button class="btn btn-primary" type="submit">CLAIM</button>
                            </form>
                        </div><br><br>
                        <hr>
                    </div>


                    <div class="pull-left">
                        <a class="btn btn-info" href="dashboard.php">Refresh</a>
                    </div>
                    <div class="pull-right">
                        <form action="excpt.php" method="POST">
                            <input type="hidden" name="id" class="form-control" value="logout">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-refresh"></i>Keluar</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-offset-2 col-md-8">
            <?php
            if (@$_SESSION["alert"]) {
                $data = alert($_SESSION["alert"]['0'], $_SESSION["alert"]['1']);
                if ($data['res']) {
                    echo '<div class="alert alert-' . $data['art'] . '">' . $data['msg'] . '</div>';
                }
            }
            ?>
            <div class="panel panel-default m-b-md">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-info-circle"></i> Voucher Tersedia</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover m-0">
                        <tr>
                            <th>Voucher</th>
                            <th>Harga</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Goride Rp.15.000 Voucher * 10<br>
                                (Senilai Rp.150.000)
                            </td>
                            <td>Rp.19.000</td>
                            <td><a button href="excpt.php?claim=1" class="btn btn-primary">Claim</a>

                        </tr>
                        <tr>
                            <td>Gofood Rp.12.000 Voucher * 8<br>
                                (Senilai Rp.96.000)
                            </td>
                            <td>Rp.30.000</td>
                            <td><a button href="excpt.php?claim=2" class="btn btn-primary">Claim</a>

                        </tr>

                        <tr>
                            <td>Goride Rp.20.000 Voucher + 2 Bonus<br>
                                (Senilai Rp.20.000)
                            </td>
                            <td>Rp.10.000</td>
                            <td><a button href="excpt.php?claim=3" class="btn btn-primary">Claim</a>

                        </tr>

                        <tr>
                            <td>Promo Voucher Goride Rp.10.000 <br>
                                (Khusus user baru)
                            </td>
                            <td>Rp.0</td>
                            <td><a button href="excpt.php?claim=4" class="btn btn-primary">Claim</a>

                        </tr>

                    </table>
                    <p> Punya promo Lain ? Hubungi <a href="https://www.facebook.com/GiLangKuRniiawant2" target="black">disini</a> untuk menambahkan promo.
                </div>
            </div>
        </div>
    </div>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>

    <script>
        if (setPin == 1) {
            $('#set_pin').show();
        } else {
            $('#set_pin').hide();
        }
    </script>
</body>