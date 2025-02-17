<?php
$result_course=getCourse();
renderView('courses_get', array('result_course' => $result_course));