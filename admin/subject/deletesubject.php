<?php
include 'database.php';

if (isset($_GET['subjectid'])) {
    $subjectID = $_GET['subjectid'];

    // Delete from students table
        $sql = "DELETE FROM subjects WHERE subjectID = '$subjectID'";
        $stmt = $con->prepare($sql);
    
    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: view-subject.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
