<?php
getConnection();
if(!isset($_SESSION['id'])){
    renderView('home_get', array('name' => ""));

}else{
    $result = getStudentById($_SESSION['id']);
    $name = getStudentByResult($result, 'first_name')." ".getStudentByResult($result, 'last_name');
    renderView('home_get', array('name' => $name));
}
