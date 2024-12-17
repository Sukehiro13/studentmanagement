<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the form
    $gradeid = $_POST['gradeID'];
    $studentid = $_POST['studentID'];
    $subjectid = $_POST['subjectID'];
    $Grade = $_POST['grade'];
    $Semester = $_POST['semester'];


    // Prepare the SQL query to update the student's information
    $sql = "UPDATE grades SET gradeID = ?, studentID = ?, subjectID = ?, grade = ?, semester = ? WHERE gradeID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssi", $gradeid, $studentid, $subjectid, $Grade, $Semester);

    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: view-grade.php");
        exit();
    } else {
        echo "Error updating grade: " . mysqli_error($con);
    }

    // Close the connection
    $stmt->close();
    mysqli_close($con);
}

// Fetch student data for editing
$row = null; // Initialize $row to avoid undefined variable error
if (isset($_GET['gradeid'])) {
    $gradeID = $_GET['gradeid'];

    $sql = "SELECT * FROM grades WHERE gradeID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $gradeID);
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