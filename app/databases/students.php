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
function getStudentByEmail(string $email): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'select * from students where email = ?';
    $stmt = $conn->prepare($sql);    
    $stmt->bind_param('s', $email);
    $stmt->execute();    
    $result = $stmt->get_result();
    return $result;
}
function getStudentByResult(mysqli_result $result, string $column): string
{
    if ($result->num_rows > 0) {
        $result->data_seek(0); // รีเซ็ตตัวชี้กลับไปที่แถวแรก
        $student = $result->fetch_assoc();
        return $student[$column] ?? "";
    }
    return "";
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
function hash_pws(){
    $conn = getConnection();
    $sql = "SELECT student_id FROM students ORDER BY student_id ASC";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $student_id = $row['student_id'];
        $plain_password = str_repeat((string)$counter, 4); // สร้างรหัส 1111, 2222, 3333 ...
        $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT); // แฮชรหัสผ่าน

        // อัปเดตรหัสผ่านในฐานข้อมูล
        $update_sql = "UPDATE students SET password='$hashed_password' WHERE student_id=$student_id";
        $conn->query($update_sql);

        $counter++;
    }
    echo "Password updated successfully!";
} else {
    echo "No students found!";
}

}