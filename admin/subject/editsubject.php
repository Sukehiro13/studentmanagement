<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the form
    $subjectID = $_POST['subjectID'];
    $subjectname = $_POST['subjectName'];
    $subjectdescription = $_POST['subjectDescription'];


    // Prepare the SQL query to update the student's information
    $sql = "UPDATE subjects SET subjectID = ?, subjectName = ?, subjectDescription = ? WHERE subjectID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $subjectID, $subjectname, $subjectdescription, $subjectID);

    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: view-subject.php");
        exit();
    } else {
        echo "Error updating subject: " . mysqli_error($con);
    }

    // Close the connection
    $stmt->close();
    mysqli_close($con);
}

// Fetch student data for editing
$row = null; // Initialize $row to avoid undefined variable error
if (isset($_GET['subjectid'])) {
    $subjectID = $_GET['subjectid'];

    $sql = "SELECT * FROM subjects WHERE subjectID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $subjectID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Subjects not found.";
    }
} else {
    echo "No Subject selected.";
}

?>