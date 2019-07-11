<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CsvXlsReportGenerator\CsvXlsReportGenerator;

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

$csvXlsReportGenerator = new CsvXlsReportGenerator();

// Generating a CSV Report
echo "Generating a CSV Report";
$outputCsvFile = $csvXlsReportGenerator->generateFile('csv', $data, $clientId);
echo PHP_EOL;
echo "Output File: " . $outputCsvFile;

echo PHP_EOL;
echo PHP_EOL;

// Generating a XLS Report
echo "Generating a XLS Report";
$outputXlsFile = $csvXlsReportGenerator->generateFile('xls', $data, $clientId);
echo PHP_EOL;
echo "Output File: " . $outputXlsFile;