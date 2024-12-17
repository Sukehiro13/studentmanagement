<?php
include 'database.php'; // Include your database connection file

// Query to fetch student data
$query = "SELECT studentID, CONCAT(lastName, ', ', firstName) AS fullName, contactNo, email FROM students";

// Prepare and execute the query
$stmt = $con->prepare($query);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Loop through the result set and display the student details
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
            <td>' . $row['studentID'] . '</td>
            <td>' . $row['fullName'] . '</td>
            <td>CS Elective</td>
            <td>1.75</td>
            <td>1st Semester</td>
            <td>
            <a href="edit-grade.php" class="btn btn-primary btn-rounded">Edit</a>
            &nbsp;&nbsp;&nbsp;
            <a href="delete-grade.php" class="btn btn-danger btn-rounded">Delete</a>
            </td>
            </tr>';
    }
} else {
    echo "No students found.";
}

$stmt->close();
?>
