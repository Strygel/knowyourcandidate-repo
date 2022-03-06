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
    include 'db_connect.php';
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

    if ($sql) {
        $query = mysqli_query(candidates_db(), $sql);
        $query = mysqli_fetch_all($query);
        
        foreach ($query as $data)
        {
?>  
            <div class="row py-3 justify-content-center" style="background-color: #e0eedd;">
                <div class="col-lg-3">
                    <img src='<?= $data[3] ?>' class='candidate_picture'>
                </div>
                <div class="information col-lg-7 p-3">
                    <p class="title category">PERSONAL INFORMATION</p><hr class="info_sep">
                    <p class="candidate_name"><span class="category">NAME: </span><span class="data"><?= $data[1] ?></span></p>
                    <p class="partylist"><span class="category">PARTYLIST: </span><span class="data"><?= $data[2] ?></span></p>
                    <p class="information"><span class="category">NICKNAME: </span><span class="data"><?= $data[4] ?></span></p>
                    <p class="information"><span class="category">AGE: </span><span class="data"><?= $data[5] ?></span></p>
                    <p class="information"><span class="category">BIRTHDATE: </span><span class="data"><?= $data[6] ?></span></p>
                    <p class="information"><span class="category">HOMETOWN: </span><span class="data"><?= $data[7] ?></span></p>
                    <p class="title category">EDUCATIONAL BACKGROUND</p><hr class="info_sep">
                    <p class="category">HONORARY DEGREE:</p>
                    <ul class="information">
<?php 
            $list = explode("|", $data[8]);
            foreach ($list as $bullet) {
?>
                        <li class="bullet data"><?= $bullet ?></li>
<?php
            }
?>
                    </ul>
                    <p class="information"><span class="category">TERTIARY: </span><span class="data"><?= $data[9] ?></span></p>
                    <p class="paragraph"><span class="category">POLITICAL BACKGROUND: </span><span class="data"><?= $data[10] ?></span></p> 
<?php
            if ($table == "pres_candidates" || $table == "vcpres_candidates") {
?>
                    <p class="stance"><span class="category">DIVORCE: </span><span class="data"><?= $data[11] ?></span></p>
                    <p class="stance"><span class="category">DEATH PENALTY: </span><span class="data"><?= $data[12] ?></span></p>
                    <p class="stance"><span class="category">SAME SEX MARRIAGE: </span><span class="data"><?= $data[13] ?></span></p>

<?php
            }
            // Note: You can comment out this section if you don't want to display it onscreen the specific regions and cities of every mayors and governors 
            elseif ($table == "governor_candidates" || $table == "mayor_candidates") {
?>
                    <!-- <p class="location"><span class="category">REGION: </span><span class="data"><?= $data[11] ?></span></p>
                    <p class="location"><span class="category">PROVINCE: </span><span class="data"><?= $data[12] ?></span></p> -->
<?php
                if (array_key_exists(13, $data)) {
?>
                    <!-- <p class="location"><span class="category">CITY OR MUNICIPALITY: </span><span class="data"><?= $data[13] ?></span></p> -->
<?php
                }
            }
?>
                </div>
            </div>
<?php
        }
    }
    else {
?>
        <div class='columns'>
            <h2> Database Empty </h2>
        </div>
<?php
    }
    mysqli_close(candidates_db());
?>

