<?php
// submit_lawyer.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $age = htmlspecialchars(trim($_POST['age']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $specialization = htmlspecialchars(trim($_POST['specialization']));
    $yearsOfExperience = htmlspecialchars(trim($_POST['yearsofexperience']));

    // Here you can add code to save the data to a database or send an email
    // For demonstration, we will just display the submitted data

    echo "<h1>Submitted Lawyer Enquiry</h1>";
    echo "<p><strong>Full Name:</strong> $name</p>";
    echo "<p><strong>Age:</strong> $age</p>";
    echo "<p><strong>Contact Number:</strong> $contact</p>";
    echo "<p><strong>Specialization:</strong> $specialization</p>";
    echo "<p><strong>Years of Experience:</strong> $yearsOfExperience</p>";
} else {
    // Redirect to the form if accessed directly
    header("Location: lawyer_enquiry_form.html");
    exit();
}
?>