<?php
$result = getStudents();
renderView('students_get', array('result' => $result));