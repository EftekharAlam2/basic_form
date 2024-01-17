<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "form";

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT skill FROM skills";
$result = $mysqli->query($query);

if ($result) {
    $skills = array();
    while ($row = $result->fetch_assoc()) {
        $skills[] = $row['skill'];
    }

    $response = array("success" => true, "skills" => $skills);
    echo json_encode($response);
} else {
    $response = array("success" => false);
    echo json_encode($response);
}

$mysqli->close();

?>
