<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="tr>

  <head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Turbo Cars</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/glyphicons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	

<style>	
#upload_button {
  display: inline-block;
}
#upload_button input[type=file] {
  display:none;
}
th{
	padding:5px;
}
form{
    padding: 10px;
    background-color: #e8e8e8;

}
.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}

</style>
  </head>

  <body>
      <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home	
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
			
 <?php if(isset($_SESSION['login_user'])) { ?>			
			<li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
 <?php }else{ ?>
	 
	 		<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
 <?php }	 ?>
 
 
            <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<?php

$conn_top = new mysqli("localhost", "root", "root", "turbo_cars");
//$conn_top->query("SET NAMES UTF8");

$kategoriler_sql= "SELECT * FROM category WHERE IS_DELETED <> 1";
$kategoriler = $conn_top->query($kategoriler_sql);
$menu ="";
$menu .="<div class='list-group'>
       <li href='' class='list-group-item active'>Cars</li>\n";
$menu .="\t\t<a href='index.php' class='list-group-item'>All cars</a>\n";

// $menu = $menu . "<a href='index.php' class='list-group-item'>Tüm Kitaplar</a>\n";

if ($kategoriler->num_rows > 0){
	while($kategori = $kategoriler->fetch_assoc()) {
		$menu .= "\t\t<a href='index.php?category_id={$kategori['CAT_ID']}' class='list-group-item'>{$kategori['CAT_NAME']}</a>\n";
		          //<a href='index.php?kategori_id=1'                          class='list-group-item'>Korku</a>
	}
}
$menu .= "</div>";

?>
    <!-- Page Content -->
    <div class="container">
	      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Turbo Cars</h1>
          <div class="list-group">
            <?php
			echo $menu;			
			?>
          </div>
		  <p></p>
 <?php if(isset($_SESSION['login_user'])) { ?>
		 <div class="list-group">
             <li href="" class="list-group-item active">Edit</li>
            <a href="kitap_islemleri.php" class="list-group-item">Edit Cars</a>
            <a href="kategori_islemler.php" class="list-group-item">Edit Category</a>
         </div>
<?php } ?>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
              
            </ol>
            <div class="carousel-inner" role="listbox">
            
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/top6.jpg" alt="Sixth">
              </div>

              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/top5.jpg" alt="Fifth">
              </div>

			        <div class="carousel-item">
                <img class="d-block img-fluid" src="images/top3.jpg" alt="First slide 1">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/top4.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/top2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/top1.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>