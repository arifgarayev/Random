<?php
include 'top.php';

if (isset($_SESSION['login_user'])) {

    $conn = new mysqli("localhost", "root", "root", "turbo_cars");
    //$conn->query("SET NAMES UTF8");

    $kitaplar_sql="SELECT CAR_ID,CAR_NAME,MODEL_NAME,REVIEW,SELLER,PRICE,IMAGE,LEFT(DESCRIPTION,100) AS OZET_KISA FROM cars";
    $kitaplar = $conn->query($kitaplar_sql);

    echo "<h4>Add a New Car</h4>";
    echo "<form action='kitap_ekle.php' method='POST'>";
    echo "<div class='form-group'>";
    echo "<label for='kadi'>Car Manufacturer Name:</label>
          <input type='text'  class='form-control' placeholder='Enter a car manufacturer' id='kadi' name='txtKAdi'><br />";

    echo "<label for='kategori'>Category: </label><br />
         <select id='kategori' class='form-control' name='slKategori'>\n";
    $kategoriler = $conn->query("SELECT * FROM category WHERE IS_DELETED <> 1");
    echo "<option value=0 ></option>\n";
    while($kategori = $kategoriler->fetch_assoc())
    {
        echo "<option value={$kategori['CAT_ID']}>{$kategori['CAT_NAME']}</option>\n";
    }
    echo "</select><br />\n";

    echo "<label for='ozet'>Car Description:</label>
          <textarea rows=5  class='form-control' placeholder='Enter a short description' id='ozet' name='txtOzet'></textarea><br />";
    echo "<label for='yadi'>Car Model Name:</label>
          <input type='text'  class='form-control' placeholder='Enter a model ' id='yadi' name='txtYAdi'><br />";
    echo "<label for='isbn'>Year:</label>
          <input type='text'  class='form-control' placeholder='Year' id='isbn' name='txtISBN'><br />";
    echo "<label for='fiyat'>Price:</label>
          <input type='text'  class='form-control' placeholder='Enter a car price' id='fiyat' name='txtFiyat'><br />";
    echo "<label for='kevi'>Seller Name:</label>
          <input type='text'  class='form-control' placeholder='Enter a seller name' id='kevi' name='txtKEvi'><br />";
    echo "<label for='bsayisi'>Engine Cubic Inches (L):</label>
          <input type='text'  class='form-control' placeholder='Enter engine L' id='bsayisi' name='txtBSayisi'><br />";
    echo "<label for='ysayisi'>Review:</label>
          <input type='text'  class='form-control' placeholder='Enter reviews' id='ysayisi' name='txtYSayisi'><br />";
    echo "<div id='upload_button'>
            <label for='foto' class='custom-file-upload'><i class='fa fa-cloud-upload'></i> Image</label>
            <input id='foto' name='flKapak_Foto' type='file' style='display:none;'>
          </div>";
    echo "</div>";
    echo "<input type='submit' value='Save'>";
    echo "</form><br /><br />";



    if (isset($_POST['txtKAdi'])){


        $kadi=$_POST['txtKAdi'];
        $kategori_id=$_POST['slKategori'];
        $ozet=stripslashes($_POST['txtOzet']);
        $yadi=$_POST['txtYAdi'];
        $isbn=$_POST['txtISBN'];
        $fiyat=$_POST['txtFiyat'];
        $kevi=$_POST['txtKEvi'];
        $bsayisi=$_POST['txtBSayisi'];
        $ysayisi=$_POST['txtYSayisi'];
        $foto=$_POST['flKapak_Foto'];

        $kitap_bul_sql= "Select *  From cars Where MODEL_NAME='$yadi'";

        $bulundu = $conn->query($kitap_bul_sql);

        if($bulundu->num_rows == 0){
            $kitap_kaydet_sql = "INSERT INTO cars (CAR_NAME, CAT_ID, DESCRIPTION, MODEL_NAME, YEAR, PRICE, SELLER, ENGINE_LT,REVIEW, IMAGE, IS_DELETED)
    VALUES ( '$kadi',$kategori_id, '$ozet','$yadi', '$isbn', $fiyat,'$kevi',$bsayisi,$ysayisi,'$foto', 0)";

            //echo $kitap_kaydet_sql;

            $kaydet = $conn->query($kitap_kaydet_sql);
        }else{

            echo "<div class='alert alert-danger' role='alert'>
                <strong>Same car model</strong> is already exsiting. PLease enter another (non-existing) car model!
              </div>";
        }


        $kitaplar_sql="SELECT * FROM cars WHERE IS_DELETED <> 1";
        $kitaplar = $conn->query($kitaplar_sql);

        if ($kitaplar->num_rows > 0){
            echo "<div class='row'>\n
            <div class='col-lg-12 col-md-12 mb-12'>\n";
            echo "<h5>Cars on SALE</h5>\n";
            echo "<a href='kitap_ekle.php'>Add a new car <span class='glyphicon  glyphicon-plus-sign'></span></a>\n";
            echo "<table border=1>\n";
            echo "<tr>\n<th>Year</th><th>Manufacturer</th><th>Price</th><th>Image</th><th>Edit</th></tr>\n";
            while($kitap = $kitaplar->fetch_assoc()) {
                echo "<tr><td>{$kitap['YEAR']}</td>\n<td>{$kitap['CAR_NAME']}</td>\n<td>{$kitap['PRICE']}&#36;</td>\n<td><img width=30% height=30% src='images/{$kitap['IMAGE']}'/></td>\n<td> <a href='kitap_sil.php?kitap_id={$kitap['CAR_ID']}'><span class='glyphicon glyphicon-trash'></span></a> &nbsp; &nbsp;<a href='kitap_degistir.php?kitap_id={$kitap['CAR_ID']}'><span class='glyphicon  glyphicon-pencil'></span></a> </td>\n</tr>\n";
            }
            echo "</table>\n";
            echo "</div>\n";
            echo "</div>\n";
            echo "<p></p>\n";
        }

        $kitaplar_sql="SELECT * FROM cars WHERE IS_DELETED = 1";
        $kitaplar = $conn->query($kitaplar_sql);

        if ($kitaplar->num_rows > 0){
            echo "<div class='row'>\n
            <div class='col-lg-12 col-md-12 mb-12'>\n";
            echo "<h5>Deleted Cars</h5>\n";
            echo "<table class='table_list' border=1>\n";
            echo "<tr>\n<th>Year</th><th>Manufacturer</th><th>Price</th><th>Image</th><th>Edit</th></tr>\n";

            while($kitap = $kitaplar->fetch_assoc()) {
                echo "<tr>\n<td>{$kitap['YEAR']}</td>\n<td>{$kitap['CAR_NAME']}</td>\n<td>{$kitap['PRICE']}&#36;</td>\n<td><img width=30% height=30% src='images/{$kitap['IMAGE']}'/></td>\n<td><a href='kitap_sil.php?gerial_kitap_id={$kitap['CAR_ID']}'><span class='glyphicon glyphicon-refresh'></span> Back</a></td>\n</tr>\n";
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