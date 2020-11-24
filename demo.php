<?php
$host = "localhost";
$username = "root";
$password = "";


$sql = mysqli_connect($host, $username, $password);

if(!$sql) die("unable to connect. Error: " . mysqli_connect_error());
echo "connection to database successful<br>";


$database = "CREATE DATABASE students";
if (mysqli_query($sql, $database)){
    echo "<br>database successfully created";
}else {
    echo "<br>database not created" . mysqli_error($sql);
}

mysqli_close($sql);

$sql = mysqli_connect($host, $username, $password, "students");

if(!$sql) die("unable to connect. Error: " . mysqli_connect_error());
echo "<br>connection to database successful<br>";

$table = "CREATE TABLE civil(
    id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    reg_date TIMESTAMP
)";

if (mysqli_query($sql, $table)){
    echo "<br>database successfully created";
}else {
    echo "<br>database not created" . mysqli_error($sql);
}

mysqli_close($sql);

$sql = mysqli_connect($host, $username, $password, "students");
if(!$sql) die("unable to connect. Error: " . mysqli_connect_error());
echo "<br>connection to database successful<br>";

if(isset($_POST["submit"])) {
    $lastname = $_POST["lname"];
    $firstname = $_POST["fname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
 
    echo $lastname . $firstname;
 
    $table = "INSERT INTO civil (firstname, lastname,  email, password)
    VALUES ('$lastname', '$firstname', '$email', '$pass')";

    if (mysqli_query($sql, $table)){
        echo "New record created successfully";
    }else {
        echo "Error: " . $table . "<br>" . mysqli_error($sql);
    }
 
}

mysqli_close($sql);
?>