<?php
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$issuefaced = $_POST['issue_faced'];
$phonenumber = $_POST['phone_number'];
$address = $_POST['address'];

$conn = new mysqli('localhost', 'root','','appointment');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(first Name, last Name, gender, email,issue faced,phone number,address) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $firstName, $lastName, $gender, $email, $issuefaced, $phonenumber, $address);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
