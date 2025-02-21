<?php 
include 'connection.php';
print_r($_POST);
$Name = $_POST['Name'];
$Datumvom = $_POST['Datumvom'];
$Datumbis = $_POST['Datumbis'];
$Kommentar = $_POST['Begründung'];

// Prepare the SQL query using placeholders
$stmt = $conn->prepare("INSERT INTO Abwesenheiten (`Name`, `Datumvom`, `Datumbis`, `Begründung`)
                          VALUES (?, ?, ?, ?)");

// Bind the variables to the placeholders
$stmt->bind_param("ssss", $Name, $Datumvom, $Datumbis, $Kommentar);

// Execute the query
if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$sql = "SELECT * FROM Abwesenheiten ORDER BY id ASC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abwesenheiten & Ferien</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Vor- und Nachname</th>
                    <th>Datum vom</th>
                    <th>Datum bis</th>
                    <th>Begründung</th>
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
                        }
                    } else {
                        echo "<tr><td colspan='9'>Keine Abwesenheiten gefunden</td></tr>";
                    }
                ?>
            </tbody>
    </div>
</body>
</html>