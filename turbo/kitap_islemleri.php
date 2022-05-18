<?php
include 'top.php';

if (isset($_SESSION['login_user'])) {

    $conn = new mysqli("localhost", "root", "root", "turbo_cars");
    //$conn->query("SET NAMES UTF8");

    $kitaplar_sql = "SELECT * FROM cars WHERE IS_DELETED <> 1";
    $kitaplar = $conn->query($kitaplar_sql);

    if ($kitaplar->num_rows > 0) {
        echo "<div class='row'>\n
		<div class='col-lg-12 col-md-12 mb-12'>\n";
        echo "<h5>Cars on SALE</h5>\n";
        echo "<a href='kitap_ekle.php'>Add a new car <span class='glyphicon  glyphicon-plus-sign'></span></a>\n";
        echo "<table border=1>\n";
        echo "<tr>\n<th>Year</th><th>Manufacturer</th><th>Price</th><th>Image</th><th>Edit</th></tr>\n";
        while ($kitap = $kitaplar->fetch_assoc()) {
            echo "<tr><td>{$kitap['YEAR']}</td>\n<td>{$kitap['CAR_NAME']}</td>\n<td>{$kitap['PRICE']}&#36;</td>\n<td><img width=30% height=30% src='images/{$kitap['IMAGE']}'/></td>\n<td><a href='kitap_sil.php?kitap_id={$kitap['CAR_ID']}'><span class='glyphicon glyphicon-trash'></span></a> &nbsp; &nbsp;<a href='kitap_degistir.php?kitap_id={$kitap['CAR_ID']}'><span class='glyphicon  glyphicon-pencil'></span></a> </td>\n</tr>\n";
        }
        echo "</table>\n";
        echo "</div>\n";
        echo "</div>\n";
        echo "<p></p>\n";
    }

    $kitaplar_sql = "SELECT * FROM cars WHERE IS_DELETED = 1";
    $kitaplar = $conn->query($kitaplar_sql);

    if ($kitaplar->num_rows > 0) {
        echo "<div class='row'>\n
		<div class='col-lg-12 col-md-12 mb-12'>\n";
        echo "<h5>Deleted Cars</h5>\n";
        echo "<table class='table_list' border=1>\n";
        echo "<tr>\n<th>Year</th><th>Manufacturer</th><th>Price</th><th>Image</th><th>Edit</th></tr>\n";

        while ($kitap = $kitaplar->fetch_assoc()) {
            echo "<tr>\n<td>{$kitap['YEAR']}</td>\n<td>{$kitap['CAR_NAME']}</td>\n<td>{$kitap['PRICE']}&#36;</td>\n<td><img width=30% height=30% src='images/{$kitap['IMAGE']}'/></td>\n<td><a href='kitap_sil.php?gerial_kitap_id={$kitap['CAR_ID']}'><span class='glyphicon glyphicon-refresh'></span> Back</a></td>\n</tr>\n";
        }

        echo "</table>\n";
        echo "</div>\n";
        echo "</div>\n";
        echo "<p></p>\n";
    }

}else{
    echo "<script language='javascript' type='text/javascript'> location.href='login.php' </script>";
}






		  
include 'bottom.php';
?>