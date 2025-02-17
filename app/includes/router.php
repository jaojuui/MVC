<?php

declare(strict_types=1);

// Constant values for router
const ALLOW_METHODS = ['GET', 'POST'];
const INDEX_URI = '';
const INDEX_ROUNTE = 'home';


// Normalize URI
function normalizeUri(string $uri): string
{
    $uri = strtok($uri, '?');
    $uri = strtolower(trim($uri, '/'));
    return $uri == INDEX_URI ? INDEX_ROUNTE : $uri;
}

// Page not found function
function notFound(){
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

function getFilePath(string $uri, string $method) : string {
    return ROUTE_DIR . '/' . normalizeUri($uri) . '_' . strtolower($method) . '.php' ;
}
// Router handler
function dispatch(string $uri, string $method) : void {
    $uri = normalizeUri($uri);
    if (!in_array(strtoupper($method), ALLOW_METHODS)) {
        notFound();
    }
    $filePath = getFilePath($uri, $method);
    if(file_exists($filePath)){
        include($filePath);
        return;
    } else {
        notFound();
    }
}
function badRequest(string $message = 'Bad request'): void{
    http_response_code(400);
    echo $message;
    exit;
}
