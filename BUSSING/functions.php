<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="stylesheet.css">

<?php

// Require Composer's autoloader.
require 'vendor/autoload.php';

// Using Medoo namespace.
use Medoo\Medoo;


$database = new Medoo([
    'type' => 'mariadb',
    'host' => 'localhost',
    'database' => 'juedeboule',
    'username' => 'root',
    'password' => '',

// [optional]
//'charset' => 'utf8mb4',
//'collation' => 'utf8mb4_general_ci',
//'port' => 3306,

// [optional] Table prefix, all table names will be prefixed as PREFIX_table.
//'prefix' => 'PREFIX_',

// [optional] Enable logging, it is disabled by default for better performance.
    'logging' => true,

// [optional]
// Error mode
// Error handling strategies when error is occurred.
// PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
// Read more from https://www.php.net/manual/en/pdo.error-handling.php.
    'error' => PDO::ERRMODE_SILENT,

// [optional]
// The driver_option for connection.
// Read more from http://www.php.net/manual/en/pdo.setattribute.php.
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ],

// [optional] Medoo will execute those commands after connected to the database.
    'command' => [
        'SET SQL_MODE=ANSI_QUOTES'
    ]
]);

?>