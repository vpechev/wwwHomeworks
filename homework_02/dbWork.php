<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="myDB";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ".$database.";";
if ($conn->query($sql) === TRUE) {
    echo "<h1>Database created successfully</h1>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli($servername, $username, $password, $database);
// sql to create Student table
$sql = "CREATE TABLE IF NOT EXISTS Student (
id INT AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Table Student created successfully</h1>";
} else {
    echo "<h2 style=\"background-color: red;\">Error creating table: " . $conn->error."</h2>";
}

// sql to create Course table
$sql = "CREATE TABLE IF NOT EXISTS Course (
id INT AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR(100),
description VARCHAR(100),
lecturer VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Table Course created successfully</h1>";
} else {
    echo "<h2 style=\"background-color: red;\">Error creating table: " . $conn->error."</h2>";
}

// sql to create Comments table
$sql = "CREATE TABLE IF NOT EXISTS Comments (
id INT AUTO_INCREMENT PRIMARY KEY, 
courseID INTEGER,
studentID INTEGER,
comments VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Table Course created successfully</h1>";
} else {
    echo "<h2 style=\"background-color: red;\">Error creating table: " . $conn->error."</h2>";
}

// insert records
$sql="INSERT INTO Course (title, description, lecturer) VALUES ('www-tech', 'Introduction to the web technologies', 'Petrov')";
if ($conn->query($sql) === TRUE) {
    echo "<h1>Successfully insert</h1>";
} else {
    echo "<h2 style=\"background-color: red;\">Error inserting: " . $conn->error."</h2>";
}

$sql="INSERT INTO Course (title, description, lecturer) VALUES ('artifical intelligence', 'Intro to Al', 'Koichev')";
if ($conn->query($sql) === TRUE) {
    echo "<h1>Successfully insert</h1>";
} else {
    echo "<h2 style=\"background-color: red;\">Error inserting: " . $conn->error."</h2>";
}

$sql="INSERT INTO Course (title, description, lecturer) VALUES ('Network programming in java', 'Intro to network programming', 'Petrov')";
if ($conn->query($sql) === TRUE) {
    echo "<h1>Successfully insert</h1>";
} else {
    echo "<h2 style=\"background-color: red;\">Error inserting: " . $conn->error."</h2>";
}

$sql = "SELECT DISTINCT lecturer FROM Course";

$result = $conn->query($sql);
$count = $result->num_rows ;

echo $count."<br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["lecturer"]."<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>
</body>
    </html>