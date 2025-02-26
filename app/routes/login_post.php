<?php

declare(strict_types=1);

getConnection();
$email = $_POST['email'] ?? '';
$password =$_POST['password'] ?? '';
$_SESSION['email'] = $email;

$result = getStudentByEmail($email);

if ($result && $result->num_rows > 0) {
    $student = $result->fetch_assoc(); 
    $id= $student['student_id'];
    $hash=$student['password'];
    if(password_verify($password,$hash)){
        $_SESSION['id'] = $id;
        $unix_timestamp = time();
        $_SESSION['timestamp'] = $unix_timestamp;
        header('Location: /');
    
    }else{
        echo "<script>alert('รหัสผ่านไม่ถูกต้อง'); window.location.href = '/login';</script>";
        header('Location: /login');
    }
} else {
    echo "<script>alert('ไม่พบข้อมูลนักเรียน'); window.location.href = '/login';</script>";
}