<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CsvXlsReportGenerator\ExportCsvHelper;

// Setting up
$data = [
    [
        'username' => 'test_one',
        'email' => 'test_one@test.com'
    ],
    [
        'username' => 'test_two',
        'email' => 'teste_two@test.com'
    ],
    [
        'test_three',
        'test_three@test.com'
    ]
];
$clientId = '999';
$path = '/tmp';

$exportCsvHelper = new ExportCsvHelper();

// Generating a CSV Report
echo "Generating a CSV Report";
$outputCsvFile = $exportCsvHelper->generateCsvFile($data, $clientId, $path);
echo PHP_EOL;
echo "Output File: " . $outputCsvFile;
