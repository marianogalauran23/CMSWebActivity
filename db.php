<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "websitecmsactivity";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getDesignSettings($conn) {
    $settings = [];
    $sql = "SELECT setting_name, setting_value FROM design_settings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $settings[$row["setting_name"]] = $row["setting_value"];
        }
    }
    return $settings;
}

$designSettings = getDesignSettings($conn);
?>
