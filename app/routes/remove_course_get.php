<?php


declare(strict_types=1);
getConnection();

// Assume that login success
if (isset($_GET['id'])) {
    $course_id = intval($_GET['id']); 
    $student_id = $_SESSION['id']; 


    if (Unenroll($course_id,$student_id)) {
        echo "<script>alert('ถอนวิชานี้สำเร็จ'); window.location.href = '/information';</script>";
    } else {
        echo "<script>alert('การถอนรายวิชาผิดพลาด'); window.location.href = '/information';</script>";
    }
}

header('Location: /information');
exit;