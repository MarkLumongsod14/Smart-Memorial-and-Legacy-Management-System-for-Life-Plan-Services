<?php
header('Content-Type: application/json');

$host = "localhost"; // e.g., localhost
$user = "root"; 
$password = ""; 
$dbname = "deadmans_switch"; 

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Fetch locations from the graves table
$sql = "SELECT latitude, longitude, name, img, details FROM graves"; // Use the existing table
$result = $conn->query($sql);

$locations = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
}

echo json_encode($locations);
$conn->close();
?>
