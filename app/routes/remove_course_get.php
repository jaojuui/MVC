<?php


declare(strict_types=1);
getConnection();

// Assume that login success
if (isset($_GET['id'])) {
    $course_id = intval($_GET['id']); // แปลงค่าเป็นตัวเลข
    $student_id = $_SESSION['id']; // ดึง ID นักเรียนจาก session

    $conn = getConnection(); // เชื่อมต่อฐานข้อมูล
    $sql = "DELETE FROM enrollment WHERE student_id = ? AND course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $student_id, $course_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "Removed course successfully!";
    } else {
        $_SESSION['error'] = "Failed to remove course!";
    }

    $stmt->close();
    $conn->close();
}

// Redirect กลับไปที่หน้า courses
header('Location: /information');
exit;