<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the form
    $student_id = $_POST['studentID'];
    $firstname = $_POST['firstName'];
    $middlename = $_POST['middleName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['contactNo'];
    $birthday = $_POST['dateofbirth'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $enrollmentyear = $_POST['enrollmentYear'];

    // Prepare the SQL query to update the student's information
    $sql = "UPDATE students SET studentID = ?, firstName = ?, middleName = ?, lastName = ?, contactNo = ?, dateofbirth = ?, address = ?, email = ?, enrollmentYear = ? WHERE studentID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssssi", $student_id, $firstname, $middlename, $lastname, $phone, $birthday, $address, $email, $enrollmentyear, $student_id);

    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: view-student.php");
        exit();
    } else {
        echo "Error updating student: " . mysqli_error($con);
    }

    // Close the connection
    $stmt->close();
    mysqli_close($con);
}

// Fetch student data for editing
$row = null; // Initialize $row to avoid undefined variable error
if (isset($_GET['studentid'])) {
    $student_id = $_GET['studentid'];

    $sql = "SELECT * FROM students WHERE studentID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found.";
    }
} else {
    echo "No student selected.";
}

?>