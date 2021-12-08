<?php
    include 'database/db_connect.php';
                
    $sql = "SELECT * from candidate_pres";
    $imageURL = 'pictures/';

    if ($sql) {
        $query = mysqli_query($conn, $sql);
        $query = mysqli_fetch_all($query);
        
        foreach ($query as $rows)
        {
            $imageURL = 'pictures/' . $rows[2];

            echo "  <div class='columns'>
                        <div class='cells'>
                            <p>Name: $rows[1]</p>
                            <p>Credentials: $rows[3]</p>
                            <p>Biography: $rows[4]</p>
                            <p>Sources: $rows[5]</p>
                            <img src='$imageURL' width='100' height='100'>
                        </div>
                    </div>";
        }
    }
    else {
        echo "<h2>Database Empty</h2>";
    }


?>