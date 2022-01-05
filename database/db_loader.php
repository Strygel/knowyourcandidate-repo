<?php
    // Call " include 'this php directory'; " and the "candidate table" for $table if you want to place it inside your code. 
    // There is already some classes provided in this html element and it can already be accessed by your implemented .css to your php/html file

    include 'db_connect.php';
    candidates_db();

    $selections = array();
    // Use the variables here that was placed inside the $_POST 
    $selections[0] = isset($_POST['table_selected']);
    $selections[1] = isset($_POST['regions']);
    $selections[2] = isset($_POST['provinces']);
    $selections[3] = isset($_POST['city_or_municipalities']);

    switch ($selections) {
        case ($selections[0] && $selections[1] && $selections[2] && $selections[3]): // For mayor_candidates database
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];
            $provinces = $_POST['provinces'];
            $city_or_municipalities = $_POST['city_or_municipalities'];

            $sql = "SELECT * from $table WHERE regions='$regions' AND provinces='$provinces' AND city_or_municipalities='$city_or_municipalities'";
        break;

        case ($selections[0] && $selections[1] && $selections[2]): // For governor_candidates database
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];
            $provinces = $_POST['provinces'];

            $sql = "SELECT * from $table WHERE regions='$regions' AND provinces='$provinces'";
        break;

        case ($selections[0] && $selections[1]):
            $table = $_POST['table_selected'];
            $regions = $_POST['regions'];

            $sql = "SELECT * from $table WHERE regions='$regions'";
        break;

        case ($selections[0]): // For pres_candidates and vcpres_candidates database
            $table = $_POST['table_selected'];
            $sql = "SELECT * from $table";
        break;
    }

    if ($sql) {
        $query = mysqli_query(candidates_db(), $sql);
        $query = mysqli_fetch_all($query);
        
        foreach ($query as $rows)
        {
?>  
            <div class='cells'>
                <div class='candidate_card'>
                    <p class="candidate_name"> Name:                  <?= $rows[1] ?>  </p>
                    <p class="information">    Nickname:              <?= $rows[3] ?>  </p>
                    <p class="information">    Age:                   <?= $rows[4] ?>  </p>
                    <p class="information">    Birthdate:             <?= $rows[5] ?>  </p>
                    <p class="information">    Hometown:              <?= $rows[6] ?>  </p>
                    <p class="information">    Honorary Degree:       <?= $rows[7] ?>  </p>
                    <p class="information">    Tertiary:              <?= $rows[8] ?>  </p>
                    <p class="information">    Political Background:  <?= $rows[9] ?>  </p> 
                    <p class="stance">         Divorce:               <?= $rows[10] ?> </p>
                    <p class="stance">         Death Penalty:         <?= $rows[11] ?> </p>
                    <p class="stance">         Same Sex Marriage:     <?= $rows[12] ?> </p>
<?php
            if (array_key_exists(13, $rows)) {
?>
                    <p class="location">       Region:               <?= $rows[13] ?> </p>
<?php
            }
            if (array_key_exists(14, $rows)) {
?>
                    <p class="location">       Province:            <?= $rows[14] ?> </p>
<?php
            }
            if (array_key_exists(15, $rows)) {
?>
                    <p class="location">       City or Municipality: <?= $rows[15] ?> </p>
<?php
            }
?>
                    <img src='<?= $rows[2] ?>' width='100' height='100'>
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