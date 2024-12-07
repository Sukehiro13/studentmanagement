<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['studentID'];
    $firstname = $_POST['firstName'];
    $middlename = $_POST['middleName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['contactNo'];
    $birthday = $_POST['dateofbirth'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $enrollmentyear = $_POST['enrollmentYear'];
    $final_password = $student_id;
    $hashed_password = password_hash($final_password, PASSWORD_DEFAULT);


    $sql1 = "
    INSERT INTO students (studentID, firstName, middleName, lastName, contactNo, dateofbirth, address, email, enrollmentYear )
    VALUES ('$student_id', '$firstname', '$middlename', '$lastname', '$phone', '$birthday', '$address', '$email', '$enrollmentyear');
    ";

    // Execute first query
    if (mysqli_query($con, $sql1)) {
        // Insert into users table only after students table insert is successful
        $sql2 = "
        INSERT INTO users (userLogin, userPass, userRole)
        VALUES ('$student_id', '$hashed_password', 'Student');
        ";

        // Execute second query
        if (mysqli_query($con, $sql2)) {
            header("Location: view-student.php");
            exit();
        } else {
            echo "Error in users table: " . mysqli_error($con);
        }
    } else {
        echo "Error in students table: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>
