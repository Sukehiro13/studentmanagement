<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subjectID = $_POST['subjectID'];
    $subjectname = $_POST['subjectName'];
    $subjectdescription = $_POST['subjectDescription'];


    $sql1 = "
    INSERT INTO subjects (subjectID, subjectName, subjectDescription)
    VALUES ('$subjectID', '$subjectname', '$subjectdescription');
    ";

    // Execute first query
    if (mysqli_query($con, $sql1)) {
        // Execute second query
        header("Location: view-subject.php");
    } else {
        echo "Error in students table: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>
