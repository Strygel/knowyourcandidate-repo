<?php
    include '../db_connect.php';
    philippines_addr();

    $region = $_POST['region'];

    $sql = "SELECT regCode FROM refregion WHERE regDesc='$region'";
    if ($sql) {
        $regCode = mysqli_query(philippines_addr(), $sql);
        $regCode = mysqli_fetch_all($regCode);
        $regCode = $regCode[0][0];

        $sql = "SELECT provDesc FROM refprovince WHERE regCode='$regCode'";
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

