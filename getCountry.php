<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "form";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT country_name FROM country";
$result = $mysqli->query($query);

if ($result) {
    $country = array();
    while ($row = $result->fetch_assoc()) {
        $country[] = $row['country_name'];
    }

    $response = array("success" => true, "country" => $country);
    echo json_encode($response);
} else {
    $response = array("success" => false);
    echo json_encode($response);
}


$mysqli->close();

?>
