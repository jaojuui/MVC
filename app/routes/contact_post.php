<?php
getConnection();
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($message)) {
    badRequest("All fields are required");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    badRequest("Email field is invalid");
}
renderView('thank_get', array('name' => $name, 'email' => $email, 'message' => $message));