<?php
session_start();

if (!isset($_SESSION['bereer'])) {

    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gojek : <?= $_SESSION['name']?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

</head>

<body>
    <?php
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logout">
            <a href="logout.php"><button class="btn btn-success pull-right">Logout</button></a>
        </div>
    </nav>
    <div class="container"><br>
        Nama <?= $_SESSION['name']?><BR>
        No HP <?= $_SESSION['phone']?>






    </div>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#data_table').DataTable();
        });
    </script>

</body>

</html>