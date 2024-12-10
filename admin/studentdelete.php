<?php
include 'database.php';

if (isset($_GET['studentid'])) {
    $studentID = $_GET['studentid'];

    // Delete from students table
        $sql = "DELETE FROM students WHERE studentID = '$studentID'";
        $stmt = $con->prepare($sql);
    
    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: view-student.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
