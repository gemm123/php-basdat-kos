<?php
session_start();

if($_SESSION['login'] != true){
    header('Location: /login.php');
    exit();
}

require_once __DIR__ . "/getconnection.php";

$connection = getConnection();

$sql = "SELECT * FROM transaksi ORDER BY id_transaksi";
$statement = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Data Transaksi</title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Data Transaksi</h1>
        <a href="addtransaksi.php">Add</a>
        <a href="dashboard.php">Menu</a>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>Id Transaksi</th>
                <th>Nomor Kamar</th>
                <th>Id Penghuni</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Update</th>
            </tr>
            <?php
                while($row = $statement->fetch()){
                    echo "<tr>";
                    echo "<td>".$row['id_transaksi']."</td>";
                    echo "<td>".$row['nomor_kamar']."</td>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['tanggal_masuk']."</td>";
                    echo "<td>".$row['tanggal_keluar']."</td>";
                    echo "<td><a href='edittransaksi.php?id_transaksi=$row[id_transaksi]'>Edit</a> | 
                        <a href='deletetransaksi.php?id_transaksi=$row[id_transaksi]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>