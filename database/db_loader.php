<?php
    // Call " include 'this php directory'; " and the "candidate table" for $table if you want to place it inside your code. 
    // There is already some classes provided in this html element and it can already be accessed by your implemented .css to your php/html file

    // This is not yet supported for governor and mayors database.

    include 'db_connect.php';
    candidates_db();

    $table = $_POST['table_selected'];
    $sql = "SELECT * from $table";

    if ($sql) {
        $query = mysqli_query(candidates_db(), $sql);
        $query = mysqli_fetch_all($query);
        
        foreach ($query as $rows)
        {
            $imageURL = "../pictures/" . $rows[2];
?>  
            <div class='columns'>
                <div class='cells'>
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
                    <p class="location">       Provinces:            <?= $rows[14] ?> </p>
<?php
            }
            if (array_key_exists(15, $rows)) {
?>
                    <p class="location">       City or Municipality: <?= $rows[15] ?> </p>
<?php
            }
?>
                    <img src='<?= $imageURL ?>' width='100' height='100'>
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