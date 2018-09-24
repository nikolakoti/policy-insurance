<?php

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/PolicyHolder.php';

$holder = new PolicyHolder;

$holders = $holder->fetchAll();

//print_r($holders);

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/content/list-content.php';
require_once __DIR__ . '/views/layout/footer.php';