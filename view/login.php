
<!DOCTYPE html>
<html lang="en">
<?php
 if(isset($_SESSION['bereer']) && $_GET['id']!=="logout"){
    header('Location:view/ds.php');
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .card {
            margin-top: 50px;
            width: 300px;
            margin-left: 40%;
        }
    </style>
</head>

<body>

    <!-- <div class="container"> -->
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
        <?php $act = isset($_GET['kode']) ? 'verif' : 'login' ?>
            <form method="post" action="../action.php?id=<?=$act?>">
                <div class="form-group">
                <?php $title = isset($_GET['kode']) ? 'Kode Verifikasi' : 'Nomer HP' ?>
                    <label for="username"><?=$title?></label>
                    <input type="text" class="form-control" name="no" placeholder="6281...">

                </div>
                <input type="submit" value="Masuk" class="btn btn-primary">
            </form>
        </div>
    </div>

    <!-- </div> -->
</body>

</html>