<?php
// routes.php

// Example routes array: (Key is URL, Value is target controller or file)
$routes = [
    '/' => 'public/index.php',              // Homepage
    '/about' => 'public/about.php',          // About page
    '/services' => 'public/services.php',    // Services page
    '/contact' => 'public/contact.php',      // Contact page
    '/login' => 'public/login.php',          // Login page
    '/register' => 'public/register.php',    // Registration page
    '/dashboard' => 'public/dashboard.php',  // User dashboard
    '/admin' => 'public/admin.php'           // Admin panel
];

// Function to handle routing
function routeRequest($uri) {
    global $routes;
    
    if (isset($routes[$uri])) {
        include($routes[$uri]);
    } else {
        include('public/404.php'); // 404 page if route not found
    }
}
?>
