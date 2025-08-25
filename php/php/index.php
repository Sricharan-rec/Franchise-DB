<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'mini project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching sports from the database
$sports_sql = "SELECT Sport_ID, Sport_Name FROM Sports"; // Adjust based on your table structure
$sports_result = $conn->query($sports_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franchise Database</title>
</head>
<body>
    <h1>Welcome to the Franchise Database</h1>
    
    <form method="GET">
        <label for="sports">Select Sport:</label>
        <select name="sport_id" id="sports" onchange="this.form.submit()">
            <option value="">--Select Sport--</option>
            <?php
            if ($sports_result->num_rows > 0) {
                while ($row = $sports_result->fetch_assoc()) {
                    echo "<option value='" . $row['Sport_ID'] . "'>" . $row['Sport_Name'] . "</option>";
                }
            }
            ?>
        </select>
    </form>

    <?php
    // Check if a sport_id is set
    if (isset($_GET['sport_id']) && !empty($_GET['sport_id'])) {
        $sport_id = intval($_GET['sport_id']);
        
        // Fetching teams based on selected sport
        $teams_sql = "SELECT Team_ID, Team_Name FROM Teams WHERE Sport_ID = $sport_id"; // Adjust based on your table
        $teams_result = $conn->query($teams_sql);
        
        if ($teams_result->num_rows > 0) {
            echo "<h2>Select Team:</h2>";
            echo "<form method='GET'>";
            echo "<select name='team_id' id='teams' onchange='this.form.submit()'>";
            echo "<option value=''>--Select Team--</option>";
            while ($row = $teams_result->fetch_assoc()) {
                echo "<option value='" . $row['Team_ID'] . "'>" . $row['Team_Name'] . "</option>";
            }
            echo "</select>";
            echo "<input type='hidden' name='sport_id' value='$sport_id'>"; // Preserve selected sport
            echo "</form>";
        }
    }

    // Check if a team_id is set
    if (isset($_GET['team_id']) && !empty($_GET['team_id'])) {
        $team_id = intval($_GET['team_id']);
        
        // Fetching players based on selected team
        $players_sql = "SELECT Player_ID, Player_Name FROM Players WHERE Team_ID = $team_id"; // Adjust based on your actual table
        $players_result = $conn->query($players_sql);
        
        if ($players_result->num_rows > 0) {
            echo "<h2>Select Player:</h2>";
            echo "<form method='GET'>";
            echo "<select name='player_id' id='players' onchange='this.form.submit()'>";
            echo "<option value=''>--Select Player--</option>";
            while ($row = $players_result->fetch_assoc()) {
                echo "<option value='" . $row['Player_ID'] . "'>" . $row['Player_Name'] . "</option>";
            }
            echo "</select>";
            echo "<input type='hidden' name='sport_id' value='$sport_id'>"; // Preserve selected sport
            echo "<input type='hidden' name='team_id' value='$team_id'>"; // Preserve selected team
            echo "</form>";
        }
    }

    // Check if a player_id is set
    if (isset($_GET['player_id']) && !empty($_GET['player_id'])) {
        $player_id = intval($_GET['player_id']);
        
        // Fetching player stats based on selected player
        $stats_sql = "SELECT Matches_Played, Runs, Wickets FROM Cricket_Stats WHERE Player_ID = $player_id"; // Adjust based on your actual table
        $stats_result = $conn->query($stats_sql);
        
        if ($stats_result->num_rows > 0) {
            echo "<h2>Player Stats:</h2>";
            while ($row = $stats_result->fetch_assoc()) {
                echo "<p>Matches Played: " . $row["Matches_Played"] . "</p>";
                echo "<p>Runs: " . $row["Runs"] . "</p>";
                echo "<p>Wickets: " . $row["Wickets"] . "</p>";
            }
        } else {
            echo "No stats found for this player.";
        }
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
