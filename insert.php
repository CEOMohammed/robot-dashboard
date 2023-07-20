<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_moves";

// Check if a button wa s clicked
if(isset($_POST["forward_move"]) || isset($_POST["left_move"]) || isset($_POST["stop_move"]) 
	|| isset($_POST["right_move"]) || isset($_POST["backward_move"])) { 
    // Set the direction variable based on the button that was clicked
    if(isset($_POST["forward_move"])) {
        $direction = "Forward";
    } elseif(isset($_POST["left_move"])) {
        $direction = "Left";
    } elseif(isset($_POST["stop_move"])) {
        $direction = "Stop";
    } elseif(isset($_POST["right_move"])) {
        $direction = "Right";
    } elseif(isset($_POST["backward_move"])) {
        $direction = "Backward";
    }

    // Create a new database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the database connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the direction into the directions table
    $sql = "INSERT INTO directions (direction) VALUES ('$direction')";

    if (mysqli_query($conn, $sql)) {
        echo $direction;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<html>
<body>
<form action="index.html" method="post">
    <button type="submit" name="back" value="back">Back to main Menu</button>
</form>
</body>
</html>