<?php
    include "database.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $usersql = "SELECT userLogin, userPass, userRole FROM users WHERE userLogin = '$username'";
    
    $sql = mysqli_query($con, $usersql);
    if($sql){
        $row = $sql->fetch_assoc();
        if($row == NULL){
            echo "<br>Wrong Credentials.";
        }

        else{
            $DBusername = $row['userLogin'];
            $DBpassword = $row['userPass'];
            $DBrole = $row['userRole'];
            if($username == $DBusername && $password == $DBpassword){
                if($DBrole == 'Student'){
                    header("Location: ../student/main-student.php?studentID=" . urlencode($DBusername));
                    exit;
                }else if($DBrole == 'Admin'){
                    header("Location: main-admin.php?studentID=" . urlencode($DBusername));
                    exit;
                }else{
                    echo "Unknown Role";
                }
            }else{
                echo "<br>Wrong Credentials";
            }
        }
        
    }
    
    else
        echo "Error";
    
    
?>