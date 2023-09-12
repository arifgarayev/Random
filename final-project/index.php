<?php
include 'top.php';



$conn = new mysqli("localhost", "root", "root", "turbo_cars");


//$conn->query("SET NAMES UTF8");



// if (!$conn -> query("SELECT CAR_ID, CAR_NAME, MODEL_NAME, REVIEW, SELLER, PRICE, IMAGE, LEFT(DESCRIPTION, 100) AS DESCRIPTION FROM cars where CAT_ID=1")) {
// 	echo("Error description: " . $conn -> error);
//   }






if (isset($_GET['category_id']))
{
	$kategori=$_GET['category_id'];
	$kitaplar_sql="SELECT CAR_ID, CAR_NAME, MODEL_NAME, REVIEW, SELLER, PRICE, IMAGE, LEFT(DESCRIPTION, 100) AS DESCRIPTION FROM cars where CAT_ID=$kategori && IS_DELETED <> 1";
}
else
{
	$kitaplar_sql="SELECT CAR_ID, CAR_NAME, MODEL_NAME, REVIEW, SELLER, PRICE, IMAGE, LEFT(DESCRIPTION, 100) AS DESCRIPTION FROM cars where IS_DELETED <> 1";
}



$kitaplar = $conn->query($kitaplar_sql);

if ($kitaplar->num_rows > 0){
echo  "<div class='row'>";
	
	while($kitap = $kitaplar->fetch_assoc()) {
		echo" <div class='col-lg-4 col-md-6 mb-4'>
					  <div class='card h-100'>
						<a href='detay.php?car_id={$kitap['CAR_ID']}'><img class='card-img-top' src='images/{$kitap['IMAGE']}' alt=''></a>
						<div class='card-body'>
						  <h4 class='card-title'>
							<a href='detay.php?car_id={$kitap['CAR_ID']}'>{$kitap['CAR_NAME']}</a>
						  </h4>
						  <h6>
							{$kitap['MODEL_NAME']}<br />Seller Name: {$kitap['SELLER']}
						  </h6>
						  <h5>{$kitap['PRICE']}&#36;</h5>
						  <p class='card-text'>{$kitap['DESCRIPTION']} ... <a href='detay.php?car_id={$kitap['CAR_ID']}'>Read more...</a></p>
						</div>
						<div class='card-footer'>
						<small class='text-muted'>"; 
						  for ($i=1;$i<=5;$i++)
						  {
							   if ($i <= $kitap['REVIEW']){
								 echo "&#9733;";
							   }
							   else
							   {
								 echo "&#9734;";  
							   }
						  }

		echo "			</small>
						</div>
					  </div>
					</div>";
	}
           
 echo  "</div>
       <!-- /.row -->";
}		  
		  
include 'bottom.php';
?>