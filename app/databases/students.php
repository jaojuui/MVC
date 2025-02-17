<?php
declare(strict_types=1);


function getStudents(): mysqli_result|bool {
    $conn = getConnection();
    $sql = 'select * from students';
    $result = $conn->query($sql);
    return $result;
}

function getStudentsByKeyword(string $keyword): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'select * from students where first_name like ? or last_name like ?';
    $stmt = $conn->prepare($sql);
    $keyword = '%'. $keyword .'%';
    $stmt->bind_param('ss',$keyword, $keyword);
    $res = $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function deleteStudentsById(int $id): bool
{
    $conn = getConnection();
    
    $sql1 = 'DELETE FROM enrollment WHERE student_id = ?';
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param('i', $id);
    $stmt1->execute();
    $stmt1->close();


    $sql2 = 'DELETE FROM students WHERE student_id = ?';
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param('i', $id);
    if (!$stmt2->execute()) {
        die("Error deleting student: " . $stmt2->error);
    }

    return $stmt2->affected_rows > 0;
}
function getStudentById(int $id): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'select * from students where student_id = ?';
    $stmt = $conn->prepare($sql);    
    $stmt->bind_param('i', $id);
    $stmt->execute();    
    $result = $stmt->get_result();
    return $result;
}
function changePassword(int $id, string $password): bool
{
    $conn = getConnection();
    $sql = 'update students set password = ? where student_id = ?';
    $stmt = $conn->prepare($sql);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param('si', $hash, $id);
    try {
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
    return $result;
}