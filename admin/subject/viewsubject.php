<?php
include 'database.php'; // Include your database connection file

// Query to fetch student data
$query = "SELECT subjectID, subjectName, subjectDescription FROM subjects";

// Prepare and execute the query
$stmt = $con->prepare($query);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Loop through the result set and display the student details
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row['subjectID'] . "</td>";
            echo "<td>" . $row['subjectName'] . "</td>";
            echo "<td>" . $row['subjectDescription'] . "</td>";
            echo "<td>";
            echo "<a href='edit-subject.php?subjectid=" . $row['subjectID'] . "' class='btn btn-primary'>Edit</a>";
            echo "&nbsp;&nbsp;&nbsp;";
            echo "<a href='delete-subject.php?subjectid=" . $row['subjectID'] . "' class='btn btn-danger'>Delete</a>";
            echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No Subjects found.";
}

$stmt->close();
?>