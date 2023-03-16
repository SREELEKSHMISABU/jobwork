<?php
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$number=$_POST['number'];
$password=$_POST['password'];

$conn = new mysqli('localhost','root','','form');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die('connection failed :'.$conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into register (firstName,lastName,email,gender,phone,password) values(?,?,?,?,?,?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $email, $gender, $number, $password);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration Successfull ";
    $stmt->close();
    $conn->close();
}

?>