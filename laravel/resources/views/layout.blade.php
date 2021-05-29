<?php

    // echo "<pre>";
    // print_r($products);
    // echo "</pre>";
    // //var_dump($products);
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Products</title>
        <link rel="stylesheet" href="/app.css">
    </head>
    <body class="antialiased">
        
        <div class="container">
            @yield('content')
            
        </div>
    </body>
</html>
