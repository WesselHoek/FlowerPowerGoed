<?php
// database.php
class database{
    private $servername;
    private $database;
    private $username;
    private $password;
    private $conn;

function __construct() {
    $this->servername ='localhost';
    $this->database ='flowerpower';
    $this->username ='root';
    $this->password ='';

    try{
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password,);

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo"<br>";
        echo"connected successfully";
        echo"<br>";
    }   catch(PDOException $e) {
        echo "connection failed" . $e->getMessage();
    }
        
}


function insert_admin(){
    
    $sql = "INSERT INTO medewerkers VALUE (:medewerkerscode, :voorletters, :voorvoegsel, :achternaam, :gebruikersnaam, :wachtwoord);";

    // Prepere
    $stmt = $this->conn->prepare($sql);


    // execute
    $stmt->execute([
        'medewerkerscode'=>NULL,
        'voorletters' => 'J',
        'voorvoegsel' => '',
        'achternaam' => 'Waigel',
        'gebruikersnaam' => 'jimmy',
        'wachtwoord' => password_hash('admin', PASSWORD_DEFAULT)
    ]);
}


function registreer_klant($voorletters, $tussenvoegsel, $achternaam, $adres ,$postcode ,$woonplaats ,$geboortedatum, $uname, $psw){

        $sql = "INSERT INTO klant VALUES (:klantcode, :voorletters, :tussenvoegsel, :achternaam, :adres, :postcode, :woonplaats, :geboortedatum, :gebruikersnaam, :wachtwoord)";

        $stmt = $this->conn->prepare($sql); // checkt syntax van sql string en prepared op server

        // executes prepared statements, passes values to named placeholders from sql string on line 51
        $stmt->execute([
            'klantcode'=>NULL,
            'voorletters' => $voorletters,
            'tussenvoegsel' => $tussenvoegsel,
            'achternaam' => $achternaam,
            'adres' => $adres,
            'postcode' => $postcode,
            'woonplaats' => $woonplaats,
            'geboortedatum' => $geboortedatum,
            'gebruikersnaam' => $uname,
            'wachtwoord' => password_hash($psw, PASSWORD_DEFAULT)
        ]);
      
}

public function loginmedewerker($uname, $psw){

    $sql = "SELECT medewerkerscode, gebruikersnaam, wachtwoord FROM medewerkers WHERE gebruikersnaam = :gebruikersnaam";

    //prepare
    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        'gebruikersnaam' => $uname
    ]);

    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);

    if(is_array($result)){

        if(count($result) > 0){

            if ($uname == $result['gebruikersnaam'] && password_verify($psw, $result['wachtwoord'])) {

                session_start();
                $_SESSION['medewerkerscode'] = $result['id'];
                $_SESSION['uname'] = $result['gebruikersnaam'];

                header('location: medewerker.php');

            }
        }else{
            echo 'faild to login.';
        }

    }else{
        echo 'Faild to login. please check you input and try again.';
    }

}


public function logincustomer($uname, $psw){

    $sql = "SELECT klantcode, gebruikersnaam, wachtwoord FROM klant WHERE gebruikersnaam = :gebruikersnaam";

    //prepare
    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        'gebruikersnaam' => $uname
    ]);

    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);

    if(is_array($result)){

        if(count($result) > 0){

            if ($uname == $result['gebruikersnaam'] && password_verify($psw, $result['wachtwoord'])) {

                session_start();
                $_SESSION['medewerkerscode'] = $result['id'];
                $_SESSION['uname'] = $result['gebruikersnaam'];

                header('location: klant.php');

            }
        }else{
            echo 'faild to login.';
        }

    }else{
        echo 'Faild to login. please check you input and try again.';
    }

}

public function winkel_select(){


    $sql = "SELECT winkelcode ,winkelnaam FROM winkel";
    
    $stmt = $this->conn->prepare($sql);
    
    $stmt->execute();
    
    $winkels = $stmt->fetchAll();

    return $winkels;
}


public function artikel_select(){


    $sql = "SELECT artikelcode ,artikel, prijs FROM artikel";
    
    $stmt = $this->conn->prepare($sql);
    
    $stmt->execute();
    
    $artikels = $stmt->fetchAll();

    return $artikels;
}


public function select($statment, $named_placeholder){

    $stmt = $this->conn->prepare($statment);
    $stmt->execute($named_placeholder);
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

public function update_or_delete($statement, $named_placeholder){
        
    $stmt = $this->conn->prepare($statement);
    $stmt->execute($named_placeholder);
    header('location:overzicht_artikelen.php');
    header('location:overzicht_medewerker.php');
    header('location:klant.php');
    exit();

}




}