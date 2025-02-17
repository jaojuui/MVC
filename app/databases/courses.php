<?php

declare(strict_types=1);

function insertCourse($course): bool
{
    $conn = getConnection();
    $sql = 'insert into courses (course_name, course_code, instructor) VALUES (?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss',$course['name'], $course['code'], $course['instructor']);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}
function getCourseById($id):  mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'SELECT * FROM courses,enrollment,students WHERE courses.course_id = enrollment.course_id AND enrollment.student_id = students.student_id AND students.student_id = ?;';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $result = $stmt->get_result(); // ดึงผลลัพธ์จาก execute
    return $result;
}function getCourse():  mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'SELECT * FROM courses';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result(); // ดึงผลลัพธ์จาก execute
    return $result;
}

