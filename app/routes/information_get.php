<?php

declare(strict_types=1);

// renderView('information_get');

getConnection();
$result_student = getStudentById($_SESSION['id']);
$result_course = getCourseById($_SESSION['id']);

renderView('information_get', array('result_student' => $result_student,'result_course' => $result_course));