<?php
include 'top.php';

if (isset($_SESSION['login_user'])) {

    $conn = new mysqli("localhost", "root", "root","turbo_cars");
    //$conn->query("SET NAMES UTF8");

    if(isset($_GET['kategori_id'])){
        $kategori_id = $_GET['kategori_id'];
        $kategori_duzenle_sql="SELECT * FROM category WHERE CAT_ID=$kategori_id";
        $kategori = $conn->query($kategori_duzenle_sql);

        while($kategori_bilgi = $kategori->fetch_assoc()) {
            $kategori_id=$kategori_bilgi['CAT_ID'];
            $kategori_adi=$kategori_bilgi['CAT_NAME'];
        }
        echo "<h4>Change Category Details</h4>";
    echo "<form action='kategori_degistir.php' method='POST'>";
    echo "<input type='hidden' name='intKID' value='$kategori_id'><br />";
    echo "<div class='form-group'>";
    echo "<label for='kadi'>Category Name:</label>
          <input type='text'  class='form-control' placeholder='Enter category name' id='kadi' name='txtKategoriAdi' value='$kategori_adi'><br />";
    echo "</div>";
    echo "<input type='submit' value='Save'>";
    echo "</form><br /><br />";
    }

    if(isset($_POST['intKID'])){

           // $kitap_id=$_POST['intKID'];

            $kategori_adi=$_POST['txtKategoriAdi'];
            $kategori_id=$_POST['intKID'];


            $kategori_degistir_sql = "Update category SET CAT_NAME ='$kategori_adi' WHERE CAT_ID=$kategori_id";

        if ($conn->query($kategori_degistir_sql) === TRUE) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Category <strong>has been successfully saved</strong>...!";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Error occured during <strong> category editing:</strong>" . $conn->error;
            echo "</div>";
        }


    }
/*****************************************/

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