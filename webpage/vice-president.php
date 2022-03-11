<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="images/jade-dragon-logo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Know Your Candidate - Vice Presidents</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS Style -->
	<!-- <link rel='stylesheet' type='text/css' href='../css/__webpage-styling.css'>
	<link rel='stylesheet' type='text/css' href='../css/__dropdown-menu.css'>
	<link rel='stylesheet' type='text/css' href='../css/__tooltip.css'>
	<link rel='stylesheet' type='text/css' href='../css/__textStyling.css'>
	<link rel='stylesheet' type='text/css' href='../css/__infoPopup.css'> -->
	<link rel='stylesheet' type='text/css' href='../css/main-design.css'>
	<link rel='stylesheet' type='text/css' href='../css/candidate_info-design.css'>
	<link rel='stylesheet' type='text/css' href='../css/pres_vcpres_design.css'>
</head>
<!--navbar-->
<body>
	<!-- Header-->
	<header id="header_UI">
		<!-- Codes for Navigation Bar located in snippets/header.html -->
	</header>
	<br><br><br>

<!-------------------------------------------------------------------------------------------------------------------------------->
	<h1 id="title"> Vice Presidential Candidates</h1>
	<br>

	<div class = "container-fluid" id="cand_selector">
		<!-- Code is at ../snippets/candidate_block.php -->
	</div>
	
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
		var id= "<?= $id ?>";
		var candidate = "<?= $array_id[0] ?>";
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="../js/vice-president-scripts.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<!-- <footer>
<br>
	<h2 class = "forFooter"><img src = "jade-dragon-logo.png">Jade Dragons</h2>
	<br><br><br>
</footer> -->
</html>

<!-- 
<div class = "vice_presidentials-img"> 
	<ul>

		<li> <figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_atienza.png" alt="VP1"
				style = width:150px;
				height:100px;>
			</a><figcaption class="subheadingTextSize subheadingTextHome">Lito Atienza</figcaption>
		</figure> </li> 

		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_bello.png" alt="VP2"
				style = width:150px;
				height:160px;>
			</a> <figcaption class="subheadingTextSize subheadingTextHome">Walden Bello</figcaption>
		</figure></li>

		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_david.png" alt="VP3"
				style = width:150px;
				height:160px;>
			</a> <figcaption class="subheadingTextSize subheadingTextHome">Rizalito David</figcaption>
		</figure></li>

		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_duterte.png" alt="VP4"
				style = width:150px;
				height:100px;>
			</a> <figcaption class="subheadingTextSize subheadingTextHome">Sara Duterte</figcaption>
		</figure></li>

		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_lopez.png" alt="VP5"
				style = width:150px;
				height:100px;>
			</a><figcaption class="subheadingTextSize subheadingTextHome">Manny Lopez</figcaption>
		</figure></li>

	<div class="vpres-row">	
		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_ong.png" alt="VP6"
				style = width:150px;
				height:100px;>
			</a><figcaption class="subheadingTextSize subheadingTextHome">Doc Willie Ong</figcaption>
		</figure></li>

		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_pangilinan.png" alt="VP7"
				style = width:150px;
				height:100px;>
			</a><figcaption class="subheadingTextSize subheadingTextHome">Francis Nepomuceno Pangilinan</figcaption>
		</figure></li>

		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_serapio.png" alt="VP8"
				style = width:160px;
				height:100px;>
			</a><figcaption class="subheadingTextSize subheadingTextHome">Carlos Gelacio Serapio</figcaption>
		</figure></li>

		<li><figure>
			<a href="samplepage.html"> <img src = "vice_presidents/vp_sotto.png" alt="VP9"
				style = width:160px;
				height:100px;>
			</a><figcaption class="subheadingTextSize subheadingTextHome">Vicente Castelo Sotto III</figcaption>
		</figure></li>
	</div>
	</ul>
</div> -->