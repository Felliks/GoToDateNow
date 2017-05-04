<?php

include_once 'library\Init.php';

const PDO_DSN = '';

const PDO_USERNAME = '';

const PDO_PASSWORD = '';

try {
    $dbh = new PDO(PDO_DSN, PDO_USERNAME, PDO_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ((new Init($dbh))->get() as $row) {
        echo sprintf('#%s %s', $row['id'], $row['script_name']) . "\n";
    }

} catch (PDOException $e) {
    echo sprintf('Error: %s', $e->getMessage()) . "\n";
}