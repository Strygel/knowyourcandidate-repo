<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="images/jade-dragon-logo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Know Your Candidate - Mayors</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS Style -->
	<!-- <link rel='stylesheet' type='text/css' href='../css/__webpage-styling.css'>
	<link rel='stylesheet' type='text/css' href='../css/__dropdown-menu.css'> -->
	<link rel='stylesheet' type='text/css' href='../css/main-design.css'>
	<link rel='stylesheet' type='text/css' href='../css/candidate_info-design.css'>
	<link rel='stylesheet' type='text/css' href='../css/gov_mayor_design.css'>
	
</head>

<body>
	<!-- Header-->
	
	<header id="header_UI">
		<!-- Codes for Navigation Bar located in snippets/header.html -->
	</header>
	
	<br><br><br>

<!--------------------------------------------------------------------------------------------->
	<h1 id="title">Mayor Candidates</h1>

	<div class="container-fluid px-0">
		<div class="row justify-content-center mb-lg-1 mb-sm-1 mb-5" style="height: 50px;">
			<!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-4">
				<select name="" id="regions" class="form-select">

				</select>
			</div> -->
			<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-sm-1 mb-1">
			<select name="" id="provinces" class="form-select">

			</select>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-12">
				<select name="" id="city_or_municipalities" class="form-select">

				</select>
			</div>
		</div>
		<div class="row m-0">
			<hr class="sep">
		</div>
		<div class="row justify-content-start" style="margin: unset">
			<div class="panel-1 col-lg-4 col-md-4 col-sm-12 col-12">
				<div id="map"></div>
			</div>
			<div class="panel-2 col-lg-8 col-md-8 col-sm-12 col-12"> <!--list of candidates here beside map-->
				<br>
				<div id="cand_panel">
				
				</div>
			</div>
		</div>
	</div>

<!---------------------------------------------------------------------------------------------->

	<div class="container-fluid px-0" id="cand_content">
			<!-- Code is at ../snippets/candidate_info.html -->
	</div>

	<footer id="footer_UI" class="container-fluid">
		<!-- Code is at ../snippets/footer.html -->
	</footer>

	<script>
		<?php
			include_once '../snippets/url_id_decoder.php';
		?>
		var id = "<?= $id ?>";
		
		var candidate = "<?= $array_id[0] ?>"
		var regions = "<?=  array_key_exists(1, $array_id) ? $array_id[1] : ""; ?>";
		var provinces = "<?= array_key_exists(2, $array_id) ? $array_id[2] : ""; ?>";
		var city_or_municipalities = "<?= array_key_exists(3, $array_id) ? $array_id[3] : ""?>";
	</script>

	<script type="text/javascript" src="../ph_map/mapdata.js"></script>
	<script type="text/javascript" src="../ph_map/countrymap.js"></script>

	<script src="../snippets/ph_map_functions.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="../js/mayor-scripts.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>