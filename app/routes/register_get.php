<?php


if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $student_id = $_SESSION['id'];
    if (checkEnrollment($course_id, $student_id)) {
        echo "<script>alert('⚠️ คุณลงทะเบียนรายวิชานี้แล้วไปแล้ว ลงซ้ำไม่ได้'); window.location.href = '/information';</script>";
    } else {
        if (insertEnrollment($course_id, $student_id)) {
            echo "<script>alert('✅ ลงทะเบียนสำเร็จ!'); window.location.href = '/information';</script>";
        } else {
            echo "<script>alert('❌ เกิดข้อผิดพลาด: " . $stmt->error . "'); window.location.href = '/information';</script>";
        }
    }

} else {
    echo "<script>alert('❌ ไม่มีข้อมูลรายวิชา'); window.location.href = '/information';</script>";
}
?>
