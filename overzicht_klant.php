<?php
//index.php

// start the session
session_start();
$_SESSION['uname'];

// include the database class
include "database.php";

require_once('header.php');
// this inserts the header and the navbar

// $title contains the title for the page
$title = "Login";

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Medewerker</title>
</head>
<body>

<?php
    $db = new database();
    $winkels = $db->select("SELECT * FROM klant WHERE klantcode = :code;", ['code'=>$_SESSION['klantcode']]);
    // print_r($winkels);

    $columns = array_keys($winkels[0]);
    $row_data = array_values($winkels);
?>
<div class="">
<button type="button" class="btn btn-primary btn-lg btn btn-light"><a href="klant.php">Terug</a></button>
    <table class="table table-hover">
        <tr>
            <?php

                foreach($columns as $column){ 
                    echo "<th><strong> $column </strong></th>";
                }

            ?>
            <th colspan="2">action</th>
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
                    <a type="button" class="btn btn-success" href="edit_klant.php?klant_klantcode=<?php echo $rows['klantcode']?>">Edit</a>
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