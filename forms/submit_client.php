<?php
require 'db_connect.php';

if (
    !isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['aadhar']) ||
    empty(trim($_POST['name'])) ||
    empty(trim($_POST['email'])) ||
    empty(trim($_POST['phone'])) ||
    empty(trim($_POST['address'])) ||
    empty(trim($_POST['aadhar']))
) {
    echo "❌ Please fill all the fields.";
    exit;
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);
$aadhar = trim($_POST['aadhar']);

$stmt = $conn->prepare("INSERT INTO clients (name, email, phone, address, aadhar) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $address, $aadhar);

if ($stmt->execute()) {
    echo "✅ Client added successfully!";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>