<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="images/jade-dragon-logo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- <link rel='stylesheet' type='text/css' href='../css/__webpage-styling.css'>
	<link rel='stylesheet' type='text/css' href='../css/__dropdown-menu.css'>
	<link rel='stylesheet' type='text/css' href='../css/__tooltip.css'>
	<link rel='stylesheet' type='text/css' href='../css/__textStyling.css'>
	<link rel='stylesheet' type='text/css' href='../css/__infoPopup.css'> -->

	<!-- CSS Style -->
	<link rel='stylesheet' type='text/css' href='../css/main-design.css'>
	<link rel='stylesheet' type='text/css' href='../css/candidate_info-design.css'>
	<link rel='stylesheet' type='text/css' href='../css/pres_vcpres_design.css'>
</head>

<body>
	<!-- Header-->
	<header id="header_UI">
		<!-- Codes for Navigation Bar located in ../snippets/header.html -->
	</header>	
	<br><br><br>
	
<!----------------------------------------------------------------------------------------------------------------------------------->
	<h1 id="title">Presidential Candidates</h1>
	<br>

	<div class = "container-fluid" id="cand_selector">
		<!-- Code is at ../snippets/candidate_block.php -->
	</div>

<!------------------------data input here------------------------------------not edited yet------------------------------------------------------------------------------------->
	
	<div class="container-fluid" id="cand_content">
		<!-- Code is at ../snippets/candidates_info.html -->
	</div>
	
	<footer>
		<!--p class = "forFooter"></p-->
		<a href ="about-us.html" class = "forFooter"><img src = "images/jade-dragon-logo.png">Jade Dragon</a2>
	</footer>

	<script>
		<?php
			include_once '../snippets/url_id_decoder.php';
		?>
		var id= "<?= $id ?>";
		var candidate = "<?= $array_id[0] ?>";
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="../js/president-scripts.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>