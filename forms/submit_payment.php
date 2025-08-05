<?php
require 'db_connect.php';

if (
    isset( $_POST['amount'], $_POST['payment_date'], $_POST['payment_mode']) &&
    
    !empty($_POST['amount']) &&
    !empty($_POST['payment_date']) &&
    !empty($_POST['payment_mode'])
) {
    $client_id = (int)$_POST['client_id'];
    $case_id = (int)$_POST['case_id'];
    $amount = (float)$_POST['amount'];
    $payment_date = trim($_POST['payment_date']);
    $payment_mode = trim($_POST['payment_mode']);

    $query = "INSERT INTO payments ( amount, payment_date, payment_mode)
              VALUES ( ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("dss",  $amount, $payment_date, $payment_mode);

    if ($stmt->execute()) {
        echo "✅ Payment added successfully.";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "❌ Please fill all the fields.";
}
?>