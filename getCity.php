<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "form";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$selectedCountry = $_GET['country'];

$query = "SELECT city_name FROM country WHERE country_name = '$selectedCountry'";
$result = $mysqli->query($query);

if ($result) {
    $city = array();
    while ($row = $result->fetch_assoc()) {
        $city[] = $row['city_name'];
    }

    $response = array("success" => true, "city" => $city);
    echo json_encode($response);
} else {
    $response = array("success" => false);
    echo json_encode($response);
}

$mysqli->close();

?>
