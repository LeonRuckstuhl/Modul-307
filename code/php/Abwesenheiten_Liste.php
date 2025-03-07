<?php 
include 'connection.php';
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);

$stmt = $conn->prepare("DELETE FROM Abwesenheiten WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
$Name = $_POST['Name'];
$Datumvom = $_POST['Datumvom'];
$Datumbis = $_POST['Datumbis'];
$Kommentar = $_POST['Begründung'];
$Email = $_POST['Email'];

// Prepare the SQL query using placeholders
$stmt = $conn->prepare("INSERT INTO Abwesenheiten (`Name`, `Datumvom`, `Datumbis`, `Begründung`, `Email`)
                          VALUES (?, ?, ?, ?, ?)");

// Bind the variables to the placeholders
$stmt->bind_param("sssss", $Name, $Datumvom, $Datumbis, $Kommentar, $Email);

$sql = "SELECT * FROM Abwesenheiten ORDER BY id ASC";
$result = $conn->query($sql);

if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Abwesenheiten & Ferien</title>
        <link rel="stylesheet" href="/code/stylesheet/style.css">
    </head>
    <body>
        <div class="tablebig">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Vor- und Nachname</th>
                        <th>Datum vom</th>
                        <th>Datum bis</th>
                        <th>Begründung</th>
                        <th>E-Mail</th>
                        <th>Aktion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["Datumvom"] . "</td>";
                                echo "<td>" . $row["Datumbis"] . "</td>";
                                echo "<td>" . $row["Begründung"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";
                                echo "<td><a href='?delete_id=" . $row["id"] . "' onclick='return confirm(\"Eintrag wirklich löschen?\")'>Löschen</a></td>";
                        echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>Keine Abwesenheiten gefunden</td></tr>";
                        }
                    ?>
                </tbody>
        </div>
    </body>
</html>

