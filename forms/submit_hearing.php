<?php
require 'db_connect.php'; // Ensure this file has your database connection

// Validate if all required fields are set
if (
    isset($_POST['hearing_id'], $_POST['case_id'], $_POST['hearing_date'], $_POST['court_name'], 
          $_POST['judge_name'], $_POST['summary']) &&
    !empty(trim($_POST['hearing_id'])) &&
    !empty(trim($_POST['case_id'])) &&
    !empty(trim($_POST['hearing_date'])) &&
    !empty(trim($_POST['court_name'])) &&
    !empty(trim($_POST['judge_name'])) &&
    !empty(trim($_POST['summary']))
) {
    // Sanitize input values
    $hearing_id = trim($_POST['hearing_id']);
    $case_id = trim($_POST['case_id']);
    $hearing_date = trim($_POST['hearing_date']);
    $court_name = trim($_POST['court_name']);
    $judge_name = trim($_POST['judge_name']);
    $summary = trim($_POST['summary']);
    $next_hearing_date = !empty($_POST['next_hearing_date']) ? trim($_POST['next_hearing_date']) : NULL;

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO hearings (hearing_id, case_id, hearing_date, court_name, judge_name, summary, next_hearing_date) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $hearing_id, $case_id, $hearing_date, $court_name, $judge_name, $summary, $next_hearing_date);

    // Execute and give feedback
    if ($stmt->execute()) {
        echo "<script>alert('✅ Hearing added successfully!'); window.location.href='create_hearing.php';</script>";
    } else {
        echo "<script>alert('❌ Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('❌ Please fill all required fields.'); window.history.back();</script>";
}
?>