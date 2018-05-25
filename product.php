<?php
	require 'config.php';
	$database = db();
	$array = $_GET;

	$imploded = implode('', $array);
	$products = $database->prepare('SELECT * FROM products WHERE slug = :slug');

	try{
		$products->execute(['slug'=>$imploded]);
		$products->setFetchMode(PDO::FETCH_ASSOC);
		$products = $products->fetchAll();

	} catch(PDOException $e){
		dd($e->getMessage());
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<!-- styling -->
 	<link rel="stylesheet" href="../productstyle.css">
 </head>
 <body>

	<div class="navigationMenu">
		<div class="brand">
			<a href="#"><p>Jacksepticeye Store</p></a>
		</div>
	</div>
	<br>

 	<div>
		<div id="container" class="row">
			<?php  foreach($products as $product){ ?>
			<div id="products" class="col-lg-2">
				<h2><?php echo $product['title']; ?></h2>
				<img class="img" src="../img/<?php echo $product['image']; ?> " width="200px">
				<p><?php echo $product['description']; ?></p>
				<p> €<?php echo $product['price']; ?></p>
				<button class="btn btn-success">Add product</button>
			</div>
			<?php } ?>
		</div>
	</div>


	<div id="cart" class="row ">
		<div class="col-lg-1">
			<h1>cart</h1>
		</div>
	</div>
 </body>
 </html>
