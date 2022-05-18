<?php
include 'top.php';

if (isset($_SESSION['login_user'])) {

    $conn = new mysqli("localhost", "root", "root", "turbo_cars");
    //$conn->query("SET NAMES UTF8");

    if(isset($_GET['kitap_id'])){
        $kitap_id = $_GET['kitap_id'];
        $kitap_duzenle_sql="SELECT * FROM cars WHERE CAR_ID=$kitap_id";
        $kitap = $conn->query($kitap_duzenle_sql);

        while($kitap_bilgi = $kitap->fetch_assoc()) {
            $kadi=$kitap_bilgi['CAR_NAME'];
            $turid=$kitap_bilgi['CAT_ID'];
            $ozet=stripslashes($kitap_bilgi['DESCRIPTION']);
            $yadi=$kitap_bilgi['MODEL_NAME'];
            $isbn= $kitap_bilgi['YEAR'];
            $fiyat=$kitap_bilgi['PRICE'];
            $bsayisi=$kitap_bilgi['ENGINE_LT'];
            $ysayisi=$kitap_bilgi['REVIEW'];
            $kevi=$kitap_bilgi['SELLER'];
            $foto=$kitap_bilgi['IMAGE'];
        }
    echo "<h4>Edit Car Details</h4>";
    echo "<form action='kitap_degistir.php' method='POST'>";
    echo "<input type='hidden' name='intKID' value='$kitap_id'>";
    echo "<div class='form-group'>";
    echo "<label for='kadi'>Car Manufacturer Name:</label>
    <input type='text'  class='form-control' placeholder='Enter car manufacturer' id='kadi' name='txtKAdi' value='$kadi'><br />";

    echo "<label for='kategori'>Category: </label>
        <select class='form-control'  id='kategori' name='slKategori'>\n";
        $kategoriler = $conn->query("SELECT * FROM category WHERE IS_DELETED <> 1");
        while($kategori = $kategoriler->fetch_assoc())
        {
            if ($turid == $kategori['CAT_ID'])
            {
                $selected = "selected='selected'";
            }
            else
            {
                $selected = '';
            }
            echo('<option value='.$kategori['CAT_ID'].' '.$selected.'>'.$kategori['CAT_NAME'].'</option>\n');
        }

    echo "</select><br />\n";

    echo "<label for='ozet'>Car Description:</label>
            <textarea rows=5  class='form-control' placeholder='Enter a short description' id='ozet' name='txtOzet'>$ozet</textarea><br />";
    echo "<label for='yadi'>Car Model Name:</label>
            <input type='text'  class='form-control' placeholder='Enter a model ' id='yadi' name='txtYAdi' value='$yadi'><br />";
    echo "<label for='isbn'>Year:</label>
            <input type='text'  class='form-control' placeholder='Year' id='isbn' name='txtISBN' value='$isbn'><br />";
    echo "<label for='fiyat'>Price:</label>
            <input type='text'  class='form-control' placeholder='Enter a car price' id='fiyat' name='txtFiyat' value='$fiyat'><br />";
    echo "<label for='kevi'>Seller Name:</label>
            <input type='text'  class='form-control' placeholder='Enter a seller name' id='kevi' name='txtKEvi' value='$kevi'><br />";
    echo "<label for='bsayisi'>Engine Cubic Inches (L):</label>
            <input type='text'  class='form-control' placeholder='Enter engine L' id='bsayisi' name='txtBSayisi' value='$bsayisi'><br />";
    echo "<label for='ysayisi'>Review:</label>
            <input type='text'  class='form-control' placeholder='Enter reviews' id='ysayisi' name='txtYSayisi' value='$ysayisi'><br />";
    echo "<div id='upload_button'>
            <label for='foto' class='custom-file-upload'><i class='fa fa-cloud-upload'></i> Image</label>
            <input id='foto' name='flKapak_Foto' type='file' style='display:none;'>
            </div>";
    echo "</div>";
    echo "<input type='submit' value='Save'>";
    echo "</form><br /><br />";
    }

    if(isset($_POST['intKID'])){

            $kitap_id=$_POST['intKID'];

            $kadi=$_POST['txtKAdi'];
            $kategori_id=$_POST['slKategori'];
            $ozet=addslashes($_POST['txtOzet']);
            $yadi=$_POST['txtYAdi'];
            $isbn= $_POST['txtISBN'];
            $fiyat=$_POST['txtFiyat'];
            $kevi=$_POST['txtKEvi'];
            $bsayisi=$_POST['txtBSayisi'];
            $ysayisi=$_POST['txtYSayisi'];
            $foto=$_POST['flKapak_Foto'];



        if ($foto != NULL){
            $kitap_degistir_sql = "Update cars SET CAR_NAME ='$kadi', CAT_ID='$kategori_id' , DESCRIPTION='$ozet',MODEL_NAME ='$yadi', YEAR='$isbn' ,  PRICE='$fiyat', SELLER='$kevi', ENGINE_LT='$bsayisi',  REVIEW='$ysayisi', IMAGE='$foto' WHERE CAR_ID=$kitap_id";
        }else{
            $kitap_degistir_sql = "Update cars SET CAR_NAME ='$kadi', CAT_ID='$kategori_id' , DESCRIPTION='$ozet',MODEL_NAME ='$yadi', YEAR='$isbn' ,  PRICE='$fiyat', SELLER='$kevi', ENGINE_LT='$bsayisi',  REVIEW='$ysayisi' WHERE CAR_ID=$kitap_id";
        }

        if ($conn->query($kitap_degistir_sql) === TRUE) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Car <strong>has successfully been edited</strong>...!";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "ERROR occured during <strong> car edit:</strong>" . $conn->error;
            echo "</div>";
        }


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

else{
    echo "<script language='javascript' type='text/javascript'> location.href='login.php' </script>";
}


		  
include 'bottom.php';
?>