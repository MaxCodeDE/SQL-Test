<?php
error_reporting(E_ALL);
 
// Variablen werden definiert zum Aufbau der Verbindung zur Datenbank
define('MYSQL_HOST',      'localhost' );
define('MYSQL_BENUTZER',  'test_user' );
define('MYSQL_KENNWORT',  'test123' );
define('MYSQL_DATENBANK', 'test' );


// []---- Variante 1 ----[] 
// Veraltet und befehle werden von der Datenbank nicht ausgeführt
/*$db_link = mysql_connect(MYSQL_HOST, 
                          MYSQL_BENUTZER, 
                          MYSQL_KENNWORT, 
                          MYSQL_DATENBANK);
 
if ( $db_link ) {
    echo 'Verbindung erfolgreich: ';
    print_r( $db_link);
} else {
    die('keine Verbindung moeglich: ' . mysqli_error());
}

$befehl = "CREATE TABLE test01(vorname VARCHAR(255), nachname VARCHAR(255));";
//$befehl = "INSERT INTO test(vorname, nachname) VALUES ('max', 'bremer')";
mysql_query($befehl, $db_link);
mysql_close($db_link);*/


// []---- Variante 2 ----[] 
// Neue und funktionierende Methode
$connection = new mysqli(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);

// Prüft die Verbindung
if ($connection->connect_error) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
} else {
    echo "Verbindung erfolgreich";
}
    
echo "<br>";

// Erstellt Tabelle und fügt Testdaten ein
if (!$connection ->query("CREATE TABLE test01(id INT, name VARCHAR(255))") ||
    !$connection ->query("INSERT INTO test01(id, name) VALUES (5, 'max')") ||
    !$connection ->query("INSERT INTO test01(id, name) VALUES (10, 'max2')")) {
    echo "Tabelle konnte nicht erstellt werden: (" . $connection ->errno . ") " . $connection ->error;
} else {
	echo "Erfolgreich ausgef&uuml;hrt!";
}


?>