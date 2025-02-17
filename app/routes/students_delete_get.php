<?php

declare(strict_types=1);

if (!isset($_GET['id'])) {
    header('Location: /students');
    exit;
} else {
    $id = (int)$_GET['id'];
    $res = deleteStudentsById($id);
    echo $res;
    if($res) {
        header('Location: /students');
    }else {
        badRequest(message: 'Something went wrong! on delete student');
    }
    
}