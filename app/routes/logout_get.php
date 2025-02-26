<?php

declare(strict_types=1);

unset($_SESSION['timestamp']);
session_unset();


header('Location: /home');
