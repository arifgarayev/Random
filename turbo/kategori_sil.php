<?php
include 'top.php';

if (isset($_SESSION['login_user'])) {
    $conn = new mysqli("localhost", "root", "root","turbo_cars");
    //$conn->query("SET NAMES UTF8");


    if (isset($_GET['kategori_id'])){

        $kategori_id=$_GET['kategori_id'];

        $kategori_sil_sql = "Update category SET IS_DELETED=1 WHERE CAT_ID=$kategori_id";

        if ($conn->query($kategori_sil_sql) === TRUE) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Category <strong>has been successfully DELETED</strong>...!";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "ERROR occured during <strong>removing category:</strong>" . $conn->error;
            echo "</div>";
        }

    }

    if (isset($_GET['gerial_kategori_id'])){

        $gerial_kategori_id=$_GET['gerial_kategori_id'];

        $kategori_gerial_sql = "Update category SET IS_DELETED=0 WHERE CAT_ID=$gerial_kategori_id";

        if ($conn->query($kategori_gerial_sql) === TRUE) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Category <strong>has successfully been saved</strong>...!";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Error occured during <strong>editing category:</strong>" . $conn->error;
            echo "</div>";
        }

    }

/*************************************/

    $kategoriler_sql="SELECT * FROM category WHERE IS_DELETED <> 1";
    $kategoriler = $conn->query($kategoriler_sql);


    if ($kategoriler->num_rows > 0){
        echo "<div class='row'>\n
            <div class='col-lg-12 col-md-12 mb-12'>\n";
        echo "<h5>Edit Category</h5>\n";
        echo "<a href='kategori_ekle.php'>Add New Category <span class='glyphicon  glyphicon-plus-sign'></span></a>\n";
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
        echo "<h5>Deleted Category</h5>\n";
        echo "<a href='kategori_ekle.php'>Add New Category <span class='glyphicon  glyphicon-plus-sign'></span></a>\n";
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