<?php
include 'top.php';

if (isset($_SESSION['login_user'])) {

    $conn = new mysqli("localhost", "root", "root","turbo_cars");
    //$conn->query("SET NAMES UTF8");

    $kategoriler_sql="SELECT * FROM category WHERE IS_DELETED <> 1";
    $kategoriler = $conn->query($kategoriler_sql);


    if ($kategoriler->num_rows > 0){
        echo "<div class='row'>\n
            <div class='col-lg-12 col-md-12 mb-12'>\n";
        echo "<h5>Edit Category</h5>\n";
        echo "<a href='kategori_ekle.php'>Create new category <span class='glyphicon  glyphicon-plus-sign'></span></a>\n";
        echo "<table border=1>\n";
        echo "<tr>\n<th>Category Name</th><th>Edit</th></tr>\n";
        while($kategori = $kategoriler->fetch_assoc()) {
            echo "<tr><td>{$kategori['CAT_NAME']}</td><td><a href='kategori_sil.php?kategori_id={$kategori['CAT_ID']}'><span class='glyphicon glyphicon-trash'></span></a> &nbsp; &nbsp;<a href='kategori_degistir.php?kategori_id={$kategori['CAT_ID']}'><span class='glyphicon  glyphicon-pencil'></span></a> </td>\n</tr>\n";
  		}
        echo "</table>\n";
        echo "</div>\n";
        echo "</div>\n";
        echo "<p></p>\n";
    }

    $kategoriler_sql="SELECT * FROM category WHERE IS_DELETED = 1";
    $kategoriler = $conn->query($kategoriler_sql);


    if ($kategoriler->num_rows > 0){
        echo "<div class='row'>\n
            <div class='col-lg-12 col-md-12 mb-12'>\n";
        echo "<h5>Deleted Categories</h5>\n";
        echo "<table border=1>\n";
        echo "<tr>\n<th>Category Name</th><th>Edit</th></tr>\n";
        while($kategori = $kategoriler->fetch_assoc()) {
            echo "<tr><td>{$kategori['CAT_NAME']}</td><td><a href='kategori_sil.php?gerial_kategori_id={$kategori['CAT_ID']}'><span class='glyphicon glyphicon-refresh'></span> Back</a></td>\n</tr>\n";
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