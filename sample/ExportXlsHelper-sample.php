<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CsvXlsReportGenerator\ExportXlsHelper;

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

$exportXlsHelper = new ExportXlsHelper();

// Generating a XLS Report
echo "Generating a XLS Report";
$outputXlsFile = $exportXlsHelper->generateXlsFile($data, $clientId, $path);
echo PHP_EOL;
echo "Output File: " . $outputXlsFile;
