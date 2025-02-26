<?php
declare(strict_types=1);
function insertEnrollment(string $course_id,string $student_id): bool{
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO enrollment (student_id, course_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $student_id, $course_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
}
function checkEnrollment(string $course_id,string $student_id): bool{
    $conn = getConnection();
    $check = $conn->prepare("SELECT * FROM enrollment WHERE student_id = ? AND course_id = ?");
    $check->bind_param("ss", $student_id, $course_id);
    $check->execute();
    $result = $check->get_result();
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
function Unenroll(int $course_id,int $student_id):bool{
    $conn = getConnection(); 
    $sql = "DELETE FROM enrollment WHERE student_id = ? AND course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $student_id, $course_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}