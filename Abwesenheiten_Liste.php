<?php 
include 'connection.php';

$sql = "SELECT * FROM Abwesenheiten ORDER BY reg_date DESC";
$result = $conn->query($sql);
$conn = new mysqli($servername, $username, $password, $dbname);

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
                            echo "<td>" . $row["Vor- und Nachname"] . "</td>";
                            echo "<td>" . $row["Datum vom"] . "</td>";
                            echo "<td>" . $row["Datum bis"] . "</td>";
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