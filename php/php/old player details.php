<?php
/* Template Name: Player Stats Page */
get_header();
global $wpdb;

// Step 1: Query the "DHONI" table to get player stats
$player_stats = $wpdb->get_results("SELECT * FROM DHONI");

if ($player_stats) {
    // Step 2: Display the player stats in a table
    echo "<h2>Player Stats - DHONI</h2>";
    echo "<table border='1'>
            <tr>
                <th>Matches Played</th>
                <th>Runs</th>
                <th>Wickets</th>
                <th>Specialization</th>
            </tr>";

    // Loop through each player stat and display it in a table row
    foreach ($player_stats as $stat) {
        // Display the results using the updated column name 'Matches_played'
        echo "<tr>
                <td>" . esc_html($stat->Matches_played) . "</td>
                <td>" . esc_html($stat->Runs) . "</td>
                <td>" . esc_html($stat->Wickets) . "</td>
                <td>" . esc_html($stat->Specialization) . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No player stats found.</p>";
}

get_footer();
?>
