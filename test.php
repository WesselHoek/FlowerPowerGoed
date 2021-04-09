<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
    <?php
        // database class instance maken
        // include 'database.php'; //we hebben de database connectie al beneden aangemaakt
        $db = new database();
 
        // $vestigingen = $db->select("SELECT Vestigingsplaats FROM winkel", []);
        $storeinfo = $db->select("SELECT store_id, storeresidence FROM store", []);
        print_r($storeinfo);
        // TODO 1: insert 3 winkels in table winkel. zorg ervoor dat iedere winkel een andere vestiging heeft.
        // todo 2: zorg ervoor dat de vestigingsplaatsen dynamisch worden toegevoegd als options binnen de select
 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){​​​​
            $store_id = $_POST['store_id'];
 
            $sql = "SELECT * FROM orders WHERE store_id = :id";
            $order_info = $db->select($sql, ['id'=>$store_id]);
 
            // overzicht maken -> we gaan order info loopen, en op een dynamische manier een tabel genereren op basis van de order_info
 
 

        }​​​​
 
    ?>
 
    <form action="testie.php" method="post">
        <select name="storeinfo" id="storeinfo">
 
            <?php foreach($storeinfo as $data) {​​​​ ?> <!-- Here we are making a foreach loop, looping storeresidence -->
                <option value="<?php echo $data['store_id']?>">
                    <?php echo $data['storeresidence']; ?>
                </option>
            <?php }​​​​ ?>
            <input type="submit"> <!-- Hier drukt de user op voor het zoeken -->
 

            <!-- To Do List -->
            <!-- Stap 1: Maak een submit button aan -->
            <!-- Stap 2: Als een medewerker klikt op de gekozen dropdown value klikt de user op submit -->
            <!-- Stap 3: Zodra er op submit gedrukt is moet er aan de hand van de gekozen vesteging alle bestellingen
            met de vesteging id gedisplayed worden  -->
 
        </select>
 
    </form>
 

    <!-- order_info loopen en een overzicht maken (table) -->
 
    <form>
 
        <select name="storeinfo" id="storeinfo">
            <option value="<?php $storeinfo[0]['store_id'] ?>">
                <?php echo $storeinfo[0]['storeresidence'] ?>
            </option>
            <option value="<?php $storeinfo[1]['store_id'] ?>">
                <?php echo $storeinfo[1]['storeresidence'] ?>
            </option>
            <option value="<?php $storeinfo[2]['store_id'] ?>">
                <?php echo $storeinfo[2]['storeresidence'] ?>
            </option>
 
            <input type="submit"> <!-- Hier drukt de user op voor het zoeken -->
 

            <!-- To Do List -->
            <!-- Stap 1: Maak een submit button aan -->
            <!-- Stap 2: Als een medewerker klikt op de gekozen dropdown value klikt de user op submit -->
            <!-- Stap 3: Zodra er op submit gedrukt is moet er aan de hand van de gekozen vesteging alle bestellingen
            met de vesteging id gedisplayed worden  -->
 
        </select>
    </form>
    <!--
        // TODO 3: hier maak je een foreach loop. Deze zorgt ervoor dat de vestigingen in $vestiging worden geloopt en dat de label en value correct geset wordt.
    -->
 
</body>
</html>
 

<?php
 
class database{​​​​
 
    private $host;
    private $username;
    private $password;
    private $database;
    public $dbh;
 
    public function __construct(){​​​​
        // hier wordt o.a. je db connectie gemaakt (voor nu $this->dbh = new PDO();)
 
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'flowerpower';
 
        try {​​​​
            $dsn = "mysql:host=$this->host;dbname=$this->database";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            echo "connection succesfull";
        }​​​​ catch (PDOException $e) {​​​​
            die("connection failed try again->" . $e.(getMessage())); //Retourneerd de error met een ingebouwde functie
        }​​​​
 
    }​​​​
 
    public function select($sql, $named_placeholders){​​​​
        $statement = $this->dbh->prepare($sql);
        $statement->execute($named_placeholders);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }​​​​
}​​​​
?>




<div class="container">
        <table id="tableexport" class="table table-striped table-hover table-bordered">
            <thead class="table-borderless thead-light">
                <tr>
                    <th>bestellingid</th>
                    <th>aantal</th>
                    <th>afgehaald</th>
                    <th>winkel_winkelcode</th>
                    <th>medewerkers_medewerkerscode</th>
                    <th>klant_klantcode	</th>
                    <th>artikel_artikelcode</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($orders as $orders) : ?>
                        <tr>
                            <td><?= $orders['bestellingid'] ?></td>
                            <td><?= $orders['aantal'] ?></td>
                            <td><?= $orders['afgehaald'] ?></td>
                            <td><?= $orders['winkel_winkelcode'] ?></td>
                            <td><?= $orders['medewerkers_medewerkerscode'] ?></td>
                            <td><?= $orders['klant_klantcode'] ?></td>
                            <td><?= $orders['artikel_artikelcode'] ?></td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
        </div>