<?php
    // This code is similar to db_loader.php but this will only load the database once which is currently needed for the website.

    // Call " include 'this php directory'; " and the "candidate table" for $selections if you want to place it inside your code. 
    // Example (for jquery): 
    //
    // $("#id").load("this php directory", {
    //      table_selected : "mayor_candidates",
    //      regions : "REGION I (ILOCOS REGION)",
    //      provinces : "ILOCOS NORTE",
    //      city_or_municipalities : "BACARRA"
    // }) 
    //
    // Example (for php):
    //
    // $_POST['table_selected'] = 'pres_candidates';
    // $_POST['regions'] = 'REGION I (ILOCOS REGION)';
    // $_POST['provinces'] = 'ILOCOS NORTE';
    // $_POST['city_or_municipalities'] = 'BACARRA';
    // include 'this php directory';
    //
    // Meaning the #id will load the database from 'mayor_candidates' -> 'REGION I (ILOCOS REGION)' -> 'ILOCOS NORTE' -> 'BACARRA'
    //
    // For the keywords of locations, refer to the 'philippines_addr.sql' database or just look my dropdowns on the 'db_displayUI.php' since I already loaded them all there
    // There is already some classes provided in this html element and it can already be designed/accessed by your implemented .css to your php/html file
    
    // Call the db_connect.php into the external file instead for this file 
    include '../database/db_connect.php';
    candidates_db();

    $selections = array();

    // Use the variables here that was placed inside the $_POST 
    $selections[0] = isset($_POST['table_selected']) && !empty($_POST['table_selected']);
    $selections[1] = isset($_POST['regions']) && !empty($_POST['regions']);
    $selections[2] = isset($_POST['provinces']) && !empty($_POST['provinces']);
    $selections[3] = isset($_POST['city_or_municipalities']) && !empty($_POST['city_or_municipalities']);
    $selections[4] = isset($_POST['candidate']) && !empty($_POST['candidate']);

    switch ($selections) {
        case ($selections[0] && $selections[1] && $selections[2] && $selections[3] && $selections[4]): // For mayor_candidates database
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];
            $provinces = $_POST['provinces'];
            $city_or_municipalities = $_POST['city_or_municipalities'];
            $candidate = $_POST['candidate'];

            $sql = "SELECT * from $table WHERE regions='$regions' AND provinces='$provinces' AND city_or_municipalities='$city_or_municipalities' 
            AND candidate='$candidate'";
        break;

        case ($selections[0] && $selections[1] && $selections[2] && $selections[4]): // For governor_candidates database
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];
            $provinces = $_POST['provinces'];
            $candidate = $_POST['candidate'];

            $sql = "SELECT * from $table WHERE regions='$regions' AND provinces='$provinces' AND candidate='$candidate'";
        break;

        case ($selections[0] && $selections[4]): // For pres_candidates and vcpres_candidates database
            $table = $_POST['table_selected'];
            $candidate = $_POST['candidate'];

            $sql = "SELECT * from $table WHERE candidate='$candidate'";
        break;
    }

    if (isset($sql)) {
        $query = mysqli_query(candidates_db(), $sql);
        $query = mysqli_fetch_all($query);
        
        foreach ($query as $data)
        {
?>

<div class="container rounded bg-white mt-5 mb-5 border">
    <div class="row align-content-center">
        <div class="col-md-5 border-right">
            <div class="d-flex flex-column align-items-center p-3 py-3"><img class="me-10 mt-5" width="300px" src="<?= $data[4] ?>"></div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <!--div class="d-flex justify-content-between align-items-center mb-3">
                    h4 class="text-right">Profile Settings</h4>
                </div-->
                <div class="row mt-2">
					<div class="container rounded mt-0 mb-0">
						<h class="candidate-name"><?= $data[1] ?></h>
					</div> 
                </div>
			</div>
				
			<div class="container mt-5 border">
				<div class="container mt-2 mb-2">
					<div class="row mt-3">
						<div class="col-md-6"><label class="labels">Partylist:</label><input class="col-md-7 ms-1" type="text" readonly class="form-control-plaintext" id="partylist" value="<?= $data[3] ?>"></div>
						<div class="col-md-6"><label class="labels">Nickname:</label><input class="col-md-7 ms-1" type="text" readonly class="form-control-plaintext" id="nickname" value="<?= $data[5] ?>"></div>
					</div>	

					<div class="row mt-4">
						<div class="col-md-6"><label class="labels">Sex:</label><input class="col-md-7 ms-1" type="text" readonly class="form-control-plaintext" id="sex" value="<?= $data[2] ?>"></div>
						<div class="col-md-6"><label class="labels">Age:</label><input class="col-md-7 ms-1" type="text" readonly class="form-control-plaintext" id="age" value="<?= $data[6] ?>"></div>
					</div>

					<div class="row mt-5">
						<div class="col-md-6"><label class="labels">Hometown:</label><input class="col-md-7 ms-1" type="text" readonly class="form-control-plaintext" id="hometown" value="<?= $data[8] ?>"></div>
					</div>
				</div>
				
				<div class="row mt-6">
					<div class="container mt-5 mb-2">
						<div class="col-xs-4">
							<label class="labels">Honorary Degree:</label>
							<ul class="list-group list-group-flush">
								<?php
									$list = explode("|", $data[9]);
									foreach ($list as $bullet) {
									?>
										<li class="list-group-item ms-2"><?= $bullet ?></li>	
									<?php
									}
								?>
							</ul>
						</div>	
					</div>
				</div>

				
				<div class="row mt-7">
					<div class="container mt-2 mb-2">
						<div class="col-md-6">
							<label class="labels">Tertiary:</label>
							<ul class="list-group list-group-flush">
								<?php
									$list = explode("|", $data[10]);
									foreach ($list as $bullet) {
									?>
										<li class="list-group-item ms-2"><?= $bullet ?></li>	
									<?php
									}
								?>
							</ul>
						</div>	
					</div>
				</div>

				<div class="row mt-8">
					<div class="container mt-2 mb-2">
						<div class="col-md-6">
							<label class="labels">Political Background:</label>
							<ul class="list-group list-group-flush">
								<?php
									$list = explode("|", $data[11]);
									foreach ($list as $bullet) {
									?>
										<li class="list-group-item ms-2"><?= $bullet ?></li>	
									<?php
									}
								?>
							</ul>
						</div>	
					</div>
				</div>
				
				<?php 
				if ($table == "pres_candidates" || $table == "vcpres_candidates") {
				?>
				<div class="row-mt-9">
					<div class="container mt-2 mb-2">
						<div class="col-md-6">
							<label class="labels">Political Stand on Issues</label>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><label class="pol_issue me-2">Divorce:</label><?= $data[12] ?></li>
								<li class="list-group-item"><label class="pol_issue me-2">Death Penalty:</label><?= $data[13] ?></li>
								<li class="list-group-item"><label class="pol_issue me-2">Same Sex Marriage:</label><?= $data[14] ?></li>
							</ul>
						</div>
					</div> 
				</div>
				<?php
				}
				?>

			</div>
		</div>
	</div>
</div>

<?php
        }
    }
    else {

    }
    mysqli_close(candidates_db());
?>

