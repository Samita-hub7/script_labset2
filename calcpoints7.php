<!DOCTYPE html>
<html>
<head>
    <title>Football Points Calculator</title>
</head>

<body>

<h2>Football Team Points Calculator</h2>

<form method="post">

    Wins:
    <input type="number" name="wins" min="0" required>

    <br><br>

    Draws:
    <input type="number" name="draws" min="0" required>

    <br><br>

    Losses:
    <input type="number" name="losses" min="0" required>

    <br><br>

    <button type="submit">Calculate</button>

</form>


<?php

function calculatePoints($wins, $draws, $losses) {

    return ($wins * 3) + ($draws * 1);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $wins = $_POST["wins"];
    $draws = $_POST["draws"];
    $losses = $_POST["losses"];


    // Validation
    if ($wins < 0 || $draws < 0 || $losses < 0) {

        echo "<h3>Values cannot be negative!</h3>";

    } else {

        $totalGames = $wins + $draws + $losses;

        $totalPoints = calculatePoints(
            $wins,
            $draws,
            $losses
        );

        echo "<h3>Result</h3>";

        echo "Total Games Played: " . $totalGames . "<br>";

        echo "Total Points: " . $totalPoints;
    }
}

?>

</body>
</html>