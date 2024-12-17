<?php
include 'database.php'; // Include your database connection file

// Query to fetch student data
$query = "SELECT gradeID, studentID, subjectID, grade, semester FROM grades";

// Prepare and execute the query
$stmt = $con->prepare($query);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Loop through the result set and display the student details
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row['gradeID'] . "</td>";
            echo "<td>" . $row['studentID'] . "</td>";
            echo "<td>" . $row['subjectID'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "<td>" . $row['semester'] . "</td>";
            echo "<td>";
            echo "<a href='grade-edit.php?gradeid=" . $row['gradeID'] . "' class='btn btn-primary'>Edit</a>";
            echo "&nbsp;&nbsp;&nbsp;";
            echo '<a onclick="deleteStudent(\'' . $row['gradeID'] . '\')" class="btn btn-danger">Delete</a>';
            echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No grade found.";
}

$stmt->close();
?>