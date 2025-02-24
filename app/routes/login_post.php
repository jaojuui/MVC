<?php

declare(strict_types=1);

getConnection();
$email = $_POST['email'] ?? '';
$password =$_POST['password'] ?? '';
$_SESSION['email'] = $email;

$result = getStudentByEmail($email);

if ($result && $result->num_rows > 0) {
    $student = $result->fetch_assoc(); // ดึงข้อมูลจากผลลัพธ์
    // echo "Email: " . $student['email']; // ใช้ค่าที่ได้จากฐานข้อมูล
    // echo "id: " . $student['student_id']; // ใช้ค่าที่ได้จากฐานข้อมูล
    $id= $student['student_id']; // ใช้ค่าที่ได้จากฐานข้อมูล
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
    // echo "ไม่พบข้อมูลนักเรียน";
}


// if ($result && $result->num_rows > 0) {
//     while ($student = $result->fetch_assoc()) {
//         echo "<pre>"; // แสดงผลในรูปแบบที่อ่านง่าย
//         print_r($student); // แสดงข้อมูลทั้งหมดของนักเรียนแต่ละแถว
//         echo "</pre>";
//     }
// } else {
//     echo "ไม่พบข้อมูลนักเรียน";
// }
// Assume that login success