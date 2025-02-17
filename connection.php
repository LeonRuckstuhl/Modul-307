<?php
$servername = "localhost:3306"; 
$username = "root"; 
$password = "";
$dbname = "m307_lp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$VorundNachname = $_POST['Vor- und Nachname'];
$Datumvom = $_POST['Datum vom'];
$Datumbis = $_POST['Datum bis'];
$Kommentar = $_POST['Begründung'];

$sql = "INSERT INTO Abwesenheiten (Vor- und Nachname, Datum vom, Datum bis, Begründung)
        VALUES ('$VorundNachname', '$Datumvom', '$Datumbis', '$Begründung')";

if ($conn->query($sql) === TRUE) {
    echo "Abwesenheit erfolgreich eingetragen!";
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>