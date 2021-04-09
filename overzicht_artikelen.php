<?php
//index.php

// include the database class
include "database.php";
require_once('header.php');  

// start a new db connection
$db = new database();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>overzicht artikelen</title>
</head>
<body>

<?php
    $winkels = $db->select("SELECT * FROM artikel", []);
    // print_r($winkels);

    $columns = array_keys($winkels[0]);
    $row_data = array_values($winkels);
    
?>
<div class="container">
<button type="button" class="btn btn-primary btn-lg btn btn-light"><a href="medewerker.php">terug</a></button>
    <table class="table table-hover">
        <tr>
            <?php

                foreach($columns as $column){ 
                    echo "<th><strong> $column </strong></th>";
                }

            ?>
        </tr>

        <?php
            foreach($row_data as $rows){ ?>
            <tr>
            <?php
            foreach($rows as $data){
                echo "<td> $data </td>";
            }
            ?>
                <td>
                    <a type="button" class="btn btn-success" href="edit_artikel.php?artikel_artikelcode=<?php echo $rows['artikelcode']?>">Edit</a>
                </td>
                <td>
                    <a type="button" class="btn btn btn-danger" href="delete_artikel.php?artikel_artikelcode=<?php echo $rows['artikelcode']?>">Delete</a>
                </td>
            </tr>
     <?php } ?>
            </tr>

    </table>
</div>

    
</body>
</html>

<?php
require_once('footer.php');
?>
