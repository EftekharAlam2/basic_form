<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "form";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$inputText = $mysqli->real_escape_string($_GET['inputText']); // Prevent SQL injection

$query = "SELECT country_name FROM country WHERE country_name LIKE '%$inputText%'";
$result = $mysqli->query($query);

if ($result) {
    $matchingCountries = array();
    while ($row = $result->fetch_assoc()) {
        $matchingCountries[] = $row['country_name'];
    }

    $response = array("success" => true, "matchingCountries" => $matchingCountries);
    echo json_encode($response);
} else {
    $response = array("success" => false);
    echo json_encode($response);
}

$mysqli->close();
?>
