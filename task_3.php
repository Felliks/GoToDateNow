<?php

include_once 'library/DataFile.php';

try {
    $dataFile = new DataFile('datafiles');
} catch (Exception $e) {
    echo sprintf('Error: %s', $e->getMessage());
    die;
}

foreach ($dataFile->getFiles() as $fileName) {
    echo $fileName . "\n";
}