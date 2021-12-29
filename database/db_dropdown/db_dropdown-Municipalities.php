<?php
    include '../db_connect.php';
    philippines_addr();
    
    $province = $_POST['province'];

    $sql = "SELECT provCode FROM refprovince WHERE provDesc='$province'";
    if ($sql) {
        $provCode = mysqli_query(philippines_addr(), $sql);
        $provCode = mysqli_fetch_all($provCode);
        $provCode = $provCode[0][0];
    
        $sql = "SELECT citymunDesc FROM refcitymun WHERE provCode='$provCode'";
        if ($sql) {
            $query = mysqli_query(philippines_addr(), $sql);
            $query = mysqli_fetch_all($query);
        
            foreach ($query as $options) {
?>
                <option value="<?= $options[0] ?>"> <?= $options[0] ?> </option>
<?php
            }
        }
        else {
            echo "Database Empty";
        }

    }
    else {
        echo "Database Empty";
    }

    mysqli_close(philippines_addr());
?>