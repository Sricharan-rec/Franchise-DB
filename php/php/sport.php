<?php
$conn = new mysqli('localhost', 'root', '', 'franchise_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sport_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
</head>
<body>
    <h1>Players</h1>
    <ul>
        <?php
        // Fetch players for the selected sport
        $result = $conn->query("SELECT * FROM Players WHERE Sport_ID = $sport_id");
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row['Player_Name'] . " (Year: " . $row['Year'] . ")</li>";
        }
        ?>
    </ul>
    <a href="index.php">Back to Sports</a>
</body>
</html>

<?php $conn->close(); ?>
