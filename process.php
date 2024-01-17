<?php
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$nationality = $_POST['nationality'];

$degreeEarned = $_POST['degreeEarned'];
$fieldOfStudy = $_POST['fieldOfStudy'];
$instituteName = $_POST['instituteName'];
$locationEducation = $_POST['location'];
$cgpa = $_POST['cgpa'];

$jobTitle = $_POST['jobTitle'];
$companyName = $_POST['companyName'];
$locationWork = $_POST['location'];
$responsibilitiesAchievements = $_POST['responsibilitiesAchievements'];
$relevantSkills = $_POST['relevantSkills'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO cv (full_name, email, phone_number, address, dob, nationality, 
                        degree_earned, field_of_study, institute_name, location_education, cgpa,
                        job_title, company_name, location_work, responsibilities_achievements, relevant_skills)
        VALUES ('$fullName', '$email', '$phoneNumber', '$address', '$dob', '$nationality',
                '$degreeEarned', '$fieldOfStudy', '$instituteName', '$locationEducation', '$cgpa',
                '$jobTitle', '$companyName', '$locationWork', '$responsibilitiesAchievements', '$relevantSkills')";

if ($conn->query($sql) === TRUE) {
    echo "Form data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
