<?php
    include '../db_connect.php';
    philippines_addr();

    $sql = "SELECT regDesc FROM refregion";
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

    mysqli_close(philippines_addr());
?>