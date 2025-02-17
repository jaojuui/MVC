<?php


if (isset($_GET['course_id'])) {
    $course_code = $_GET['course_id']; // รับค่า course_code จาก URL
    $student_id = $_SESSION['id'];

    $conn = getConnection();

    // 🔹 ดึง course_id จาก courses (เปลี่ยนจาก course_code เป็น course_id)
    $stmt = $conn->prepare("SELECT course_id FROM courses WHERE course_code = ?");
    $stmt->bind_param("s", $course_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script>alert('❌ ไม่พบรายวิชา: $course_code'); window.location.href = '/information';</script>";
        exit();
    }

    // ดึงค่า course_id ที่ได้จากฐานข้อมูล
    $row = $result->fetch_assoc();
    $course_id = $row['course_id'];

    // 🔹 ตรวจสอบว่านักศึกษาเคยลงทะเบียนวิชานี้หรือยัง
    $check = $conn->prepare("SELECT * FROM enrollment WHERE student_id = ? AND course_id = ?");
    $check->bind_param("ss", $student_id, $course_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('⚠️ คุณลงทะเบียนรายวิชานี้แล้ว!'); window.location.href = '/information';</script>";
    } else {
        // 🔹 ลงทะเบียนใหม่
        $stmt = $conn->prepare("INSERT INTO enrollment (student_id, course_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $student_id, $course_id);

        if ($stmt->execute()) {
            echo "<script>alert('✅ ลงทะเบียนสำเร็จ!'); window.location.href = '/information';</script>";
        } else {
            echo "<script>alert('❌ เกิดข้อผิดพลาด: " . $stmt->error . "'); window.location.href = '/information';</script>";
        }
    }

    $conn->close();
} else {
    echo "<script>alert('❌ ไม่มีข้อมูลรายวิชา'); window.location.href = '/information';</script>";
}
?>
