<?php
	require("config.php");

	$database = db();

	$products = $database->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 3');

	try{
		$products->execute([]);
		$products->setFetchMode(PDO::FETCH_ASSOC);
		$products = $products->fetchAll();

	} catch(PDOException $e){
		dd($e->getMessage());
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta name="description" content="Jacksepticeye merch!">
  	<meta name="keywords" content="Jacksepticeye, Merch, Store">
  	<meta name="author" content="Amer Zahirovic">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="styling/style.css">
	<title>Jacksepticeye ~ merch</title>

	<!-- Bootstrap stylesheet-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<!-- Costum stylesheet -->
	<link rel="stylesheet" href="style.css">
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
				<a href="product/<?php echo $product['slug'] ?>"><img class="img" src="img/<?php echo $product['image']; ?>"></a>
				<p><?php echo $product['description']; ?></p>
				<p> €<?php echo $product['price']; ?></p>
				<button class="btn btn-success">Add product</button>
			</div>
			<?php } ?>

<a href="product/{slug}"></a>
		</div>
	</div>

	<div id="cart" class="row ">
		<div class="col-lg-1">
			<h1>cart</h1>
		</div>
	</div>
	<div id="advertisment" class="row ">
		<div class="col-lg-1">
			<div id="butCanYouDoThis" >
				<img onmousedown="playsound()" src="img/butcanyoudothis.gif" width="300" height="200">
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function playsound(){
			var PewDiePieSoundByte = new Audio('sound/But Can You Do This.mp3');
			PewDiePieSoundByte.play();
		}
	</script>

	<!-- Bootstrap JS BEGIN -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<!-- Bootstrap JS END -->
</body>
</html>