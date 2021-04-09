<?php

// $title contains the title for the page
$title = "overzicht";

require_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overview</title>
</head>
<body>

<?php
    include 'database.php';
    $db = new database();
    $winkels = $db->select("SELECT * FROM winkel", []);
    // print_r($winkels);

    $columns = array_keys($winkels[0]);
    $row_data = array_values($winkels);
?>

<table class="table table-hover">
    <tr>
        <?php

            foreach($columns as $column){ 
                echo "<th><strong> $column </strong></th>";
            }

        ?>
    </tr>

    <?php
        foreach($row_data as $row){ ?>
        <tr>
        <?php
        foreach($row as $data){
            echo "<td> $data </td>";
        }

        }
?>
    </tr>

</table>


    
</body>
</html>

<?php
require_once('footer.php');
?>