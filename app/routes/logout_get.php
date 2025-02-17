<?php

declare(strict_types=1);


// Assume that login success
unset($_SESSION['timestamp']);
session_unset();


header('Location: /home');
