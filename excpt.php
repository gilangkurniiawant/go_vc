<?php
session_start();
if (@$_SESSION['request']) {
    if ($_SESSION['request'] != '--!_--!_--!--!--!!!!') {
        header('Location:index.php');
        die();
    }
} else {
    header('Location:index.php');
    die();
}

include('modul/modul.php');
include('function.php');
if (isset($_POST['id'])) {
    if (isset($_SESSION['bereer']) && $_POST['id'] !== "logout") {
        header('Location:dashboard.php');
        die();
    } else {
        if ($_POST['id'] == 'login') {
            if (@$_SESSION["phone"] == FALSE) {
                if ($_POST['id'] == 'login' && @$_POST['no']) {
                    if ($_POST['no']['0'] == '0') {
                        $no = substr_replace($_POST['no'], '62', 0, 1);
                    } elseif ($_POST['no']['0'] == '6') {
                        $no = $_POST['no'];
                    } elseif ($_POST['no']['0'] == '1') {
                        $no = $_POST['no'];
                    } else {
                        $no = $_POST['no'];
                    }
                }
            } else {
                $no = $_SESSION["phone"];
            }


            $is = otp_login($no);
            if ($is['data']) {
                $_SESSION["xid"] = "X-UniqueId: 106605982657" . mt_rand(1000, 9999);
                $_SESSION["phone"] = $no;
                if (array_key_exists('login_token', $is["data"])) {
                    $alrt = "<strong>Login - Wah,</strong> Tinggal selangkah lagi nih";
                    $_SESSION["alert"] = array($alrt, '1');
                    $_SESSION["aksi"] = "login";
                    $_SESSION["login_token"] = $is["data"]['login_token'];
                } else {
                    $alrt = "<strong>Daftar Akun Baru!,</strong> Tinggal selangkah lagi nih";
                    $_SESSION["alert"] = array($alrt, '1');
                    $_SESSION["aksi"] = "daftar";
                    $_SESSION["login_token"] = $is["data"]['otp_token'];
                }
            } else {
                $_SESSION["xid"] = null;
                $_SESSION["alert"] = array($is['errors'][0]["message"], '2');
            }
        }
        header('Location:index.php');
    }
    if ($_POST['id'] == 'verif' && @$_POST['no']) {


        if (isset($_POST['no'])) {
            $is = login($_POST['no']);

            if ($is['success']) {
                $_SESSION['bereer'] = $is['data']["access_token"];
                $_SESSION['refresh_token'] = $is['data']["access_token"];
                $_SESSION['id'] = $is['data']["customer"]["id"];
                $_SESSION['name'] = $is['data']["customer"]["name"];
                $_SESSION['phone'] = $is['data']["customer"]["phone"];
                $_SESSION['signed_up_country'] = $is['data']["customer"]["signed_up_country"];
                $_SESSION['email'] = $is['data']["customer"]["email"];
                $_SESSION['chat_id'] = $is['data']["customer"]["chat_id"];
                $_SESSION['chat_token'] = $is['data']["customer"]["chat_id"];
                $is = detail();
                $_SESSION['balance'] = $is['data']["balance"];
                $_SESSION['pin'] = $is['data']["pin_setup"];
                $_SESSION['kurang'] = array();
                header('Location:dashboard.php');
            } else {
                $_SESSION["alert"] = array($is['errors'][0]["message"], '2');
                header('Location:index.php');
            }
        }
    }
    if ($_POST['id'] == 'logout') {
        session_destroy();
        session_unset();
        header('Location:index.php');
    }
}

if (@$_GET['claim']) {
    if ($_GET['claim'] == '1') {
        $is = voucher('91f62ad1-815f-4a6e-b6d1-ca68a52987fe');
    } elseif ($_GET['claim'] == '2') {
        $is = voucher('4f016cb3-5fce-407c-a5e1-cae7579940c0');
    } elseif ($_GET['claim'] == '3') {
        $is = voucher('eb572afe-a9b7-445d-add7-b27a0aca7711');
    } elseif ($_GET['claim'] == '4') {
        $is = claim('COBAINGOJEK');
    } else {
        header('Location:dashboard.php');
        die();
    }
    if ($is['success']) {
        $alrt = "<strong>Yey,</strong> Voucher berhasil di claim";
        $_SESSION["alert"] = array($alrt, '1');
    } else {
        if ($is['errors'][0]["message_title"] == 'Yah, kodenya tidak ketemu') {
            $alrt = "<strong>Yah,</strong> hanya untuk pengguna baru.";
            $_SESSION["alert"] = array($alrt, '2');
        }
        $alrt = $is['errors'][0]["message"];
        $_SESSION["alert"] = array($alrt, '2');
    }
    header('Location:dashboard.php');
}


if (@$_POST['pin']) {

    $is = claim($_POST['pin']);
    if (array_key_exists('data', $is)) {
        if ($is['data']['success']) {

            $_SESSION["alert"] = array($_POST['pin'] . " : SUKSES! . " . $is['errors'][0]['message'], '2');
        } else {

            $_SESSION["alert"] = array($_POST['pin'] . " : GAGAL! . " . $is['errors'][0]['message'], '2');
        }
    } else {

        $_SESSION["alert"] = array($_POST['pin'] . " : " . $is['errors'][0]['message'], '2');
    }
    $_SESSION['claim'] = 1;

    header('Location:dashboard.php');
}
