<?php
// this inserts the header
    require_once('header.php');

   // include the database class
    include "database.php";


$db = new database();
echo $_SESSION['uname'];
$vestigingen = $db->select("SELECT winkelcode, winkelplaats, winkelnaam FROM winkel", []);

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $winkelcode = $_POST['winkelplaats'];
    $id = (int)substr($winkelcode, 0, 1);
    $sql = "SELECT * FROM bestelling WHERE winkel_winkelcode = :id";
    $orders = $db->select($sql, ['id'=>$id]); //[[id=>1....],[id->2....],[id=>3...]]
    $columns = array_keys($orders[0]);
    $row_data = array_values($orders);

}
?>
<body>
<div class="containter-fluid">
    <div class="row ruim">
        <div class="col-2 ruimte"></div>

        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg btn-success"><a href="overzicht_artikelen.php">Overzicht artikelen</a></button>
            <br>
            <br>
            <button type="button" class="btn btn-primary btn-lg btn-success"><a href="artikel_toevoegen.php">Artikel toegvoegen</a></button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg btn-success"><a href="overzicht_medewerker.php">Overzicht medewerker</a></button>
            <br>
            <br>
            <button type="button" class="btn btn-primary btn-lg btn-success "><a href="medewerkertoevoegen.php">Medewerker toevoegen</a></button>
        </div>

        <div class="col-2">
        <form class="form-signin" action="medewerker.php" method="post">
        <!-- hier begint de dropdown  -->
        <label for="Bestellingen per Winkel">Bestellingen per Winkel</label>
            <select name="winkelplaats" class="form-control form-control-lg">
                <?php foreach ($vestigingen as $vestigingen): ?>
                    <option name="<?php echo $vestigingen["winkelcode"]?>" value="<?php echo $vestigingen["winkelcode"]?>"><?=$vestigingen["winkelcode"]?> <?=$vestigingen["winkelplaats"]?> <?=$vestigingen["winkelnaam"]?></option>
                <?php endforeach ?>
            </select>
            <br>
            <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">
        </form>
        </div>
        <!-- hier eindigd de dropdown -->
        <div class="container spacing" >
            <table class="table table-hover">
                <tr>
                    <?php
                        if(isset($columns) && !empty($columns)){
                        foreach($columns as $column){ ?>
                            <th><strong><?php echo $column; ?></strong></th>
                    <?php    }

                    ?>
                </tr>

                <?php
                    foreach($row_data as $rows){ ?>
                    <tr>
                    <?php
                    foreach($rows as $data){
                        echo "<td> $data </td>";
                    }
                    }
                    ?>
            <?php } ?>
                    </tr>
            </table>
        </div>
    </div>
</div>
</body>

<?php
// this inserts the header
    require_once('footer.php');

?>
