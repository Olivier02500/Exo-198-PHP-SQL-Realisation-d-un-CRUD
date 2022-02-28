<?php

require __DIR__ . '/class/dbb.php';
require __DIR__ . '/function/AddPDO.php';

$name = 'Michel';
$fname = 'Dubois';
$year = 24;


$pdo = new Bdd();

$start = $pdo->getInstance();


addUser($name, $fname, $year, $start);


allData($start);



updateUser(1, 'Oui','Non', 50, $start);



delete(4, $start);