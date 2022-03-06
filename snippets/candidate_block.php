<!-- This code will load the candidates in a 'block selection' form which will only load the picture of candidate, its name and the partylist it belongs to. -->

<ul class="row nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
		<?php
            include '../snippets/url_id_encoder.php';
			include '../database/db_connect.php';
			candidates_db();

            // Use the variables here that was placed inside the $_POST 
            $selections[0] = isset($_POST['table_selected']) && !empty($_POST['table_selected']);
            $selections[1] = isset($_POST['regions']) && !empty($_POST['regions']);
            $selections[2] = isset($_POST['provinces']) && !empty($_POST['provinces']);
            $selections[3] = isset($_POST['city_or_municipalities']) && !empty($_POST['city_or_municipalities']);

            switch ($selections) {
                case ($selections[0] && $selections[1] && $selections[2] && $selections[3]): // For mayor_candidates database
                    $table = $_POST['table_selected'];
                    $regions = $_POST['regions'];
                    $provinces = $_POST['provinces'];
                    $city_or_municipalities = $_POST['city_or_municipalities'];
        
                    $sql = "SELECT DISTINCT candidate, picture_dir, partylist from $table WHERE regions='$regions' AND provinces='$provinces' AND city_or_municipalities='$city_or_municipalities' 
                    ORDER BY candidate ASC, regions ASC, provinces ASC, city_or_municipalities ASC";
                break;
        
                case ($selections[0] && $selections[1] && $selections[2]): // For governor_candidates database
                    $table = $_POST['table_selected'];
                    $regions = $_POST['regions'];
                    $provinces = $_POST['provinces'];
        
                    $sql = "SELECT DISTINCT candidate, picture_dir, partylist from $table  WHERE regions='$regions' AND provinces='$provinces' ORDER BY candidate ASC, provinces ASC, regions ASC";
                break;
        
                case ($selections[0] && $selections[1]):
                    $table = $_POST['table_selected'];
                    $regions = $_POST['regions'];
        
                    $sql = "SELECT DISTINCT candidate, picture_dir, partylist from $table WHERE regions='$regions' ORDER BY candidate ASC, regions ASC";
                break;
        
                case ($selections[0]): // For pres_candidates and vcpres_candidates database
                    $table = $_POST['table_selected'];
                    $sql = "SELECT DISTINCT candidate, picture_dir, partylist from $table ORDER BY candidate ASC";
                break;
            }
            
            if ($sql) {
                $id_button = array();
                $candidate_name = array();
            
                $query = mysqli_query(candidates_db(), $sql);
                $query = mysqli_fetch_all($query);
    
                foreach ($query as $data) 
                {
                    $a = encode_ID(
                        $table, 
                        $data[0], 
                        isset($_POST['regions']) ?  $_POST['regions'] : "",
                        isset($_POST['provinces']) ? $_POST['provinces'] : "",
                        isset($_POST['city_or_municipalities']) ? $_POST['city_or_municipalities'] : ""
                    );
                    array_push($id_button, $a);
                    array_push($candidate_name, $data[0]);
		?>
				<li class="nav-item col-lg-3 col-sm-6 " role="presentation">
					<button value="<?= $data[0] ?>" class="cand_selector nav-link mx-auto" id="<?= $a ?>" data-bs-toggle="pill" 
					type="button" role="tab" aria-controls="<?= $a ?>" aria-selected="true" onclick="window.location.href = '#cand_content'; window.history.pushState('','','?id=<?= $a ?>')">
						<img src="<?= $data[1] ?>" alt="" width="150px" height="150px">
						<p style="margin-bottom: 0px; font-weight: bold;"><?= $data[0] ?></p>
                        <p style="font-style: italic;"><?= $data[2] ?></p>
					</button>
				</li>
		<?php   
			    }
            }
            mysqli_close(candidates_db());
		?>
</ul>