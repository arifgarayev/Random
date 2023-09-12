<?php
include 'top.php';

if (isset($_SESSION['login_user'])) {

    $conn = new mysqli("localhost", "root", "root","turbo_cars");
    //$conn->query("SET NAMES UTF8");

    $kategoriler_sql="SELECT * FROM category";
    $kategoriler = $conn->query($kategoriler_sql);
    echo "<h4>Add New Category</h4>";
    echo "<form action='kategori_ekle.php' method='POST'>";
    echo "<div class='form-group'>";
    echo "<label for='kadi'>Category Name:</label>
          <input type='text'  class='form-control' placeholder='Enter category name' id='kategori_adi' name='txtKategoriAdi'><br />";
    echo "</div>";
    echo "<input type='submit' value='Save'>";
    echo "</form><br /><br />";



    if (isset($_POST['txtKategoriAdi'])){

        $kategori_adi=$_POST['txtKategoriAdi'];


    $kategori_bul_sql= "Select *  From category Where CAT_NAME='$kategori_adi'";

    $bulundu = $conn->query($kategori_bul_sql);

    if($bulundu->num_rows == 0){
    $kategori_kaydet_sql = "INSERT INTO category (CAT_NAME,IS_DELETED)
    VALUES ('$kategori_adi',0)";

    $kaydet = $conn->query($kategori_kaydet_sql);
    }else{

        echo "<div class='alert alert-danger' role='alert'>
                <strong>Same Category</strong> already exists. Please check again!
              </div>";
    }
/**********************************************/

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
            echo "<h5>Deleted Categories</h5>\n";
            echo "<a href='kategori_ekle.php'>Add New Category <span class='glyphicon  glyphicon-plus-sign'></span></a>\n";
            echo "<table border=1>\n";
            echo "<tr>\n<th>Categiry Name</th><th>Edit</th></tr>\n";
            while($kategori = $kategoriler->fetch_assoc()) {
                echo "<tr><td>{$kategori['CAT_NAME']}</td><td><a href='kategori_sil.php?gerial_kategori_id={$kategori['CAT_ID']}'><span class='glyphicon glyphicon-refresh'></span> Back</a></td>\n</tr>\n";
            }
            echo "</table>\n";
            echo "</div>\n";
            echo "</div>\n";
            echo "<p></p>\n";
        }

    }
}else{
    echo "<script language='javascript' type='text/javascript'> location.href='login.php' </script>";
}
		  
include 'bottom.php';
?>